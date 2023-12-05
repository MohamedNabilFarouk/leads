<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadPhoto extends Controller
{

    public function upload(Request $request)
    {
        $photo=$request->photo;
        
        $path = $photo->store('photos','public');
        
        return response()->json(['path' => asset($path)]);

    }
}
