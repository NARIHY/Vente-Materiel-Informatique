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
            if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                // Resizing picture
                $picture = $request->validated('picture');
                if ($picture !== null && !$picture->getError()) {
                    $data['picture'] = $picture->store('home', 'public');
                }
                $home->update($data);
                $image = $request->file('picture');
                $imageName = 'product_' . $home->id . '.' . $image->getClientOriginalExtension();
                //store in a public path
                $path = public_path('storage/home/' . $imageName);
                // Resizing picture with Intervention image
                /*
                Image::make($image->getRealPath())
                            ->resize(600, 300)
                            ->save($path);
                // Update 'picture' collumn in our models
                */
                /*
                $home->picture = 'home/' . $imageName;
                $home->save();
*/
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

        return view($this->viewPath().'action.random', [
            'home' => $home,

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
            if ($request->hasFile('picture') && $request->file('picture')->isValid()) {

                $picture = $request->validated('picture');
                if (empty($picture)){
                    $picture = $home->picture;
                } else {
                    //image 1
                    $data['picture'] = $picture->store('home', 'public');

                    $home->update($data);
                }
                // Resizing picture with INTERVENTION PICTURE
                $newImage = $request->file('picture');
                $newImageName = 'product_' . $home->id . '.' . $newImage->getClientOriginalExtension();
                //store in a public path
                $path = public_path('storage/home/' . $newImageName);

            }
            return redirect()->route($this->routes().'edit', ['id' => $id])->with('success', 'Update successful');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'edit', ['id' => $id])->with('error', 'Oops, there was an error: '.$e->getMessage());
        }
    }



    /**
     * To do when user nedd to delete An element in home Table
     * @param string $id //id of this elements
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(string $id): RedirectResponse
    {
        $home = Home::findOrFail($id);
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
