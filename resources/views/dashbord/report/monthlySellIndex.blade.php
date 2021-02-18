
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
    <div class="card">
            <div class="card-header">
              <h4 class="card-title text-center">{{ $month}} Total Sells Information</h4>
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

  