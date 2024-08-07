<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galeries = Gallery::all();
        return view('admin.gallery.index', compact('galeries'));
    }

    public function create()
    {
        $infos = Info::all();
        return view('admin.gallery.create', compact('infos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_nama_pengantin_istri' => 'required|exists:infos,id',
            'id_nama_pengantin_pria' => 'required|exists:infos,id',
            'gambar' => 'nullable|image|max:2048',
            'deskripsi' => 'required'
        ]);


         // Inisialisasi data yang akan disimpan
         $data = $request->all();

         if ($request->hasFile('gambar')) {
             $data['gambar'] = $request->file('gambar')->store('galeries', 'public');
         }

        Gallery::create($data);

        return redirect()->route('gallery.index')->with('success', 'Gallery created successfully.');
    }

    // public function show(Gallery $gallery)
    // {
    //     return view('galeries.show', compact('galery'));
    // }

    public function edit(Gallery $gallery)
    {
        $infos = Info::all();
        return view('admin.gallery.edit', compact('gallery', 'infos'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'id_nama_pengantin_istri' => 'required|exists:infos,id',
            'id_nama_pengantin_pria' => 'required|exists:infos,id',
            'gambar' => 'nullable|image|max:2048',
            'deskripsi' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($gallery->gambar) {
                Storage::disk('public')->delete($gallery->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('galeries', 'public');
        }

        $gallery->update($request->all());

        return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
