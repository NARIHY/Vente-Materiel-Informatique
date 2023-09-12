<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeRequest;
use App\Http\Requests\HomeUpdateRequest;
use App\Models\Home;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomeController extends Controller
{
    /**
     * first we get everything in the Home entities and we paginate
     * @return view
     */
    public function listing(): View
    {
        $home = Home::orderBy('created_at', 'desc')
                            ->paginate(20);
        return view($this->viewPath().'index',[
            'home' => $home
        ]);
    }

    /**
     * just redirect user in a creation view of one element in the home page
     * @return View
     */
    public function create(): View
    {
        return view($this->viewPath().'action.random');
    }

    /**
     * Can help to stock information given by user
     * Implements Spatie/MediaLibrary
     * @param HomeRequest $request //Validation guard
     * @return RedirectResponse
     */
    public function store(HomeRequest $request): RedirectResponse
    {
        try {
            //get the information validated
            $data = $request->validated();

            $home = Home::create($data);
            if ($request->hasFile('media')) {
                foreach ($request->file('media') as $file) {
                    //count file type image
                    $pictureType =  ['image/jpeg', 'image/png'];
                    $picture = in_array($file->getMimeType(), $pictureType);
                    //count video files
                    $videoType = ['video/mp4','video/quicktime','video/x-msvideo'];
                    $video = in_array($file->getMimeType(), $videoType);
                    if ($picture === true && $video === true) {
                        return redirect()->route($this->routes().'create')->with('error', 'Desoler on ne peut pas importer des photo ou des video à la fois');
                    }
                    // adding files upload to the collection
                    $home->addMedia($file)->toMediaCollection('collection_home', 'public');
                }
            }
            return redirect()->route($this->routes().'listing')->with('success', 'Sauvgarde réussi');

        } catch (\Exception $e) {
            return redirect()->route($this->routes().'create')->with('error', 'Oupss, il y a eu une erreur'.$e->getMessage());
        }

    }

    /**
     * Redirect us to the edition view
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $home = Home::findOrFail($id);
        //get the media
        $mediaCollection = Media::where('collection_name', 'collection_home')
            ->where('model_type', Home::class)
            ->where('model_id', $id)
            ->get();

        return view($this->viewPath().'action.random', [
            'home' => $home,
            'mediaCollection' => $mediaCollection
        ]);
    }
    /**
     * Update the specified Home model.
     *
     * @param  HomeUpdateRequest $request
     * @param  string $id
     * @return RedirectResponse
    */
    public function update(HomeUpdateRequest $request, string $id)
    {
        try {
            // Validate the incoming request data
            $data = $request->validated();

            // Find the existing Home model by its ID
            $home = Home::findOrFail($id);

            // Clear all media associated with the Home model
            $home->clearMediaCollection('collection_home');

            // Update home information
            $home->update($data);

            // Adding new media files (up to a limit of 3)
            if ($request->hasFile('media')) {
                $mediaCount = 0;

                foreach ($request->file('media') as $file) {
                    // Check the MIME type of the file (image/jpeg, image/png, or video/*)
                    $allowedMimeTypes = ['image/jpeg', 'image/png', 'video/mp4', 'video/quicktime', 'video/x-msvideo'];

                    if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
                        return redirect()->route($this->routes().'edit', ['id' => $id])->with('error', 'Unsupported file type.');
                    }

                    // Check the file size (e.g., maximum of 5 MB)
                    $maxFileSize = 512000000; // 5 GB in bytes

                    if ($file->getSize() > $maxFileSize) {
                        return redirect()->route($this->routes().'edit', ['id' => $id])->with('error', 'File size exceeds the allowed limit.');
                    }

                    // Add the uploaded file to the media collection
                    $home->addMedia($file)->toMediaCollection('collection_home', 'public');
                    $mediaCount++;

                    if ($mediaCount >= 3) {
                        break; // Limit of 3 media files reached
                    }
                }
            }

            return redirect()->route($this->routes().'edit', ['id' => $id])->with('success', 'Update successful');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'edit', ['id' => $id])->with('error', 'Oops, there was an error: '.$e->getMessage());
        }
    }



    public function delete(string $id): RedirectResponse
    {
        $home = Home::findOrFail($id);
        $home->clearMediaCollection('collection_home');
        $home->delete();
        return redirect()->route($this->routes().'listing')->with('success', 'Sauvgarde réussi');
    }


    /**
     * view path directory
     * @return string
     */
    private function viewPath(): string
    {
        $view = 'admin.visualInterface.';
        return $view;
    }
    /**
     * Routes path directory
     * @return string
     */
    private function routes(): string
    {
        $route = "Admin.Interface.Home.";
        return $route;
    }

}
