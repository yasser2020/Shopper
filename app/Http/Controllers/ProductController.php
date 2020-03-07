<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
          return view('admin.product.all_products');
       
    }

     public function getProduct()
    {
        $product=Product::all();
         return Datatables::of(Product::query())
                             ->addColumn('Status', function($product) {
                             return view('admin.product.product_actions_buttons', compact('product'));
                                 })->
                              editColumn('category_id', function(Product $product){
                                        
                                        $category=Category::findOrFail($product->category_id);
                                    return $category->category_name;
                                     })->
                              editColumn('manufacture_id', function(Product $product){
                                        
                                        $manufacture=Manufacture::findOrFail($product->manufacture_id);
                                    return $manufacture->manufacture_name;
                                     })->
                             editColumn('product_image', function(Product $product){
                                    $path=$product->image_path;
                                    return '<img src="'.$path.'" style="width:50px" class="img-thumbnial">';
                                     })

                             ->setRowId('{{$id}}')
                                ->rawColumns(['Status','category_id','manufacture_id','product_image'])

                               ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('publication_status',1)->get();
        $manufacturies=Manufacture::where('publication_status',1)->get();
         return view('admin.product.add_product',compact('categories','manufacturies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $rules = [
            'product_price'=>'required',
            'product_name'=>'required',
            'category_id'=>'required|nullable',
            'manufacture_id'=>'required|nullable',
            'product_short_description'=>'required'
        ];
        $request->validate($rules);
        $request_data=$request->all();
        if($request->product_image)
          {
                  Image::make($request->product_image)->resize(300, null, function ($constraint) {
                      $constraint->aspectRatio();
                  })->save(public_path('uploads/product_images/'.$request->product_image->hashName()));
                  $request_data['product_image']=$request->product_image->hashName();
              
          }
        
        $request_data['category_id']=(int)$request->category_id;
           $request_data['manufacture_id']=(int)$request->manufacture_id;
            $request_data['product_price']=(int)$request->product_price;
          
            // dd($request_data);
            $product=Product::create($request_data);
            $product->save();

        return redirect()->route('product.index')->with('success','Product added successfully');

          
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->product_image !='default.png')
        {
            Storage::disk('public_uploads')->delete('/product_images/'.$product->product_image);
        }
         $product->delete();
                return redirect()->route('product.index')->with('success','Product deleted successfully');
    }


    public function unactive_product($product_id)
    {

        $product=Product::findOrFail($product_id);
        if($product->publiction_status==1)
           {
                $product->update(['publiction_status'=>0]);
                $product->save();
                return redirect()->route('product.index')->with('success','Product unactive successfully');
            }
            else
            {
                $product->update(['publiction_status'=>1]);
                $product->save();

                return redirect()->route('product.index')->with('success','Product active successfully');
            }
    }

}
