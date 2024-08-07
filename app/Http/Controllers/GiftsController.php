<?php

namespace App\Http\Controllers;


use App\Models\Gifts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GiftsController extends Controller
{
    public function index()
    {
        $gifts = Gifts::all();
        return view('admin.gifts.index', compact('gifts'));
    }

    public function create()
    {
        return view('admin.gifts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'nama_bank' => 'required|max:255',
            'gambar' => 'nullable|image',
            'no_rek' => 'required|numeric',
        ]);

        // Inisialisasi data yang akan disimpan
        $data = $request->all();

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // Simpan file gambar di folder public/gambar dan dapatkan path-nya
            $path = $request->file('gambar')->store('gambar', 'public');
            // Tambahkan path gambar ke dalam data yang akan disimpan
            $data['gambar'] = $path;
        }

        // Simpan data ke database
        Gifts::create($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('gifts.index')->with('success', 'Gift created successfully.');
    }

    // public function show(Gifts $gift)
    // {
    //     return view('gifts.show', compact('gift'));
    // }

    public function edit(Gifts $gift)
    {
        return view('admin.gifts.edit', compact('gift'));
    }

    public function update(Request $request, Gifts $gift)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'nama_bank' => 'required|max:255',
            'gambar' => 'nullable|image',
            'no_rek' => 'required|numeric',
        ]);

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // Simpan file gambar dan ambil path-nya
            $path = $request->file('gambar')->store('public/gambar');

            // Tambahkan path gambar ke dalam data yang akan diperbarui
            $validatedData['gambar'] = $path;
        }

        // Update data gift
        $gift->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('gifts.index')->with('success', 'Gift updated successfully.');
    }

    public function destroy(Gifts $gift)
    {
         // Hapus gambar dari storage jika ada
         if ($gift->gambar) {
            Storage::disk('public')->delete($gift->gambar);
        }

        $gift->delete();

        return redirect()->route('gifts.index')->with('success', 'Gift deleted successfully.');
    }
}
