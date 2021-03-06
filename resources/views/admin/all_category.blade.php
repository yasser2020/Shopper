@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{route('home')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Categories</a></li>
			</ul>
			@include('_message')	
			<div class="row-fluid sortable">
				
				<div class="box span12">
					<div class="box-header" data-original-title>
						
						<h2><i class="halflings-icon user"></i><span class="break"></span>Categories</h2>
						<a  style="float: right;" href="{{route('category.create')}}"><i class="fa fa-plus"></i></a>
				
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable"
						 id="category_table">
						  <thead>
							  <tr>
							  	 <th>ID</th>
								  <th>Category Name</th>
								  <th>Category Description</th>
								   <th width="100px">Create At</th>
								  <th width="160px">Status</th>
								
							  </tr>
						  </thead>   
					  </table>            
					</div>
				</div><!--/span-->
			         
			</div><!--/row-->
@stop
@push('scripts')
<script>
$(document).ready(function(){
  
   $('#category_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get_categories') !!}',

        columns: [
             { data: 'id', name: 'id' },
            { data: 'category_name', name: 'category_name' },
            { data: 'category_description', name: 'category_description' },
               {data: 'created_at', name: 'created_at'},
             {data: 'Status', name: 'Status'},
               
            
        ],
       
    });
  

 
     $('#delete-button').on('click',function(e){
        alert('ffffffff');
      });






});
     
       

</script>
@endpush