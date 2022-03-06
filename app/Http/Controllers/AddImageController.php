<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class AddImageController extends Controller
{
    public function imageUpload() {
        return view('add_images');
    }

    public function imageUploadPost(Request $request) {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images/'.Auth::user()->company()->name), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
        Image::create()
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function mainImageUploadPost(Request $request) {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->img->extension();

        $path =  public_path('images/'.Auth::user()->company()->name.'/');
     
        $request->file('img')->move($path, $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
        Image::create($path.$imageName);

    
        return $path.$imageName;    }
}
