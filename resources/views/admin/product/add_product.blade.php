@extends('admin_layout')

@section('admin_content')
	
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="category_name">Product Name</label>
							  <div class="controls">
								<input type="text" placeholder="Product Name" class="input-xlarge 
								{{$errors->has('product_name')?'error-feedback':''}}" name="product_name">
								@if($errors->has('product_name'))
					              <div class="invalid-feedback">
					              <strong>{{$errors->first('product_name')}}</strong>
					              </div>
					              @endif
							  </div>
							</div>

							 <div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
								  	
								  	<option value="">Select Category</option>
								  	@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->category_name}}</option>
									@endforeach
									
								  </select>
								</div>
							  </div>

							   <div class="control-group">
								<label class="control-label" for="selectError3">Product Manufacture</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">
								  	<option value="">Select Manufacture</option>
								  	@foreach($manufacturies as $manufacture)
									<option value="{{$manufacture->id}}">{{$manufacture->manufacture_name}}</option>
									@endforeach
									
								  </select>
								</div>
							  </div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea placeholder="Product Short Description" class="cleditor" name="product_short_description" cols="500" rows="3" style="width: 500px"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea  placeholder="Product  Long Description" class="cleditor" name="product_long_description" cols="500" rows="5" style="width: 500px"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="category_price">Product Price</label>
							  <div class="controls">
								<input type="number" step="any" class="input-xlarge
								{{$errors->has('product_price')?'error-feedback':''}}" name="product_price">
								@if($errors->has('product_price'))
					              <div class="invalid-feedback">
					              <strong>{{$errors->first('product_price')}}</strong>
					              </div>
					              @endif
							  </div>
							</div>
                             <div class="control-group">
								<label class="control-label">Product Image</label>
								<div class="controls">
								  <input id="product-img" type="file" name="product_image">
								</div>
								 <div class="form-group " style="float: right;">
		                            <img id="product-img-tag" src={{asset("uploads/product_images/default.jpg")}} style="width:100px" class="img-thumbnail image-preview" alt="">
		                         </div>
							  </div>
		                       
                                  


							  <div class="control-group">
							  <label class="control-label" for="category_name">Product Color</label>
							  <div class="controls">
								<input type="text" placeholder="Product Color" class="input-xlarge"
								 name="product_color">
							  </div>

							  <div class="control-group">
							  <label class="control-label" for="category_name">Product Size</label>
							  <div class="controls">
								<input type="text" placeholder="Product Size" class="input-xlarge"
								 name="product_size">
							  </div> 

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
							  	<input type="checkbox" name="publiction_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection
@push('scripts')

<script type="text/javascript">

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            

            reader.onload = function (e) {

                $('#product-img-tag').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }

    }

    $("#product-img").change(function(){

        readURL(this);

    });

</script>
@endpush