@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{route('home')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Products</a></li>
			</ul>
			@include('_message')	
			<div class="row-fluid sortable">
				
				<div class="box span12">
					<div class="box-header" data-original-title>
						
						<h2><i class="halflings-icon user"></i><span class="break"></span>Products</h2>
						<a  style="float: right;" href="{{route('product.create')}}"><i class="fa fa-plus"></i></a>
				
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable"
						 id="product_table">
						  <thead>
							  <tr>
							  	 <th>ID</th>
								  <th>Product Name</th>
								  <th>Product Description</th>
								  <th>Product Image</th>
								  <th>Product Price</th>
								  <th>Category Name</th>
								  <th>Manufacture Name</th>
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
  
   $('#product_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get_products') !!}',

        columns: [
             { data: 'id', name: 'id' },
            { data: 'product_name', name: 'product_name' },
            { data: 'product_short_description', name: 'product_short_description' },
              { data: 'product_image', name: 'product_image' },
               { data: 'product_price', name: 'product_price' },
                { data: 'category_id', name: 'category_id' },
                 { data: 'manufacture_id', name: 'manufacture_id' },
             {data: 'Status', name: 'Status'},
               
            
        ],
       
    });
  

 
     // $('#delete-button').on('click',function(e){
     //    alert('ffffffff');
     //  });






});
     
       

</script>
@endpush