<?php

namespace App\Http\Controllers;

use App\Textpost;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\User;
use App\Comment;
use Session;

class TextpostController extends Controller
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
        //show all textposts
        $textposts = Textpost::with('category','comments')->OrderBy('created_at','desc')->paginate(10);
      
        return view('textpost.index',['textposts'=>$textposts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categorylist = Category::select('catname','id')->OrderBy('catname','desc')->get();

        //create new textpost
        return view('textpost.create', compact('categorylist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            'title'=>'required|max:100',
            

        ]);

        //process form data and save

        $textpost = new Textpost();
        $textpost->title = $request->title;
         $textpost->content = $request->content;

         $category = Category::findOrFail($request->category_id);

         $textpost->category_id = $request->category_id;
          $textpost->user_id = $request->user_id;

          $textpost->save();

        //redirect
       return redirect()->route('textpost.index')->with('alert-success','A new post has been saved successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Textpost  $textpost
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $textpost = Textpost::findOrFail($id);
        return view('textpost.details',compact('textpost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Textpost  $textpost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $textpost=Textpost::findOrFail($id);

        if($textpost->user_id !=Auth::id())
            {
                return redirect()->Back();
        }
        else {

        
          $textpost = Textpost::where('id','=', $id)->first();

          $categorylist = Category::select('catname','id')->OrderBy('catname','desc')->get();

        return view('textpost.edit',['textpost'=>$textpost,'categorylist'=>$categorylist]);
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Textpost  $textpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $textpost=Textpost::findOrFail($id);

        if($textpost->user_id !=Auth::id())
            {
                return redirect()->Back();
        }
        //validate data
        $this->validate($request,[
            'title'=>'required|max:100',
            'content'=>'required',
            

        ]);

          //process form data and save

        $newtext = Textpost::findOrFail($id);
        $newtext->title = $request->title;
        $newtext->content = $request->content;
        

         $category = Category::findOrFail($request->category_id);

         $newtext->category_id = $request->category_id;
          $newtext->user_id = $request->user_id;

          $newtext->update();
          //store status message
        Session::flash('success_msg', 'Message updated successfully!');

        return redirect()->route('textpost.index',$newtext->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Textpost  $textpost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

         $textpost=Textpost::findOrFail($id);

        if($textpost->user_id !=Auth::id())
            {
                return redirect()->Back();
        }

          //$textpost = Textpost::find($id);
        $textpost->delete();
       
        Session::flash('success_msg', 'Message deleted successfully!');
        return redirect()->route('textpost.index');
    }
}
