<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;
use Yajra\Datatables\Datatables;
class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.manufacture.index');

    }
    public function getManufacture()
    {
         $manufacture=Manufacture::all();
         return Datatables::of(Manufacture::query())
                             ->addColumn('Status', function($manufacture) {
                             return view('admin.manufacture.actions_buttons', compact('manufacture'));
                                 })
                             ->setRowId('{{$id}}')
                             ->editColumn('created_at',function($manufacture){
                                return $manufacture->created_at->diffForHumans();
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
        return view('admin.manufacture.add_manufacture');
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
        'manufacture_name' => 'required|max:15'
    ]);
        $manufacture=Manufacture::create($request->all());
        $manufacture->save();
        return redirect()->route('manufacture.index')->with('success','Manufacture has been submitted successfully');
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
         $manufacture=Manufacture::findOrFail($id);
        return view('admin.manufacture.edit_manufacture',compact('manufacture'));
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
        'manufacture_name' => 'required'
    ]);
         $manufacture=Manufacture::findOrFail($id);
        $manufacture->update($request->all());
        $manufacture->save();
        return redirect()->route('manufacture.index')->with('success','Manufacture has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           Manufacture::where('id', $id)->delete();
                return redirect()->route('manufacture.index')->with('success','Manufacture deleted successfully');
    }

    public function unactive_manufacture($manufacture_id)
    {

        $manufacture=Manufacture::findOrFail($manufacture_id);
        if($manufacture->publication_status==1)
           {
                $manufacture->update(['publication_status'=>0]);
                $manufacture->save();
                return redirect()->route('manufacture.index')->with('success','Manufacture unactive successfully');
            }
            else
            {
                $manufacture->update(['publication_status'=>1]);
                $manufacture->save();

                return redirect()->route('manufacture.index')->with('success','Manufacture active successfully');
            }
    }
}
