<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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
     * Action to do when user give information
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $category = Category::create($data);
            if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $image = $request->file('picture');

                // Générez un nom unique pour l'image en fonction de l'ID de la catégorie
                $imageName = 'category_' . $category->id . '.' . $image->getClientOriginalExtension();

                // Chemin de stockage de l'image
                $imagePath = public_path('storage/category/' . $imageName);

                // Redimensionnez et sauvegardez l'image en utilisant Intervention Image
                Image::make($image->getRealPath())
                    ->resize(450, 200) // Redimensionnez selon vos besoins
                    ->save($imagePath);

                // Mettez à jour la colonne 'picture' dans le modèle Category avec le chemin relatif de la nouvelle image
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
     * Controllers to update an information
     * @return RedirectResponse
     */
    public function update(string $id, CategoryRequest $request): RedirectResponse
    {
        try {
            $category = Category::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                // Redimensionnez et stockez la nouvelle image ici
                // Supprimez l'image précédente s'il en existe une

                $newImage = $request->file('picture');
                if(!empty($newImage)){
                    if (!empty($category->picture)) {
                        Storage::disk('public')->delete($category->picture);
                    }
                }

                $newImageName = 'category_' . $category->id . '.' . $newImage->getClientOriginalExtension();

                $path = public_path('storage/category/' . $newImageName); // Chemin de stockage

                // Redimensionnez l'image en utilisant Intervention Image
                Image::make($newImage->getRealPath())
                    ->resize(450, 200) // Redimensionnez selon vos besoins
                    ->save($path);



                // Mettez à jour la colonne 'picture' dans votre modèle Product avec le chemin relatif de la nouvelle image
                $category->picture = 'category/' . $newImageName;
                $category->save();
            }
            return redirect()->route($this->routes().'edit',['id'=>$category->id])->with('success', 'Modification réussi');

        } catch(\Exception $e) {
            return redirect()->route($this->routes().'edit',['id'=>$category->id])->with('error', 'Oupss, il y a une erreur'.$e->getMessage());
        }
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
