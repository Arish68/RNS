<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Statuses = Status::where('UserId',  Auth::user()->id)->orderBy('id', 'desc')->get();

        $Comments = Comment::join('users', 'comments.UserId', '=', 'users.id')->select('users.name','users.image', 'comments.*')->get();

        $Users    = User::where('id', '!=', auth()->id())->take(12)->inRandomOrder()->get();

        return view('home')->with(['statuses'=>$Statuses,'comments'=>$Comments,'Users'=>$Users]);
    }
    public function update(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png | max:1000',
        ]);
        $cover = $request->file('image');
        $extension = $cover->getClientOriginalExtension();

        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

        $request->file('image')->store('image');
        User::where('id',  Auth::user()->id)

            ->update(['image' =>$cover->getFilename().'.'.$extension,'name'=>$request->name]);
        return back();
    }

    public function friend($id)
    {
        if($id == Auth::user()->id)
        {
            return $this->index();
        }
        $friend = User::find($id);
        $Statuses = Status::where('UserId',$id)->orderBy('id', 'desc')->get();
        $Comments = Comment::join('users', 'comments.UserId', '=', 'users.id')->select('users.name','users.image', 'comments.*')->get();
        $Users = User::where('id', '!=', $id)->take(12)->inRandomOrder()->get();
        return view('friends')->with(['statuses'=>$Statuses,'comments'=>$Comments,'Users'=>$Users,'friend'=>$friend]);
    }
}
