<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            // store file
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $saved = Storage::putFileAs('public/images', $file , $fileName);

            return response()->json([
                'message' => 'Image uploaded !', 
                'link' => $saved
            ]);

        } else {
            return 'no file!';
        }
    }
}
 