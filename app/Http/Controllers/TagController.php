<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index', [
            'tags' => Tag::all()
        ]);
    }

    public function show(Tag $tag)
    {
        return view('tags.show', [
            'tag' => $tag
        ]);
    }
}
