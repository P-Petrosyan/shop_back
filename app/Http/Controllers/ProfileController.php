<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            return view('profile.index');
        }
        return redirect("/login");  
    }

    public function update(Request $request, $id){
        // dd($request->name);
        $user = User::find($id);
        if(isset($request->name)){
        	$user->name = $request->name;   
        }
        if(isset($request->newpassword)  )
        {
            // dd($user->password,$request->oldpassword);
            if(Hash::check($request->oldpassword,$user->password)){
                // dd("yes");
                $user->password = $request->newpassword;

            }
        }
        // dd($user);
        $user->save();
        return redirect("/profile");
    }

}
