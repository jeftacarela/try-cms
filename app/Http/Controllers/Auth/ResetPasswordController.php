<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    // use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function getPassword($token) {

        return view('auth.passwords.reset', ['token' => $token]);
     }
 
     public function updatePassword(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required',
 
         ]);
 
         $updatePassword = DB::table('password_resets')
                             ->where(['email' => $request->email, 'token' => $request->token])
                             ->first();
 
         if(!$updatePassword){
             Toastr::error('Invalid Token', 'FAILED');
             return back()->withInput()->with('error', 'Invalid token!');
         } else {
           User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
 
           DB::table('password_resets')->where(['email'=> $request->email])->delete();
           
           Toastr::success('Your password has been changed!','Success');
           return redirect('/login');
         }
     }
}
