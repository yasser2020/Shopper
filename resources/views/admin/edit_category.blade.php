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
					<a href="#">Edit Category</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{route('category.update',$category->id)}}" method="post">
							{{csrf_field()}}
							{{method_field('put')}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="category_name">Category Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge
								{{$errors->has('category_name')?'error-feedback':''}}" name="category_name" value="{!!$category->category_name!!}" style="width: 500px">
								@if($errors->has('category_name'))
					              <div class="invalid-feedback">
					              <strong>{{$errors->first('category_name')}}</strong>
					              </div>
					              @endif
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" rows="3" style="width: 500px">{!!$category->category_description!!}</textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
							  	<input type="hidden" name="publication_status" value="0">
							

							  	<input type="checkbox" name="publication_status" value="1"
							  	{{($category->publication_status == 1 ? ' checked' : '') }}>
							  
							  

							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Category</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection