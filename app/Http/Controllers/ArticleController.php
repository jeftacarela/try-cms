<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    // saving data
    public function saveRecord(Request $request)
    {
        $request->validate([
            'article' => 'required|string',
            'user_id' => 'required|numeric',
            'video_url' => 'required',
        ]);

        $article = new Articles();
        $article->article = $request->article;
        $article->user_id = $request->user_id;
        $article->video = 'https://www.youtube.com/embed/'.$request->video_url;
        $article->save();

        // dd($project);

        Toastr::success('Data Inserted','Success');
        // return redirect()->route('admin/project/show');
        return redirect()->back();
    }

    // show table
    public function show()
    {
        if(Gate::allows('isAdmin')){
            $data = Articles::latest()->get();
            $orang = User::all();
            return view('article.article', compact('data', 'orang'));
        } else {
            $data = Articles::where('user_id', '=', Auth::user()->id)->get();
            $orang = User::all();
            return view('article.article', compact('data', 'orang'));
        }
    }

    // update data
    public function update(Request $request)
    {
        $id = $request->id;
        $article = $request->article;
        $user_id = $request->user_id;
        $video = $request->video;
             
        $data = Articles::findorfail($id);

        $update = [
            'id' => $id,
            'article' => $article,
            'video' => $video,
            'user_id'  => $user_id
        ];

        $data->update($update);

        // Articles::where('id',$request->id)->update($update);

        // dd($data);
        Toastr::success('Data Updated','Success');
        return redirect()->back();
    }

    // delete data
    public function delete($id)
    {
        $delete = Articles::find($id);
        $delete->delete();

        Toastr::success('Data Deleted','Success');
        return redirect()->back();
    }
}
