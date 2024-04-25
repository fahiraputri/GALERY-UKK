<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GallaryImage;
use Illuminate\Support\Facades\Auth;

class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GallaryImage::all();
        return view('welcome', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption'=>'required|max:225',
            'category'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg,bmp'
           ]);
    
           if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images', $imageName);
           } else {
            $imageName = null;
           }
           
           $img = new GallaryImage([
            'user_id' => Auth::user()->id,
            'caption' => $request->caption,
            'category' => $request->category,
            'image' => $imageName,
           ]);
    
           $img->save();
    
           return redirect()->route('images.index')->with('success', 'image done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GallaryImage $id)
    {
        return view("detail", compact("id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function detailImage(GallaryImage $image)
    {
        return view("detail", compact("image"));
    }

}
