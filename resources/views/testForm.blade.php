<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">

				<div class="row">
					<div class="col-md-5">
						<div class="card">
							<div class="card-body">
								<form action="{{ url('testSave') }}" method="post" enctype="multipart/form-data">
     								 @csrf
						
								  <div class="form-group">
								    <label for="exampleInputEmail1">Name</label>
								    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
										
								  </div>
								  <div class="form-group">
								    <label for="exampleInputEmail1">Image</label>
								    <input type="file" name="images[]" class="form-control" id="exampleInputEmail1" multiple="">
										
								  </div>
								
								
								  <button type="submit" class="btn btn-primary">Submit</button>
							
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="card">
							<div class="card-body">
								@foreach($images as $img)
								
								<img src="{{ asset('upload/ami') }}/{{ $img }}" alt="">
						

							    @endforeach
							</div>	
							<div class="card-body">

							</div>
							
						</div>
					</div>
			
		</div>
	</div>
	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>