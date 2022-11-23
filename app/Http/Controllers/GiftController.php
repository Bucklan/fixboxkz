<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
    //
    public function giftByCategory(Category $category)
    {
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        return view('gifts.index', ['AllGifts' => $category->gifts, 'categories' => $categories]);
    }


    public function index(Gift $allGift)
    {
        $categories = Category::whereNull('parent_id')->with('categories')->get();
//        dd($categories);
        return view('gifts.index', ['AllGifts' => $allGift::with('comments.user')->get(), 'categories' => $categories]);//,'categories'=>$categories
    }


    public function create()
    {
        $this->authorize('create', Gift::class);
        $categories = Category::whereNull('parent_id')->with('categories')->get();
//        return view('gifts.create',['categories'=>$categories]);
        return view('gifts.create', ['categories' => $categories]);
    }

    public function store(Request $request, Gift $gift)
    {
        $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'price' => 'required|numeric',
            'image' => 'mimes:jpg,png,jpeg,gif',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        $imageName = "default.jpg";
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/gifts', $imageName);
        }


        Auth::user()->gifts()->create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'price' => $request->input('price'),
            'image' => $imageName,
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('adm.users.gifts')->with('message', 'gift saved');
    }

    public function show(Gift $gift)
    {
        $myRating = 0;
        $giftLikee = false;
        if (Auth::check()) {
            $giftRated = Auth::user()->giftsRated()->where('gift_id', $gift->id)->first();
            $giftLike = Auth::user()->giftsLike()->where('gift_id', $gift->id)->first();
            if ($giftRated) {
                $myRating = $giftRated->pivot->rating;
            }
            if ($giftLike) {
                $giftLikee = $giftLike->pivot->like;
            }
        }
        $avgRating = 0;
        $sum = 0;
        $sumLike = 0;

        $ratedUsers = $gift->usersRated()->get();
        $LikeUsers = $gift->usersLike()->get();
        foreach ($ratedUsers as $ru) {
            $sum += $ru->pivot->rating;
        }
        foreach ($LikeUsers as $like) {
            if ($like->pivot->like) {
                $sumLike += 1;
            }
        }

        if (count($ratedUsers) > 0) {
            $avgRating = $sum / count($ratedUsers);
        }
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        $gfs = $gift->load('comments.user');
        return view('gifts.show', ['gift' => $gfs,
            'categories' => $categories,
            'myRating' => $myRating,
            'avg' => $avgRating,
            'like' => $giftLikee,
            'count' => $sumLike]);
    }


    public function edit(Gift $gift)
    {
        $this->authorize('update', $gift);
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        $gfs = $gift->load('comments.user');
        return view('gifts.edit', ['gift' => $gfs, 'categories' => $categories]);
    }

    public function update(Request $request, Gift $gift)
    {
        $this->authorize('update', $gift);
        $validate = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        $gift->update($validate);
        return redirect()->route('gift.index')->with('message', 'gift successfully changed');
    }

    public function destroy(Gift $gift)
    {
        $this->authorize('delete', $gift);
        $gift->delete();
        return redirect()->route('gift.index')->with('message', 'gift successfully deleted');
    }

    public function rate(Request $request, Gift $gift)
    {
        $validate = $request->validate([
            'rating' => 'required|min:1|max:5'
        ]);
        $giftRated = Auth::user()->giftsRated()->where('gift_id', $gift->id)->first();

        if ($giftRated) {
            Auth::user()->giftsRated()->updateExistingPivot($gift->id, $validate);
        } else {
            Auth::user()->giftsRated()->attach($gift->id, $validate);

        }
        return back();
    }

    public function unrate(Gift $gift)
    {

        $giftRated = Auth::user()->giftsRated()->where('gift_id', $gift->id)->first();

        if ($giftRated) {
            Auth::user()->giftsRated()->detach($gift->id);
        }
        return back();
    }

    public function like(Request $request, Gift $gift)
    {
        $validate = $request->validate([
            'like' => 'required'
        ]);
        $giftLike = Auth::user()->giftsLike()->where('gift_id', $gift->id)->first();
        if ($giftLike) {
            Auth::user()->giftsLike()->updateExistingPivot($gift->id, $validate);
        } else {
            Auth::user()->giftsLike()->attach($gift->id, $validate);

        }
        return back();
    }
}
