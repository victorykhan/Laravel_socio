<?php

namespace App\Http\Controllers;
use Auth;
use App\Category;
use App\User;
use App\Video;
use Image;
use Illuminate\Http\Request;
use App\Http\Requests\VideoUploadRequest;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class VideoController extends Controller
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
        $vids = Video::with('category','comments')->OrderBy('created_at','desc')->get();

        return view('video.index',['vids'=>$vids]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categorylist = Category::select('catname','id')->OrderBy('catname','desc')->get();

        //create new textpost
        return view('video.create', compact('categorylist'));
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
            'myvid'=>'required|mimes:mp4,webm,ogg,mov,ogg|max:7000',
            

        ]);

    

        //Logic for user upload of video
        if($request->hasFile('myvid')){
            $vidio = $request->file('myvid');
            $filename = time() . '.' . $vidio->getClientOriginalExtension();
            
            $request->file('myvid')->move( public_path('/uploads/videopost/'), $filename );

        //process form data and save

        $vid = new Video();
        $vid->title = $request->title;
        $vid->myvid = $filename;
        

         $category = Category::findOrFail($request->category_id);

         $vid->category_id = $request->category_id;
          $vid->user_id = $request->user_id;

          $vid->save();

      }

             //redirect
       return redirect()->route('video.index')->with('alert-success','A new video has been saved successfully.');











      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $vid=Video::findOrFail($id);

        if($vid->user_id !=Auth::id())
            {
                return redirect()->Back();
        }
        else {
         $categorylist = Category::select('catname','id')->OrderBy('catname','desc')->get();
          $video = Video::where('id','=', $id)->first();

        return view('video.edit',['video'=>$video,'categorylist'=>$categorylist]);
    }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $newvid=Video::findOrFail($id);

        if($newvid->user_id !=Auth::id())
            {
                return redirect()->Back();
        }



         //validate data
        $this->validate($request,[
            'title'=>'required|max:100',
            'myvid'=>'required|mimes:mp4,webm,ogg,mov,ogg|max:7000',
            

        ]);

    

        //Logic for user upload of video
        if($request->hasFile('myvid')){
            $vidio = $request->file('myvid');
            $filename = time() . '.' . $vidio->getClientOriginalExtension();
            
            $request->file('myvid')->move( public_path('/uploads/videopost/'), $filename );

        //process form data and save

        
        $newvid->title = $request->title;
        $newvid->myvid = $filename;
        

         $category = Category::findOrFail($request->category_id);

         $newvid->category_id = $request->category_id;
          $newvid->user_id = $request->user_id;

          $newvid->update();

      }

             //redirect
       return redirect()->route('video.index',$newvid->id)->with('alert-success','A new video has been saved successfully.');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

         $vid=Video::findOrFail($id);

        if($vid->user_id !=Auth::id())
            {
                return redirect()->Back();
        }
        
        $vid->delete();
        File::delete(public_path('/uploads/videopost/'.$vid->myvid));
        //store status message
        Session::flash('success_msg', 'Video deleted successfully!');
        return redirect()->route('video.index');
    }
}
