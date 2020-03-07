@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{route('home')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Manufactures</a></li>
			</ul>
			@include('_message')	
			<div class="row-fluid sortable">
				
				<div class="box span12">
					<div class="box-header" data-original-title>
						
						<h2><i class="halflings-icon user"></i><span class="break"></span>Manufactures</h2>
						<a  style="float: right;" href="{{route('manufacture.create')}}"><i class="fa fa-plus"></i></a>
				
					</div>
					<div class="box-content">
							<table class="table table-striped table-bordered bootstrap-datatable datatable"
						 id="manufacure_table">
						  <thead>
							  <tr>
							  	 <th>ID</th>
								  <th>Manufacure Name</th>
								  <th>Manufacture Description</th>
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
  
   $('#manufacure_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get_manufactures') !!}',

        columns: [
             { data: 'id', name: 'id' },
            { data: 'manufacture_name', name: 'manufacture_name' },
            { data: 'manufacture_description', name: 'manufacture_description' },
               {data: 'created_at', name: 'created_at'},
             {data: 'Status', name: 'Status'},
               
            
        ],
       
    });
  
});
     
       

</script>
@endpush