<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancing;
use Illuminate\Support\Facades\Auth;

class FreelancingController extends Controller
{
    public function showmain()
    {
        return view('index');
    }
    public function livecatagories()
    {
        return view('livecatagories');
    }
    public function videocatagories()
    {
        return view('videocatagories');
    }


    public function bronze()
    {
        return view('bronze');
    }
    public function bronze_details()
    {
        return view('bronze_details');
    }
    public function silver()
    {
        return view('silver');
    }

    public function silver_details()
    {
        return view('silver_details');
    }
    public function gold()
    {
        return view('gold');
    }
    public function gold_details()
    {
        return view('gold_details');
    }
    public function diamond()
    {
        return view('diamond');
    }
    public function diamond_details()
    {
        return view('diamond_details');
    }
    public function form()
    {
        return view('form');
    }

    public function formdata(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|string',
            'paymentMethod' => 'required|string',
            'course' => 'required|string',
            'duration' => 'nullable|string'
        ]);

        Freelancing::create([
            'user_id' => Auth::id(), // Store logged in user's ID
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'location' => $validated['location'],
            'price' => $validated['price'],
            'paymentMethod' => $validated['paymentMethod'],
            'duration' => $validated['paymentMethod'] === 'emi' ? $validated['duration'] : null,
            'course' => $validated['course'],
        ]);

        return redirect("/")->with('success', 'Data stored successfully!');
    }
    public function showRegistrations()
    {
        $freelancers = Freelancing::all(); // You can paginate if needed
        return view('details', compact('freelancers'));
    }
}
