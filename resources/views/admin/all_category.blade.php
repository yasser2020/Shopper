@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Categories</a></li>
			</ul>

			<div class="row-fluid sortable">
			@include('_message')		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Categories</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable"
						 id="category_tabel">
						  <thead>
							  <tr>
								  <th>Category Name</th>
								  <th>Category Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($categories as $category)
							<tr>
								<td>{{$category->category_name}}</td>
								<td class="center">{!!$category->category_description!!}</td>
								<td class="center">
									@if($category->publication_status==1)
									<span class="label label-success">Active</span>
									@else
                                     <span class="label label-danger">Unactive</span>
									@endif
								</td>
								<td class="center">
									@if($category->publication_status==1)
										<a class="btn btn-danger" href="{{route('unactive-category',$category->id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" href="{{route('active-category',$category->id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									<a class="btn btn-info" href="{{route('category.edit',$category->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
                        @endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->




@endsection