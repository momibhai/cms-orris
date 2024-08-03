<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Album::create($request->all());

        return redirect()->route('albums.index')->with('success', 'Album created successfully!');
    }

    public function show($id)
    {
        $album = Album::findOrFail($id);
        $media = $album->media; // Assuming you have a media relationship defined

        return view('albums.show', compact('album', 'media'));
    }

}
