<?php

namespace App\Http\Controllers;

use App\Bullet;
use App\Photo;
use App\Tag;
use App\User;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function index()
    {
        $users = User::with('userData', 'bullet.photo', 'tag')->get();

        //dd($users->tag);
        return view('home', [
            'users' => $users,
        ]);
    }

    public function showPhotograph($id){
        $user = User::with('userData', 'bullet.photo', 'tag', 'servises')->findOrFail($id);
        //dd($user);
        return view('photograph.user_page', [
            'user' => $user,
        ]);
    }

    public function bullets(){
        $data = Bullet::all();
        return $data;
    }

    public function tags(){
        $data = Tag::all();
        return $data;
    }

    public function photographs(){
        return $data = User::with('userData')->get();
    }

    public function addBullet(Request $request){
        try{
            //return $bullet = $request->input('bullet');
            Bullet::firstOrCreate(['bullet' => $request->input('bullet')]);
            $data = Bullet::all();
            return $data;
        }catch (\Exception $e){
            return $e;
        }

    }

    public function addTag(Request $request){
        try{
            Tag::firstOrCreate(['name' => $request->input('tag')]);
            $data = Tag::all();
            return $data;
        } catch (\Exception $e){
            return $e;
        }
    }


    public function test(){
        setlocale(LC_TIME, app()->getLocale());
        //$date = Carbon\Carbon::setLocale('ru');
        $date = Carbon::now('Europe/Moscow')->locale('ru_RU');

        return $date->isoFormat('LLLL');
    }

    public function filters(){
        return ['bullets' => Bullet::all(), 'tags' => Tag::all()];
    }

    public function filterResult(Request $request){
        $data = Bullet::with('users')->where('id', array_flatten($request->input(selectedBullets)))->get();
    }
}
