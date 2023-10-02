<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ConfidentialController extends Controller
{
    /**
     * Terms of condition view
     * @return \Illuminate\View\View
     */
    public function politique(): View
    {
        return view('public.policy.terme');
    }
}
