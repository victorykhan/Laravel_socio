<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Textpost;
use App\Picture;
use App\Video;

use Auth;
use App\Category;
use App\User;
use App\Comment;
use Session;

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
    public function index()
    {
            $user_id =Auth::id();

             $pictures = Picture::where('pictures.user_id','=',$user_id)->OrderBy('created_at','desc')->get();
             $videos = Video::where('videos.user_id','=',$user_id)->OrderBy('created_at','desc')->get();
             $textposts = Textpost::where('textposts.user_id','=',$user_id)->OrderBy('created_at','desc')->get();
             $comments = Comment::where('comments.user_id','=',$user_id)->OrderBy('created_at','desc')->get();


        return view('home',['textposts'=>$textposts, 'pictures'=>$pictures,'videos'=>$videos,'comments'=>$comments]);
    }

    public function fb()
    {
        return view('fb');
    }
}
