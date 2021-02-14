<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            // store file
            $file = $request->file('file');
            $filename = '/images/' .$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        
            $picture = json_encode($filename);
            return response()->json([
                'message' => 'Image uploaded !', 
                'image' => $picture
            ]);

        } else {
            return 'no file!';
        }
    }
}
 