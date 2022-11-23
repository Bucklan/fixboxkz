<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:2|confirmed',
            'image' => 'mimes:jpg,png,jpeg,gif,webp|dimensions:min_width=16,min_height=16,max_width=100,max_height=100',

        ]);
        $imageName = "default.jpg";
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image/users', $imageName);
        }
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'image' => $imageName,
            'password' => Hash::make($request->input('password')),
            'role_id' => Role::where('name', 'USER')->first()->id
        ]);

        Auth::login($user);

        return redirect()->route('gift.index');

    }
}
