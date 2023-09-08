<?php
namespace App\Perso;
use Intervention\Image\Facades\Image;

Class Resize
{
    //used to resize pictures
    public function resize($img)
    {
        // usage inside a laravel route
        $img = Image::make($img)->resize(600, 350);
        return $img->response('jpg');

    }
}
