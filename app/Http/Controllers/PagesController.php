<?php

namespace App\Http\Controllers;

use App\Bullet;
use App\Photo;
use App\User;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        $users = User::with('userData', 'bullet.photo')->get();

        //dump($users);
        return view('home', [
            'users' => $users,
        ]);
    }

    public function showPhotograph($id){
        $user = User::with('userData', 'bullet.photo')->findOrFail($id);
        //dd($user);
        return view('photograph.user_page', [
            'user' => $user,
        ]);
    }

    public function bullets(){
        $data = Bullet::all();
        return $data;
    }

    public function addBullet(Request $request){
        try{
            Bullet::firstOrCreate(['bullet' => json_decode($request->input('bullet'))]);
            $data = Bullet::all();
            return $data;
        }catch (\Exception $e){
            return $e;
        }

    }
}
