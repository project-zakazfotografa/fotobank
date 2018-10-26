<?php

namespace App\Http\Controllers;

use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function personalInfo(){
        $user = User::with('userData')->get();
        //dd(auth()->user()->id);
        return view('photograph.personal_info', [
            'user' => $user
        ]);
    }

    public function storeUserInfo(Request $request){
        //$user = User::find(auth()->user()->id);
        try{
            $file = Storage::disk('public')->put('\avatar' . '\/' . auth()->user()->id, $request->avatar);
        } catch (\Exception $e) {
        }

        //dd(UserData::find(auth()->user()->id));
        if (UserData::find(auth()->user()->id) === null){
            $userData = UserData::create($request->all());
            $userData->avatar = Storage::url($file);
        } else {
            $userData = UserData::find(auth()->user()->id);
            $request->merge([
                'wed' => $request->has('mon') ? 1 : 0,
                'wed' => $request->has('tue') ? 1 : 0,
                'wed' => $request->has('wed') ? 1 : 0,
                'wed' => $request->has('thu') ? 1 : 0,
                'wed' => $request->has('fri') ? 1 : 0,
                'wed' => $request->has('sut') ? 1 : 0,
                'thu' => $request->has('sun') ? 1 : 0,
            ]);
            //dd($userData, $request->all());
            $userData->update($request->except('avatar'));
            if (isset($file)){
                $userData->avatar = Storage::url($file);
            }
            $userData->save();
        }

        return redirect()->route('photograph.info');
    }
}
