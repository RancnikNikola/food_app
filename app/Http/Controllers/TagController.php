<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Validation\Rule;


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

    public function create()
    {
        return view('tags.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('tags', 'slug')],
        ]);
    
        Tag::create($attributes);

        return redirect('/tags');
    }
}
