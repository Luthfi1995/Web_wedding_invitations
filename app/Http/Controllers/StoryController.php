<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::all();
        return view('admin.story.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.story.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('stories', 'public');
        }

        Story::create($data);

        return redirect()->route('story.index')->with('success', 'Story created successfully.');
    }



    public function edit(Story $story)
    {
        return view('admin.story.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($story->gambar) {
                Storage::disk('public')->delete($story->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('stories', 'public');
        }

        $story->update($data);

        return redirect()->route('story.index')->with('success', 'Story updated successfully.');
    }

    public function destroy(Story $story)
    {
        // Hapus gambar dari storage jika ada
        if ($story->gambar) {
            Storage::disk('public')->delete($story->gambar);
        }

        $story->delete();

        return redirect()->route('story.index')->with('success', 'Story deleted successfully.');
    }
}
