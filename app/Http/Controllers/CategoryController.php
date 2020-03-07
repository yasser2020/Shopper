<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
         return view('admin.all_category');
    }
    public function getCategory()
    {
        $category=Category::all();
         return Datatables::of(Category::query())
                             ->addColumn('Status', function($category) {
                             return view('admin.action_buttons', compact('category'));
                                 })
                             ->setRowId('{{$id}}')
                             ->editColumn('created_at',function($category){
                                return $category->created_at->diffForHumans();
                             })
                            
                               ->rawColumns(['Status'])

                               ->make(true);

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
        return redirect()->route('category.index')->with('success','Category has been submitted successfully');
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
         $validatedData = $request->validate([
        'category_name' => 'required'
    ]);
         $category=Category::findOrFail($id);
        $category->update($request->all());
        $category->save();
        return redirect()->route('category.index')->with('success','Category has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
                return redirect()->route('category.index')->with('success','Category deleted successfully');

    }

    // public function active_category($category_id)
    // {
    //     $category=Category::findOrFail($category_id);
    //     $category->update(['publication_status'=>1]);
    //     $category->save();
    //     return redirect()->route('category.index')->with('success','Category active successfully');
    // }

    public function unactive_category($category_id)
    {

        $category=Category::findOrFail($category_id);
        if($category->publication_status==1)
           {
                $category->update(['publication_status'=>0]);
                $category->save();
                return redirect()->route('category.index')->with('success','Category unactive successfully');
            }
            else
            {
                $category->update(['publication_status'=>1]);
                $category->save();

                return redirect()->route('category.index')->with('success','Category active successfully');
            }
    }
}
