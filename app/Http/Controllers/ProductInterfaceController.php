<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductInterfaceController extends Controller
{
    public function listing(string $id): View
    {
        $categ = Category::findOrFail($id);
        $product = Product::where('categoryId', $id)
                                ->where('quantityInStock', '>', 1)
                                ->paginate(25);
        return view('public.product.listing', [
            'product' => $product,
            'categ' => $categ
        ]);
    }

    public function view(string $id): View
    {
        $prod = Product::findOrFail($id);
        $product = Product:: where('id', '!=', $prod->id)
                            ->get();
        return view('public.product.view', [
            'prod' => $prod,
            'product' => $product
        ]);
    }
}
