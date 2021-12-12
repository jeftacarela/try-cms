<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {

    return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $email    = $request->email;
        $password = $request->password;

        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

   
        if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            Toastr::success('Login Sucessful','Success');
            return redirect()->intended('home');
        }elseif (Auth::attempt(['email'=>$email,'password'=>$password])) {
            Toastr::success('Login Successful','Success');
            return redirect()->intended('home');
        }
        else{
            Toastr::error('FAIL, WRONG USERNAME OR PASSWORD','Error');
            return redirect('login');
        }
    }

     // Google login
     public function redirectToGoogle()
     {
         return Socialite::driver('google')->redirect();
     }
 
     // Google callback
     public function handleGoogleCallback()
     {
         $user = Socialite::driver('google')->user();
 
         $this->_registerOrLoginGoogle($user);
 
         // Return home after login
         return redirect()->route('home');
     }
 
     // Facebook login
     public function redirectToFacebook()
     {
         return Socialite::driver('facebook')->redirect();
     }
 
     // Facebook callback
     public function handleFacebookCallback()
     {
         $user = Socialite::driver('facebook')->user();
 
         $this->_registerOrLoginFacebook($user);
 
         // Return home after login
         return redirect()->route('home');
     }

    public function logout()
    {
        Auth::logout();
        Toastr::success('Logout Successful','Success');
        return redirect('login');
    }

    protected function _registerOrLoginGoogle($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->google_id = $data->id;
            $user->role = 'B';
            $user->password = Hash::make('232427');
            $user->save();
        }

        Auth::login($user);
    }

    protected function _registerOrLoginFacebook($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->facebook_id = $data->id;
            $user->role ='B';
            $user->password = Hash::make('232427');
            $user->save();
        }

        Auth::login($user);
    }
}
