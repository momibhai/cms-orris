<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function create($albumId)
    {
        $album = Album::findOrFail($albumId);
        return view('media.create', compact('album'));
    }

    public function store(Request $request, $albumId)
    {
        // Validate the incoming request
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,avi,wmv|max:20480', // Max size 20MB
        ]);
    
        // Find the album or fail with a 404 error
        $album = Album::findOrFail($albumId);
    
        // Store the file and get the file path
        $filePath = $request->file('file')->store('media', 'public');
    
        // Create a new media record
        Media::create([
            'album_id' => $album->id,
            'file_path' => $filePath,
        ]);
    
        // Redirect back to the albums index with a success message
        return redirect()->route('albums.index')->with('success', 'Media uploaded successfully!');
    }
    
}
