<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buy()
    {
        $ids = Auth::user()->giftsWithStatus('in_cart')->allRelatedIds();
        foreach ($ids as $id){
            Auth::user()->giftsWithStatus('in_cart')->updateExistingPivot($id,['status'=>'ordered']);
        }
        return back();

    }

    public function index()
    {
        $giftsInCart = Auth::user()->giftsWithStatus('in_cart')->get();
        return view('cart.index', ['giftsInCart' => $giftsInCart]);
    }

    public function putToCart(Request $request, Gift $gift)
    {
        $giftsInCart = Auth::user()->giftsWithStatus('in_cart')->where('gift_id', $gift->id)->first();
        if ($giftsInCart != null)
            Auth::user()->giftsWithStatus('in_cart')->updateExistingPivot($gift->id,
                ['number' => $giftsInCart->pivot->number + $request->input('number')]);
        else
            Auth::user()->giftsWithStatus('in_cart')->attach($gift->id,
                ['number' => $request->input('number')]);
    }

    public function deleteFromCart(Gift $gift)
    {
        $giftsBought = Auth::user()->giftsWithStatus('in_cart')
            ->where('gift_id', $gift->id)->first();
        if ($giftsBought != null)
            Auth::user()->giftsWithStatus('in_cart')->detach($gift->id);
    }
}
