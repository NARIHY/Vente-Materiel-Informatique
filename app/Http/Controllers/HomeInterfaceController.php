<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Compteur;
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
        $h = Home::latest()
                        ->value('id');
        $home = Home::findOrFail($h);
        $category = Category::orderBy('created_at', 'desc')
                                ->get();
        $categoryCount = Category::orderBy('created_at', 'desc')
                                ->count();
        //add count to visits when people go the home page
        $visits = Compteur::create();
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
