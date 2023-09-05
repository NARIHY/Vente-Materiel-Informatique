<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Product listing
     * @return View
     */
    public function listing(): View
    {

        $product = Product::orderBy('created_at', 'desc')
                    ->paginate(15);
        return view($this->viewPath().'index', [
            'product' => $product
        ]);
    }

    /**
     * we need these when user insert a new product
     */
    public function create() : View
    {
        $category = Category::pluck('id','name');
        return view($this->viewPath().'action.random', [
            'category' => $category
        ]);
    }


    /**
     *
     * @param ProductRequest $request //validate the information given
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        try {

            //instance the information validated by users
            $validated = $request->validated();
            $product = Product::create($validated);
            $picture = $request->validated('picture');
            if ($picture !== null && !$picture->getError()) {
                $data['picture'] = $picture->store('product', 'public');
                $product->update($data);
            }
            return redirect()->route($this->routes().'listing')->with('success', 'Félicitation, le produit a bien été ajouter');
        } catch (\Exception $e){
            return redirect()->route($this->routes().'create')->with('error', 'Oups, il y a eu une erreur'.$e->getMessage());
        }

    }

    /**
     * to delete an product
     * @param string $id //get the id of one product
     * @return RedirectResponse
    */
    public function delete(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        if (!empty($product->picture)) {
            Storage::disk('public')->delete($product->picture);
        }
        $product->delete();
        return redirect()->route($this->routes().'listing')->with('success', 'Félicitation, le produit a bien été suprimer');
    }


    /**
     * TODO - Edition of one product
     * @param string $id //to get id of one product
     * @return View
     */
    public function edit(string $id): View
    {
        $category = Category::pluck('id','name');
        $product = Product::findOrFail($id);
        return view($this->viewPath().'action.random', [
            'category' => $category,
            'product' => $product
        ]);
    }

    /**
     * TODO - used when we update information of one product
     *
     * @param ProductRequest $request
     * @param string $id
     * @return RedirectResponse
     *
    */
    public function update(ProductRequest $request, string $id): RedirectResponse
    {
        try {
                $product = Product::findOrFail($id);
                $product->update($request->validated());
                if (!empty($request->validated('picture'))) {
                    if(!empty($product->picture)) {
                        Storage::disk('public')->delete($product->picture);
                    }
                    $data['picture'] = $request->validated('picture')->store('product', 'public');
                    $product->update($data);
                }
            return redirect()->route($this->routes().'edit',['id' =>$product->id])->with('success', 'Modification réussi');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'edit',['id' =>$product->id])->with('error', 'Oups, il y a eu une erreur'.$e->getMessage());
        }
    }
    /**
     * path directory
     * @return string
     */
    private function viewPath(): string
    {
        $view = "admin.product.";
        return $view;
    }

    private function routes(): string
    {
        $routes = "Admin.Product.";
        return $routes;
    }
}
