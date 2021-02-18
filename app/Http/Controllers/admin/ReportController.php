<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\coupon;
use App\User;
use App\order;
use App\customer_info;
use App\buyInfo;
use Carbon\Carbon;
use DB;
class ReportController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
         $this->middleware('SellerChecker');
          $this->middleware('Editor');
    }
    function dailySell()
    {
   		$currentMonth = Carbon::now()->format('F');
        $todayDate = Carbon::now()->toDateString();
    	 $singleDaySell = order::where('date', $todayDate)->get();
    	return view ('dashbord.report.dailySells', compact('singleDaySell'));
    }  

    function dailySellIndex($date)
    {
   		  $dateExists = order::where('date', $date)->exists();
		    if ($dateExists) {
		      
		    $singleDaySell = order::where('date', $date)->get();
		    return view('dashbord.report.dailySellIndex', compact('singleDaySell', 'date'));
		    }else{
		      return "No expence in this ".$date." date. . .";
		    }
    } 

     function monthlySell()
    {
    	 $currentMonth = Carbon::now()->format('F');
        $currentMonthSell = DB::table('orders')
                      ->where('month', $currentMonth)
                      ->select("orders.date", "orders.month as month",
                        // DB::raw("SUM(CASE WHEN created_at >= NOW() - INTERVAL 1 WEEK THEN grand_total ELSE 0 END) weekly_sales"),
                        DB::raw("SUM(grandTotal) total_sales")
                      )
                      ->groupBy("orders.date")
                      ->groupBy("month")
                      // ->orderBy("month")
                      ->get();
    	return view ('dashbord.report.monthlySells', compact('currentMonthSell'));
    }

     function monthlySellIndex($year, $month)
    {
    	// return $month.$year;
$dateExists = order::where('month', $month)->where('year', $year)->exists();

    if ($dateExists) {
    	  $currentMonthSell = DB::table('orders')
                      ->where('month', $month)
                      ->select("orders.date", "orders.month as month",
                        // DB::raw("SUM(CASE WHEN created_at >= NOW() - INTERVAL 1 WEEK THEN grand_total ELSE 0 END) weekly_sales"),
                        DB::raw("SUM(grandTotal) total_sales")
                      )
                      ->groupBy("orders.date")
                      ->groupBy("month")
                      ->orderBy("month")
                      ->get();

    	 return view ('dashbord.report.monthlySellIndex', compact('currentMonthSell', 'year', 'month'));
    }else{
      return "No expence in this ".$month." month. . .";
    }
    	
      
    }
}
