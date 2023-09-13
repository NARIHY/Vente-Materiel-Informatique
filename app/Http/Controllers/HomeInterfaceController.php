<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\View\View;
//


class HomeInterfaceController extends Controller
{

    public function index() : View
    {
        $home = Home::latest()
                        ->value('id');
        $category = Category::orderBy('created_at', 'desc')
                                ->get();
        return view($this->viewPath().'index',[
            'home' => $home,
            'category' => $category
        ]);
    }


    private function viewPath(): string
    {
        $view = "public.interface.";
        return $view;
    }

}
