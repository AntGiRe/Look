<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image; 

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');

        $imageName = Str::uuid() . '.' . $image->extension();

        $imageServer = Image::make($image);
        $imageServer->fit(1000, 1000);

        //Guardar en Cloudflare R2 la imagen dentro de uploads
        Storage::put('uploads/' . $imageName, $imageServer->encode());

        return response()->json(['image' => $imageName]);
    }
}
