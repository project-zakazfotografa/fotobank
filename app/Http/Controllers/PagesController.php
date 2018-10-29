<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $users = User::with('userData', 'bullet.photo')->get();
        return view('home', [
            'users' => $users,
        ]);
    }
}
