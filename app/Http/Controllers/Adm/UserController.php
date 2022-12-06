<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Gift;
use App\Models\Partner;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showPartners(Partner $partner)
    {
        $partners = Partner::where('id',$partner->id)->first();
        return view('admin.moderator.showPartners',['partner'=>$partners]);
    }

    public function confirm(Cart $cart)
    {
        $cart->update([
            'status' => 'confirmed'
        ]);
        return back();
    }

    public function cart()
    {
        $giftsInCart = Cart::where('status', 'ordered')->with(['gift', 'user'])->get();
        return view('admin.cart', ['giftsInCart' => $giftsInCart]);
    }


    public function index(Request $request)
    {
        $users = null;
        if ($request->search) {
            $users = User::where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->with('role')->get();
        } else {
            $users = User::with('role')->get();
        }
        return view('admin.users', ['users' => $users]);
    }

    public function partners()
    {
        $partners = User::with('partner')->get();
        return view('admin.partners', ['partners' => $partners]);
    }

    public function gifts(Request $request)
    {
        $gifts = null;
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        if ($request->name != null && $request->category != null && $request->from_price < $request->to_price) {
            $gifts = Gift::where('name', 'LIKE', '%' . $request->name . '%')
                ->orWhere('content', 'LIKE', '%' . $request->name . '%')
                ->where('price', '>=', $request->from_price)
                ->where('price', '<=', $request->to_price)
                ->where('category_id', '=', $request->category)
                ->with('category')->get();
        } else {
            $gifts = Gift::with('category')->get();
        }
        if ($request->sortBy) {
            if ($request->sortBy == 1) {
                $gifts = Gift::orderBy('id', 'DESC')->with('category')->get();
            }
            if ($request->sortBy == 2) {
                $gifts = Gift::orderBy('id', 'ASC')->with('category')->get();

            }
            if ($request->sortBy == 3) {
                $gifts = Gift::orderBy('price', 'ASC')->with('category')->get();

            }
            if ($request->sortBy == 4) {
                $gifts = Gift::orderBy('price', 'DESC')->with('category')->get();
            }
            if ($request->sortBy == 5) {
                $gifts = Gift::orderBy('name', 'ASC')->with('category')->get();
            }
            if ($request->sortBy == 6) {
                $gifts = Gift::orderBy('content', 'ASC')->with('category')->get();
            }
        } else {
            $gifts = Gift::with('category')->get();
        }
        return view('admin.gifts', ['gifts' => $gifts, 'categories' => $categories]);
    }

    public function ban(User $user)
    {
        $user->update([
            'is_active' => false
        ]);
        return back()->withErrors('Sorry,You are banned!');
    }

    public function unban(User $user)
    {
        $user->update([
            'is_active' => true
        ]);
        return back();
    }

    public function edit(User $user)
    {
        $gfs = $user->load('role');
        $roles = Role::with('users')->get();
        return view('admin.edit', ['user' => $gfs, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'role_id' => 'required|numeric|exists:roles,id'
        ]);
        $user->update($validate);
        return redirect()->route('adm.users.index')->with('message', 'User roles successfully changed');
    }
}
