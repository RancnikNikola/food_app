<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishCommentsController extends Controller
{
    public function store(Dish $dish)
    {
        dd($dish);

        request()->validate([
            'body' => 'required'
        ]);

        $dish->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        //dd($dish);

        return back();
    }
}
