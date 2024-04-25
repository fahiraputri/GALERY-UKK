<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\GallaryImage;

class ImageController extends Controller
{
    public function storeImage(Request $request)
    {
       $request->validate([
        'caption'=>'required|max:225',
        'category'=>'required',
        'image'=>'required|image|mimes:png,jpg,jpeg,bmp'
       ]);
         if($request->hasfile('image')){

            $file=$request->file('image');

            $image_name=rand(1000,9999).time().'.'.$file->getClientOriginalExtension();
            $thumbPath=public_path('user_images/thumb');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(300,200,function($c){
         

            })->save($thumbPath,'/'.$image_name);

            $file->move(public_path(user_images),$image_name);

            GallaryImage::create([
               'user_id'=>auth->id(),
               'caption'=>$request->caption,
               'category'=>$request->category,
               'image'=>$image_name
            ]);

            return redirect()->back()->with('success','Image successfully uploaded');



       if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->storeAs('public/images', $imageName);
       } else {
        $imageName = null;
       }
       
       $img = new GallaryImage([
        'caption' => $request->get(caption),
        'category' => $request->get(category),
        'image' => $imageName,
       ]);

       $img->save();

       return redirect()->route('home')->with('success', 'image done');
    }
}
}