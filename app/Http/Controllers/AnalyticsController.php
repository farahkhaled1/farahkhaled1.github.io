<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    // public function show($id)
    // {
    //     $analytics = Analytics::find($id);
    //     return view('analyticshistorydetails', ['analytics' => $analytics]);
    // }

    public function showDetails(Request $request)
    {
        $domain_url = $request->input('domain_url');
        $analytics = Analytics::getDetails($domain_url);
        return view('analyticshistorydetails', ['analytics' => $analytics]);
    }
}


// namespace App\Http\Controllers;

// use App\Models\Analytics;
// use Illuminate\Http\Request;

// class AnalyticsController extends Controller
// {
//     public function show($id)
//     {

//         $analytics = Analytics::find($id);
//         // return view('analyticshistorydetails', ['analytics' => $analytics]);


//         return view('analyticshistorydetails');

        
        
//     }
    
// } -->
