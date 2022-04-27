<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Category;

use Illuminate\Validation\Rule;

class DishController extends Controller
{
    public function index()
    {
        return view('dishes.index', [
            'dishes' => Dish::latest()->filter(request(['search', 'category']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Dish $dish)
    {
        return view('dishes.show', [
            'dish' => $dish
        ]);
    }

    public function create()
    {
        return view('dishes.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('dishes', 'slug')],
            'description' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();
       

        $dish = Dish::create($attributes);

        $dish->tags()->attach(request('tags'));
        $dish->ingredients()->attach(request('ingredients'));


        return redirect('/dishes');
    }
}
