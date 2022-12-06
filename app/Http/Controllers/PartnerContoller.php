<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerContoller extends Controller
{
    public function create()
    {
        $partner = Auth::user();
        return view('partner.create', ['user' => $partner]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_company' => 'required|max:255',
            'image' => 'required|mimes:png,jpg',
        ]);
        $imageName = "default.jpg";
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/partner/photos', $imageName);
        }


        Auth::user()->partner()->create([
            'user_id' => Auth::user()->id,
            'name_company' => $request->input('name_company'),
            'image' => $imageName,
        ]);
        return redirect()->route('gift.index')->with('message', 'Your request has been sent successfully');
    }

    public function is_partner(Partner $partner)
    {
        $partners = Partner::where('id', $partner->id)->first();
        if ($partners->is_partner != true) {
            $partner->update(['is_partner' => true]);
            dd($partner);
            return back();
        }
    }

    public function destroy()
    {

    }
}
