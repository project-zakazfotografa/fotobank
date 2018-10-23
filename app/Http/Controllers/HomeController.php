<?php

namespace App\Http\Controllers;

use App\User;
use App\UserData;
use Illuminate\Http\Request;

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
        $user = User::find(auth()->user()->id);
        //dd($request->all());
        if (UserData::find(auth()->user()->id) === null){
            $userData = UserData::create($request->all());
        } else {
            $userData = UserData::find(auth()->user()->id);
        }

        return redirect()->route('photograph.info');
    }
}
