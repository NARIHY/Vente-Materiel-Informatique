<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SaleInformation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

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
        $sales = SaleInformation::pluck('id','description');
        return view($this->viewPath().'action.random', [
            'category' => $category,
            'sales' => $sales
        ]);
    }


    /**
     *  with intervention Image who resize our picture uploaded
     * @param ProductRequest $request //validate the information given
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        try {

            //instance the information validated by users
            $validated = $request->validated();
            $product = Product::create($validated);

            if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                // Redimensionnez l'image ici
                $image = $request->file('picture');
                $imageName = 'product_' . $product->id . '.' . $image->getClientOriginalExtension();

                $path = public_path('storage/product/' . $imageName); // Chemin de stockage

                // Redimensionnez l'image en utilisant Intervention Image
                Image::make($image->getRealPath())
                    ->resize(450, 200) // Redimensionnez selon vos besoins
                    ->save($path);

                // Mettez à jour la colonne 'picture' dans votre modèle Product
                $product->picture = 'product/' . $imageName;
                $product->save();
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
        $sales = SaleInformation::pluck('id','description');
        return view($this->viewPath().'action.random', [
            'category' => $category,
            'product' => $product,
            'sales' => $sales
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
                if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                    // Redimensionnez et stockez la nouvelle image ici
                    $newImage = $request->file('picture');
                    $newImageName = 'product_' . $product->id . '.' . $newImage->getClientOriginalExtension();

                    $path = public_path('storage/product/' . $newImageName); // Chemin de stockage

                    // Redimensionnez l'image en utilisant Intervention Image
                    Image::make($newImage->getRealPath())
                        ->resize(450, 200) // Redimensionnez selon vos besoins
                        ->save($path);

                    // Supprimez l'image précédente s'il en existe une
                    if (!empty($product->picture)) {
                        Storage::disk('public')->delete($product->picture);
                    }

                    // Mettez à jour la colonne 'picture' dans votre modèle Product avec le chemin relatif de la nouvelle image
                    $product->picture = 'product/' . $newImageName;
                    $product->save();
                }
            return redirect()->route($this->routes().'edit',['id' =>$product->id])->with('success', 'Modification réussi');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'edit',['id' =>$product->id])->with('error', 'Oups, il y a eu une erreur'.$e->getMessage());
        }
    }
    /**
     * Interface views
     * @return View
     */

    public function index(): View
    {
        $category = Category::orderBy('created_at', 'desc')
                                    ->get();
        return view('public.product.index', [
            'category' => $category
        ]);
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
