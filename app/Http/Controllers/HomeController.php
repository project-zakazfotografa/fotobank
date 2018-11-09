<?php

namespace App\Http\Controllers;

use App\Bullet;
use App\Photo;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function personalInfo(){
        $user = User::where('id', auth()->user()->id)->with('userData', 'photo')->get();
        $bullets = Bullet::all();
        //dd($user, $bullets);
        return view('photograph.personal_info', [
            'user' => $user,
            'bullets' => $bullets,
        ]);
    }

    public function storeUserInfo(Request $request){
        try{
            $file = Storage::disk('public')->put('\avatar' . '\/' . auth()->user()->id, $request->avatar);
        } catch (\Exception $e) {
        }
        if (UserData::find(auth()->user()->id) === null){
            $request->merge([
                'mon' => $request->has('mon') ? 1 : 0,
                'tue' => $request->has('tue') ? 1 : 0,
                'wed' => $request->has('wed') ? 1 : 0,
                'thu' => $request->has('thu') ? 1 : 0,
                'fri' => $request->has('fri') ? 1 : 0,
                'sut' => $request->has('sut') ? 1 : 0,
                'sun' => $request->has('sun') ? 1 : 0,
            ]);
            $userData = UserData::create($request->all());
            $userData->avatar = Storage::url($file);
        } else {
            $userData = UserData::find(auth()->user()->id);
            $request->merge([
                'mon' => $request->has('mon') ? 1 : 0,
                'tue' => $request->has('tue') ? 1 : 0,
                'wed' => $request->has('wed') ? 1 : 0,
                'thu' => $request->has('thu') ? 1 : 0,
                'fri' => $request->has('fri') ? 1 : 0,
                'sut' => $request->has('sut') ? 1 : 0,
                'sun' => $request->has('sun') ? 1 : 0,
            ]);
            $userData->update($request->except('avatar'));
            if (isset($file)){
                $userData->avatar = Storage::url($file);
            }
            $userData->save();
        }

        return redirect()->route('photograph.info');
    }
}
