<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GivenNicheController extends Controller
{
    public function store_niche(Request $request)
    {
        $validatedData = $request->validate([
            'niche' => 'required|max:255',
        ]);

        DB::table('given_niche')->insert([
            'niche' => $validatedData['niche'],
        ]);

        // return redirect()->back()->with('success', 'Niche keyword added successfully.');
        return redirect()->back();

    }
}

?>