<?php

namespace App\Http\Controllers;

use App\Bullet;
use App\Photo;
use App\Servises;
use App\Tag;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //dd($user[0]->servises);
        $bullets = Bullet::all();
        $tags = Tag::all();
        //dd($user, $bullets);
        return view('photograph.personal_info', [
            'user' => $user,
            'bullets' => $bullets,
            'tags' => $tags,
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

    public function tags(){
        return $tags = Tag::all();
    }

    public function attachTagUser(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        try{
            $user->tag()->attach($request->input('tag_id'));
            return 'success';
        } catch (\Exception $e){
            return $e;
        }
    }

    public function showServises(){
        return $data = Servises::whereUserId(auth()->user()->id)->get();
    }

    public function storeServises(Request $request){
        if ($request->input('free_of_charge') !== null){
            $free_of_charge = $request->input('free_of_charge');
                } else {
            $free_of_charge = 0;
                };
        try{
            Servises::create([
                'user_id' => Auth::user()->id,
                'servise_name' => $request->input('servise_name'),
                'free_of_charge' => $free_of_charge,
                'cost' => $request->input('cost'),
                'type' => $request->input('type'),
            ]);
            return Servises::where('user_id', Auth::user()->id)->get();
        }catch(\Exception $e){
            return $e;
        }
    }
}
