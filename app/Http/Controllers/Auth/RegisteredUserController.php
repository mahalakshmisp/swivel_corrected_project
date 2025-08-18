<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'school' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'address' => 'required|string',
            'district' => 'required|string|max:255',
            'gender' => 'required|string',
            'password' => 'required|string|min:5|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'phone' => $request->phone,
            'school' => $request->school,
            'department' => $request->department,
            'address' => $request->address,
            'district' => $request->district,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $posted = $request->string('intended')->toString();
        if ($posted) session(['url.intended' => $posted]);
        $target = session('url.intended');
        return redirect()->intended($target ?: RouteServiceProvider::HOME);
    }
}
