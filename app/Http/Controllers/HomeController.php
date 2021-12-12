<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $user = User::latest()->get();
            $jumlahUser = $user->count();
            $id = Auth::user();
            // dd($id->role);
            $user_id = Auth::user()->id;

            $article = Articles::latest()->get();
            $jumlahArticle = $article->count();
            $myArticle = Articles::where('user_id', '=', $user_id)->count();

            return view('home', compact(
                'user','id', 'article', 'jumlahUser', 'jumlahArticle', 'myArticle'
            ));
        } else {
            if (Gate::allows('isClient')) {
                $user = Auth::user();
                $id = Auth::user();
                $user_id = Auth::user()->id;

                $article = Articles::latest()->take(3)->get();
                $jumlahArticle = $article->count();
                $myArticle = Articles::where('user_id', '=', $user_id)->count();

                return view('home', compact(
                    'user','id', 'article', 'jumlahArticle', 'myArticle'
                ));
            } else {
                $user = Auth::user();
                $id = Auth::user();
                $user_id = Auth::user()->id;

                $article = Articles::latest()->take(10)->get();
                $jumlahArticle = $article->count();
                $myArticle = Articles::where('user_id', '=', $user_id)->count();

                return view('home', compact(
                    'user','id', 'article', 'jumlahArticle', 'myArticle'
                ));
            }
        }
    }
}
