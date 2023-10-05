<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Listing view of all category of product
     * @return View
     */
    public function listing(): View
    {
        $category = Category::orderBy('id', 'asc')
                                ->paginate(15);
        return view($this->viewPath().'index',[
            'category' => $category
        ]);
    }

    /**
     * Category creation view
     * @return View
     */
    public function create(): View
    {
        return view($this->viewPath().'action.random');
    }

    /**
     * To do when users give information validated
     * @param CategoryRequest $request //Infromation validated by validator
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $category = Category::create($data);
            if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $image = $request->file('picture');
                // Generate a unique name for the image based on the category ID
                $imageName = 'category_' . $category->id . '.' . $image->getClientOriginalExtension();
                // Image storage path
                $imagePath = public_path('storage/category/' . $imageName);
                // Resize and save the image using Intervention Image
                Image::make($image->getRealPath())
                    ->resize(1280, 720)
                    ->save($imagePath);
                // Update the 'picture' column in the Category model with the relative path of the new image
                $category->update(['picture' => 'category/' . $imageName]);
            }
            return redirect()->route($this->routes().'listing')->with('success', 'Ajout de la catégory réussi');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'create')->with('error', 'Oupss, il y a eu une erreur'.$e->getMessage());
        }

    }

    /**
     * Category editing view
     * @return View
     */
    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        return view($this->viewPath().'action.random', [
            'category' => $category
        ]);
    }

    /**
     * To do when users need to update informations
     * @param string $id //get the id of category
     * @param CategoryRequest $request //for validating information given by users
     * @return RedirectResponse
     */
    public function update(string $id, CategoryUpdateRequest $request): RedirectResponse
    {
        try {
            $category = Category::findOrFail($id);
            $data = $request->validated();
            $category->update($data);
            if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                //get the picture validated
                $newImage = $request->file('picture');
                if(!empty($newImage)){
                    if (!empty($category->picture)) {
                        Storage::disk('public')->delete($category->picture);
                    }
                }
                //giving unique pictures names
                $newImageName = 'category_' . $category->id . '.' . $newImage->getClientOriginalExtension();
                // store in a public path
                $path = public_path('storage/category/' . $newImageName); // Chemin de stockage
                // Resizing picture with intervention image
                Image::make($newImage->getRealPath())
                    ->resize(1280, 720)
                    ->save($path);
                // Update 'picture' collumn in our models with relatives path
                $category->picture = 'category/' . $newImageName;
                $category->save();
            }
            return redirect()->route($this->routes().'edit',['id'=>$category->id])->with('success', 'Modification réussi');
        } catch(\Exception $e) {
            return redirect()->route($this->routes().'edit',['id'=>$category->id])->with('error', 'Oupss, il y a une erreur'. $e->getMessage());
        }
    }

    /**
     * To do when user need to delete an information
     * @param string $id // id of the information to delete
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(string $id): RedirectResponse
    {
        $home = Category::findOrFail($id);

        $home->delete();
        return redirect()->route($this->routes().'listing')->with('success', 'Supréssion réussi');
    }

    //Private function
    /**
     * return an instance of routes who concerns CategoryController
     * @return string
     */
    private function routes(): string
    {
        $routes = "Admin.Category.";
        return $routes;
    }

    /**
     * return an instance of view
     * @return string
     */
    private function viewPath(): string
    {
        $view = "admin.category.";
        return $view;
    }
}
