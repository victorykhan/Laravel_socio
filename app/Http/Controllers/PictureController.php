<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use File;
use App\Category;
use App\Comment;
use Auth;
use Image;
use Session;

class PictureController extends Controller
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
        $pics = Picture::with('category','comments')->OrderBy('created_at','desc')->paginate(5);

        return view('picture.index',['pics'=>$pics]);
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
        return view('picture.create', compact('categorylist'));
        
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
            'avatar'=>'required|mimes:jpeg,png,jpg,gif,svg|max:1999',
            

        ]);

        //Logic for user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            
            Image::make($avatar)->save( public_path('/uploads/picturepost/'. $filename ) );

        //process form data and save

        $pic = new Picture();
        $pic->title = $request->title;
        $pic->avatar = $filename;
        

         $category = Category::findOrFail($request->category_id);

         $pic->category_id = $request->category_id;
          $pic->user_id = $request->user_id;

          $pic->save();
      }





        return redirect()->route('picture.index')->with('alert-success','A new picture post has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $picture = Picture::findOrFail($id);
        return view('picture.details',compact('picture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $picture=Picture::findOrFail($id);

        if($picture->user_id !=Auth::id())
            {
                return redirect()->Back();
        }
        else {
         $categorylist = Category::select('catname','id')->OrderBy('catname','desc')->get();
          $picture = Picture::where('id','=', $id)->first();

        return view('picture.edit',['picture'=>$picture,'categorylist'=>$categorylist]);
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

 $picture=Picture::findOrFail($id);

        if($picture->user_id !=Auth::id())
            {
                return redirect()->Back();
        }

         //validate post data
        $this->validate($request, [
            'title'=>'required|max:100',
            'avatar'=>'required|mimes:jpeg,png,jpg,gif,svg|max:1999',
        ]);
        
        //Logic for user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            
            Image::make($avatar)->save( public_path('/uploads/picturepost/'. $filename ) );

        //process form data and save

        $newpic = Picture::findOrFail($id);
        $newpic->title = $request->title;
        $newpic->avatar = $filename;
        

         $category = Category::findOrFail($request->category_id);

         $newpic->category_id = $request->category_id;
          $newpic->user_id = $request->user_id;

          $newpic->update();
          //store status message
        Session::flash('success_msg', 'Post updated successfully!');

        return redirect()->route('picture.index',$newpic->id);
      }




       
  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
         $pic=Picture::findOrFail($id);

        if($pic->user_id !=Auth::id())
            {
                return redirect()->Back();
        }
        
        $pic->delete();
        File::delete(public_path('/uploads/picturepost/'.$pic->avatar));
        //store status message
        Session::flash('success_msg', 'Picture deleted successfully!');
        return redirect()->route('picture.index');
    }
}
