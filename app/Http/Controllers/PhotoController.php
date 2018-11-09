<?php

namespace App\Http\Controllers;

use App\Bullet;
use App\BulletUser;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::findOrFail(auth()->user()->id);

        try{
            $file = Storage::disk('public')->put('/photos/' . auth()->user()->id, $request->photo);
            $photo = new Photo;
            $photo->photo = Storage::url($file);
            $photo->user_id = auth()->user()->id;
            $photo->save();

        } catch (\Exception $e) {
        }

        foreach ($request->input('bullets') as $bullet){
            $photo->bullet()->attach($bullet);
            $user->bullet()->attach($bullet);
        }
        return redirect()->route('photograph.info');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
