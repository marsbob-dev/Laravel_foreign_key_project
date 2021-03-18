<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        $categories = Categorie::all();
        return view('pages.image.indexImage',compact('images','categories'));
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
        $validate = $request->validate([
            'src' => 'required',
            'category_id' => 'required'
        ]);
        
        $newEntry = new Image;
        $newEntry->src = $request->file('src')->hashName();
        $request->file('src')->storePublicly('img/', 'public');
        $newEntry->category_id = $request->category_id;
        $newEntry->save();
        return redirect('images');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $edit = $image;
        $categories = Categorie::all();
        return view('pages.image.editImage',compact('edit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $validate = $request->validate([
            'src' => 'required',
            'category_id' => 'required'
        ]);
        
        $newEntry = $image;
        $newEntry->src = $request->file('src')->hashName();
        Storage::disk('public')->delete('img/'.$image->src);
        $request->file('src')->storePublicly('img/', 'public');
        $newEntry->category_id = $request->category_id;
        $newEntry->save();
        return redirect('images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        Storage::disk('public')->delete('img/'.$image->src);
        $image->delete();
        return redirect('images');
    }


    public function download($id)
    {
        $img = Image::find($id);
        return Storage::disk('public')->download('img/'.$img->src);
    }
}
