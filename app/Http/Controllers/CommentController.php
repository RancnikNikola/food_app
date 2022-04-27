<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;


class CommentController extends Controller
{
    public function store(Dish $dish)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $dish->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
