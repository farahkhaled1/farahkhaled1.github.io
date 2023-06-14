<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        return view('editor');
    }

    public function store_blog(Request $request)
    {
        $validatedData = $request->validate([
            'blog' => 'required|max:255',
        ]);
        
        $user_id = Auth::id(); // Get the current user's id

        DB::table('blog')->insert([
            'uid' => $user_id, // Store the user id
            'blog' => $validatedData['blog'],
        ]);

        // Store the niche value in the user's session
        $request->session()->put('blog', $validatedData['blog']);

        // return redirect()->back()->with('success', 'Niche keyword added successfully.');
        return redirect()->back();
    }
}


?>







