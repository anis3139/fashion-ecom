
@extends('dashbord.master')

@section('title')
   | All Category
@endsection
 @push('css')
  <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
  {{-- <link rel="stylesheet" href="{{asset('/')}}dashbord/adminlte.min.css"> --}}
 @endpush

@section('content')
   <!-- Left side column. contains the logo and sidebar -->
   @section('das_title')

@endsection
    @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

              @if (count($errors) > 0)
                 <div class = "alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                 </div>
              @endif
<div class="container" id="order_list">
<div class="row">
  <div class="col-12">
    <div class="cart">
      <div class="card-body">
        	<div class="row">
                <div class="col-12">
                        <form action="">
                                    @csrf
                          <div class="card">
                            <div class="card-body">
                               
                                <h5 class="card-title">View Month Expences</h5>
                                <div class="form-group row" style="">
                               
                                    <div class="col-md-5">
                                     <select  id="year_id" name="month" class="select2 form-control  custom-select" value=""  autocomplete="name">
                                        <option value="">--Year--</option>
                                        
                         <option value="2019">2019</option>   
                         <option value="2020">2020</option>   
                         <option value="2021">2021</option>   
                         <option value="2022">2022</option>   
                         <option value="2023">2023</option>   
                         <option value="2024">2024</option>   
                         <option value="2025">2025</option>   
                         <option value="2026">2026</option>   
                         <option value="2027">2027</option>   
                         <option value="2028">2028</option>   
                         <option value="2029">2029</option>   
                         <option value="2030">2030</option>   
                                        
                                        </select>
                                    </div> 
                                     <div class="col-md-5">
                                     <select  id="month_id" name="month" class="select2 form-control  custom-select" value=""  autocomplete="name">
                                        <option value="">--Month--</option>
                                        
                         <option value="January">January</option>   
                         <option value="February">February</option>   
                         <option value="March">March</option>   
                         <option value="April">April</option>   
                         <option value="May">May</option>   
                         <option value="June">June</option>   
                         <option value="July">July</option>   
                         <option value="August">August</option>   
                         <option value="September">September</option>   
                         <option value="October">October</option>   
                         <option value="November">November</option>   
                         <option value="December">December</option>   
                                        
                                        </select>
                                    </div>
                              
                                    <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" id="monthBtn">Submit</button>
                                    </div>
                                </div>
                               </div> 
                               
                            </div>
                    </form>
                </div>
                	</div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
            <div class="card-header">
              <h4 class="card-title text-center">Current Month Total Sells Information</h4>
            </div>
            <div class="card-body">
             
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
               <th scope="col">No.</th>
          <th scope="col">Date</th>
          <th scope="col">Month</th>
          <th scope="col">Total Amount</th>


                </tr>
                </thead>
              <tbody>
           	@foreach($currentMonthSell as $key=> $v_currentMonthSell)
           	<tr>
           		<td>{{ $key+1 }}</td>
           		<td>{{ $v_currentMonthSell->date }}</td>
           		<td>{{ $v_currentMonthSell->month }}</td>
           		<td>{{ $v_currentMonthSell->total_sales }}</td>
           	</tr>
           	@endforeach
       		 </tbody>
            
              </table>
            </div>
            <!-- /.card-body -->
          </div>
  </div>
</div>
</div>

  
    
  
 
  
@endsection
@push('js')

<script src="{{asset('/')}}dashbord/jquery.dataTables.js"></script>
<script src="{{asset('/')}}dashbord/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}dashbord/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}dashbord/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script>
	 $(document).on('click', '#monthBtn', function(){
    var year_id = $('#year_id').val();
    var month_id = $('#month_id').val();
    // alert(month_id+year_id)
     // window.location.href = 'http://www.google.com';
     window.location.href = "{{url('/monthlySellIndex')}}"+"/"+year_id+"/"+month_id; 
 });
</script>


@endpush

  