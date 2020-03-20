<?php

namespace App\Http\Controllers;
use App\FileUpload;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = FileUpload::all()->toArray();
        return array_reverse($images);
    }

    public function store(Request $request)
    {
      if($request->get('image'))
       {
        $image = $request->get('image');
        $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        Storage::disk('public')->put('images/'.$name, file_get_contents($image));

       $image= new FileUpload();
       $image->title = $request->title;
       $image->description = $request->description;
       $image->image_name = $name;
       $image->save();

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
       }
    }
}