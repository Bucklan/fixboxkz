<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{


    public function index(Category $category)
    {
        $category = Category::whereNull('parent_id')->with('categories')->get();

        return view('admin.moderator.categories', ['category' => $category]);
    }


    public function create(){
        return view('admin.moderator.create');
    }

    public function store(Request $request)
    {


        $validate = $request->validate([
            'name' => 'required|max:255',
        ]);
        Category::create([$validate]);
        return redirect()->route('adm.moderator.categories')->with('message', 'category saved');
    }

    public function show(Category $category)
    {
        return view('admin.moderator.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('admin.moderator.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category->update($validate);
        return redirect()->route('adm.categories.index')->with('message', 'category successfully changed');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('adm.categories.index')->with('message', 'category successfully deleted');
    }

}
