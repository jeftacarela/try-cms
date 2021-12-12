<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // save new user
    public function addNewUserSave(Request $request)
    {
        if(Gate::allows('isAdmin')){
            $request->validate([
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|max:255|unique:users',
                'role_name'      => 'required|string|max:255',
                'password'  => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required',
            ]);

            //    $image = time().'.'.$request->image->extension();  
            //    $request->image->move(public_path('images'), $image);

            $user = new User();
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->role    = $request->role_name;
            $user->password     = Hash::make($request->password);
            $user->save();
            Toastr::success('Created New Account','Success');
            return redirect()->route('home');
        } else {
            Toastr::error('ADMIN ONLY');
            return redirect()->back();
        }
   }
}
