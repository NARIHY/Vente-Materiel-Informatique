<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            $categroy = Category::create($data);
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
            return redirect()->route($this->routes().'edit')->with('success', 'Modification réussi');

        } catch(\Exception $e) {
            return redirect()->route($this->routes().'edit')->with('error', 'Oupss, il y a une erreur'.$e->getMessage());
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
