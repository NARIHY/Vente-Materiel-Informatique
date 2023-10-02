<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Home;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
//


class HomeInterfaceController extends Controller
{

    /**
     * Views for public home
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        $home = Home::latest()
                        ->value('id');
        $category = Category::orderBy('created_at', 'desc')
                                ->get();
        $categoryCount = Category::orderBy('created_at', 'desc')
                                ->count();
        return view($this->viewPath().'interface.index',[
            'home' => $home,
            'category' => $category,
            'categoryCount' => $categoryCount
        ]);
    }

    /**
     * Service public View
     * @return \Illuminate\View\View
     */
    public function service(): View
    {
        $product = Product::where('quantityInStock', '>=', 1)
                                ->orderBy('created_at', 'desc')
                                ->take(6)
                                ->get();
        return view($this->viewPath().'service.index', [
            'product' => $product
        ]);
    }




    /**
     * View public path directory
     * @return string
     */
    private function viewPath(): string
    {
        $view = "public.";
        return $view;
    }

}
