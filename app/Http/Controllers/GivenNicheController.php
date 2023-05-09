<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GivenNicheController extends Controller
{
    public function store_niche(Request $request)
    {
        $validatedData = $request->validate([
            'niche' => 'required|max:255',
        ]);

        $user_id = Auth::id(); // Get the current user's id

        DB::table('given_niche')->insert([
            'uid' => $user_id, // Store the user id
            'niche' => $validatedData['niche'],
        ]);

        // Store the niche value in the user's session
        $request->session()->put('niche', $validatedData['niche']);

        // return redirect()->back()->with('success', 'Niche keyword added successfully.');
        return redirect()->back();
    }
}



// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

// class GivenNicheController extends Controller
// {
//     public function store_niche(Request $request)
//     {
//         $validatedData = $request->validate([
//             'niche' => 'required|max:255',
//         ]);

//         $user_id = Auth::id(); // Get the current user's id

//         DB::table('given_niche')->insert([
//             'niche' => $validatedData['niche'],
//         ]);

//          // Store the niche value in the user's session
//          $request->session()->put('niche', $validatedData['niche']);

//         // return redirect()->back()->with('success', 'Niche keyword added successfully.');
//         return redirect()->back();

//     }
// }

?>