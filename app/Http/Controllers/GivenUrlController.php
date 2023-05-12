<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GivenUrlController extends Controller
{
    public function index()
    {
        return view('scrapeurl');
    }
    public function store_url(Request $request)
    {
        $validatedData = $request->validate([
            'url' => 'required|url',
        ]);

        $user_id = Auth::id(); // Get the current user's id

        DB::table('given_url')->insert([
            'uid' => $user_id, // Store the user id
            'url' => $validatedData['url'],
        ]);

        // Store the niche value in the user's session
        $request->session()->put('url', $validatedData['url']);

        // return redirect()->back()->with('success', 'Niche keyword added successfully.');
        return redirect()->back();
    }
}
?>