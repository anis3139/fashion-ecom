<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class SearchController extends Controller
{
   function search(Request $request)
   {
   	// $request->all();  
   	$query = $request->input('query'); 
   	$searchProduct = product::where('product_name', 'like', "%$query%")
   	                         ->orWhere('product_code', 'like', "%$query%")
   	                          ->get();
   	// $searchProduct = product::search($query)->paginate(2);

   	return view('fronts.searchResult', compact('searchProduct'));
   }

   function autosearch(Request $request){
   		$search = $request->input('query');
          $result = product::where('product_name', 'LIKE', '%'. $search. '%')->get();
          return response()->json($result);
   }

}
