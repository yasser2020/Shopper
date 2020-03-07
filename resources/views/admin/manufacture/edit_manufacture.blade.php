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
					<a href="#">Edit Manufacture</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Manufacture</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{route('manufacture.update',$manufacture->id)}}" method="post">
							{{csrf_field()}}
							{{method_field('put')}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="manufacture_name">Manufacture Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge
								{{$errors->has('manufacture_name')?'error-feedback':''}}" name="manufacture_name" value="{!!$manufacture->manufacture_name!!}" style="width: 500px">
								@if($errors->has('manufacture_name'))
					              <div class="invalid-feedback">
					              <strong>{{$errors->first('manufacture_name')}}</strong>
					              </div>
					              @endif
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Manufacture Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="manufacture_description" rows="3" style="width: 500px">{!!$manufacture->manufacture_description!!}</textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
							  	<input type="hidden" name="publication_status" value="0">
							

							  	<input type="checkbox" name="publication_status" value="1"
							  	{{($manufacture->publication_status == 1 ? ' checked' : '') }}>
							  
							  

							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Manufacture</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection