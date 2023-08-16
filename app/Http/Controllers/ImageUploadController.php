<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * @inheritdoc
     */
    public function upload (Request $request)
    {
        $image = $request->file('image');
        $destinationPath = public_path('ckeditor-images');
        $imageName = $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);

        return response()->json([
            'success' => true,
            'url' => asset('ckeditor-images/'.$imageName)
        ]);
    }
}
