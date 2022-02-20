@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<title></title>
</head>
<body>
	<div class="container">
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
  <a href="{{route('ebooks.index')}}"><button class="btn btn-success">Back</button></a>

	<form method="POST" action="{{route('ebooks.store')}}" enctype="multipart/form-data">
		@csrf
	  	<div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationCustom01">Name</label>
	      <input name="name" type="text" class="form-control" id="validationCustom01" placeholder="" required>
	    </div>
	    <div class="col-md-4 mb-3">
	      <label for="validationCustom02">Category</label>
	      <select name="category" class="form-control" id="validationCustom02" placeholder="" required>
	      	<option></option>
	      	<option>Computer</option>
	      </select>
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-6 mb-3">
	      <label for="validationCustom03">File</label>
	      <div class="custom-file">
		  <input name="file" type="file" class="custom-file-input" id="customFile">
		  <label class="custom-file-label" for="customFile">Choose File</label>
		</div>
	    </div>
	  </div>
	  <div class="form-group">
	  </div>
	  <button class="btn btn-primary" type="submit">Submit form</button>
	</form>
	</div>
	

</body>
</html>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection