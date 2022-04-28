<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use Illuminate\Validation\Rule;


class IngredientController extends Controller
{
    public function index()
    {
        return view('ingredients.index', [
            'ingredients' => Ingredient::all()
        ]);
    }

    public function show(Ingredient $ingredient)
    {
        return view('ingredients.show', [
            'ingredient' => $ingredient
        ]);
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('ingredients', 'slug')],
        ]);
    
        Ingredient::create($attributes);

        return redirect('/ingredients');
    }
}
