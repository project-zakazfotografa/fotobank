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
        $user = User::findOrFail($id);

        return view('photograph.user_page', [
            'users' => $user,
        ]);
    }
}
