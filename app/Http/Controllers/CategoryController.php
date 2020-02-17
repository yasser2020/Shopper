<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         $categories=Category::all();
        return view('admin.all_category',compact('categories'));


        // $categories=Category::all();
        // return view('admin.all_category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validatedData = $request->validate([
        'category_name' => 'required|max:15'
    ]);
        $category=Category::create($request->all());
        $category->save();
        return back()->with('success','Your category has been submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('admin.edit_category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "ddddddddddddddddddd";
    }

    public function active_category($category_id)
    {
        $category=Category::findOrFail($category_id);
        $category->update(['publication_status'=>1]);
        $category->save();
        return redirect()->route('category.index')->with('success','Category active successfully');
    }

    public function unactive_category($category_id)
    {
        $category=Category::findOrFail($category_id);
        $category->update(['publication_status'=>0]);
        $category->save();
        return redirect()->route('category.index')->with('success','Category unactive successfully');
    }
}
