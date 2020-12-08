<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $slug = $request->input('slug');
        $title = $request->input('title');
        $description = $request->input('description');
        if ($slug && $title && $description){
            return view('detail', compact('slug','title','description'));
        }
        return redirect()->back();
    }
}
