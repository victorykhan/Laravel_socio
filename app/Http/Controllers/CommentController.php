<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Textpost;
use App\User;
use App\Picture;
use App\Video;
use Auth;
use Session;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function __construct()
{
    $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete']]);
    
}

    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        //process and store
        $comment = new Comment();
        
         $comment->content = $request->content;

         //Picture comments

         if($request->picture_id !== null){


         $pic = Picture::findOrFail($request->picture_id);
         

         $comment->picture_id = $request->picture_id;
        
          $comment->user_id = $request->user_id;

          $comment->save();

         
        //redirect user
            return redirect()->route('picture.index')->with('alert-success','Your picture has been added successfully.');
        }

        //Textpost comments

        if($request->textpost_id !== null){

        
         $textpost = Textpost::findOrFail($request->textpost_id);

         
         $comment->textpost_id = $request->textpost_id;
          $comment->user_id = $request->user_id;

          $comment->save();

         
        //redirect user
            return redirect()->Back()->with('alert-success','Your post has been added successfully.');
        }

        //Video comments

        if($request->video_id !== null){

         
         $vid = Video::findOrFail($request->video_id);

         
         $comment->video_id = $request->video_id;
          $comment->user_id = $request->user_id;

          $comment->save();

         
        //redirect user
            return redirect()->route('video.index')->with('alert-success','Your vidoe has been added successfully.');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

         $comment=Comment::findOrFail($id);

        if($comment->user_id !=Auth::id())
            {
                return redirect()->Back();
        }

        $comment = Comment::where('id','=', $id)->first();

        return view('comment.edit',['comment'=>$comment]);
    }

    public function editvid($id)
    {
        //

         $comment=Comment::findOrFail($id);

        if($comment->user_id !=Auth::id())
            {
                return redirect()->Back();
        }

        $comment = Comment::where('id','=', $id)->first();

        return view('comment.editvid',['comment'=>$comment]);
    }


public function editpic($id)
    {
        //

         $comment=Comment::findOrFail($id);

        if($comment->user_id !=Auth::id())
            {
                return redirect()->Back();
        }

        $comment = Comment::where('id','=', $id)->first();

        return view('comment.editpic',['comment'=>$comment]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        //process and store
        $comment =  Comment::findOrFail($id);
        
         $comment->content = $request->content;

         //Picture comments

         if($request->picture_id !== null){


         $pic = Picture::findOrFail($request->picture_id);
         

         $comment->picture_id = $request->picture_id;
        
          $comment->user_id = $request->user_id;

          $comment->update();

         
        //redirect user
            return redirect()->Back()->with('alert-success','Your picture has been added successfully.');
        }

        //Textpost comments

        if($request->textpost_id !== null){

        
         $textpost = Textpost::findOrFail($request->textpost_id);

         
         $comment->textpost_id = $request->textpost_id;
          $comment->user_id = $request->user_id;

          $comment->update();

         
        //redirect user
            return redirect()->Back()->with('alert-success','Your post has been added successfully.');
        }

        //Video comments

        if($request->video_id !== null){

         
         $vid = Video::findOrFail($request->video_id);

         
         $comment->video_id = $request->video_id;
          $comment->user_id = $request->user_id;

          $comment->update();

         
        //redirect user
            return redirect()->Back()->with('alert-success','Your vidoe has been added successfully.');
        }

     return redirect()->Back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $comment = Comment::find($id);

 

        if($comment->user_id !=Auth::id())
            {
                return redirect()->Back();
        }

        $comment->delete();
       
        Session::flash('success_msg', 'Message deleted successfully!');
        return redirect()->Back();
    }
}
