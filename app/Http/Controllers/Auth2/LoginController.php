<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended('/gift');
        }

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:2'
        ]);

        if (Auth::attempt($validated)) {
<<<<<<< HEAD
            if(Auth::user()->role->name != "USER")
                return  redirect()->intended('/adm/users');
=======
            if (Auth::user()->role->name != "USER") {
                    if (Auth::user()->role->name == "PARTNER") {
                        return redirect()->intended('/adm/gifts');
                    }
                    return redirect()->intended('/adm/users');
            }
>>>>>>> a6434a9 (first commit)
            return redirect()->intended('/gift');
        }
        return redirect()->back()->withErrors('Incorrect email or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('register.form');
    }

    public function profile()
    {
<<<<<<< HEAD
      $users = Auth::user();
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        return view('gifts.profile',['user'=>$users,'categories'=>$categories]);
=======
        $users = Auth::user();
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        return view('gifts.profile', ['user' => $users, 'categories' => $categories]);
>>>>>>> a6434a9 (first commit)
    }

}
