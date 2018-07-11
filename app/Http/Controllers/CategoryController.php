<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     
     */
     //
    public function __construct()
    {
        
         $this->middleware('auth', ['only' => ['index','create', 'store', 'edit', 'delete']]);
        $this->middleware('role:ROLE_ADMIN',['only' => ['index','create', 'store', 'edit', 'delete']]);
        $this->middleware('role:ROLE_SUPERADMIN',['only' => ['index','create', 'store', 'edit', 'delete']]);
    }
    
    public function index()
    {
        //show all categories
        $categories = Category::OrderBy('catname')->get();
        return view('category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new category
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request,[
            'catname'=>'required',
        ]);
        //create new category
        $cat = new Category;
        $cat->catname=$request->catname;
        
        $cat->save();
        
        return redirect()->route('category.index')->with('alert-success','A new category has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the category with the idate
        $category = Category::findOrFail($id);
        //return to the edit view
        
        return view('category.edit',compact('category','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ////validate
        $this->validate($request,[
            'catname'=>'required',
        ]);
        
        $cat = Category::findOrFail($id);
        $cat->catname = $request->catname;
        $cat->save();
        return redirect()->route('category.index')->with('alert-success','The category has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete data
        
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('category.index')->with('alert-success','The category has been deleted');
    }
}
