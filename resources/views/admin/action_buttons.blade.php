<!-- <link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet"> -->

 @if($category->publication_status == 1)
 <a href="{{route('unactive-category',$category->id)}}" class="btn btn-success">Active</a>
 @else
 <a href="{{route('unactive-category',$category->id)}}" class="btn btn-danger">Inactive</a>
 @endif

 <a href="{{route('category.edit',$category->id)}}" class="btn btn-info btn-sm"> <i class="halflings-icon white edit"></i><a/>
<form action="{{route('category.destroy',$category->id)}}" method="post" style="float: right; margin: 0">
	{{csrf_field()}}
    {{method_field('delete')}}
	<button class="btn btn-danger" id="delete-button" onclick="return confirm('Are you sure?')" ><i class="halflings-icon white trash"></button>
	
</form>



