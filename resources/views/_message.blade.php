@if(session('success'))
<div class="btn btn-success" role="alert">
   <strong>Success</strong> {{session('success')}}
</div>

@endif