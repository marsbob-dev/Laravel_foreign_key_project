<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avatars =Avatar::where('id', '>', 1)->get();
        return view("pages.avatar.indexAvatar" ,compact("avatars"));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nom" => "required",
            "src" => "required",
        ]);

        $newEntry =new Avatar;

        $newEntry->nom=$request->nom;
        $newEntry->src=$request->file('src')->hashName();
        $request->file('src')->storePublicly('img/','public');
        $newEntry->save();
        return redirect('avatars');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function show(Avatar $avatar)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function edit(Avatar $avatar)
    {
        $edit = $avatar;
        return view('pages.avatar.editAvatar', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avatar $avatar)
    {
        $validated = $request->validate([
            "nom" => "required",
            "src" => "required",
        ]);

        $updateEntry = $avatar;
        Storage::disk('public')->delete('img/'.$avatar->src);
        $updateEntry->src = $request->file('src')->hashName();
        $request->file('src')->storePublicly('img/', 'public');
        $updateEntry->nom = $request->nom;
        $updateEntry->save();
        return redirect('avatars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avatar $avatar)
    {
        Storage::disk('public')->delete('img/'.$avatar->src);
        $users = User::all();
        foreach ($users->where('avatar_id',$avatar->id) as $item) {
            $item->avatar_id = 1;
        }
        $avatar->delete();
        return redirect('avatars');
    }
    
}
