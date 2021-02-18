@extends('seller.master')

@section('content')





        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
		
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-6 offset-3">
								<div class="card">
									<div class="card-body">
									<form action="{{ url('sellerInfoSave') }}" method="post">
										@csrf
									  <div class="form-group">
									    <label for="exampleInputEmail1">Name</label>
									    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputEmail1">Email address</label>
									    <input type="email" name="email" class="form-control" id="exampleInputEmail1"value="{{ Auth::user()->email }}">
									  </div>
									   <div class="form-group">
									    <label for="exampleInputEmail1">Zip Code</label>
									    <input type="text" name="zipcode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Zip Code">
									  </div> 
									   <div class="form-group">
									    <label for="exampleInputEmail1">Address</label>
									    <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
									  </div>
						
									  <button type="submit" class="btn btn-primary">Submit</button>
									</form>
									</div>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        </div>




    
@endsection