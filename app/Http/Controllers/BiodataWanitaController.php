<?php

namespace App\Http\Controllers;

use App\Models\BiodataWanita;
use Illuminate\Http\Request;

class BiodataWanitaController extends Controller
{
    public function index()
    {
        $biodataWanita = BiodataWanita::all();
        return view('admin.wanita.index', compact('biodataWanita'));
    }

    public function create()
    {
        return view('admin.wanita.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'ibu' => 'required|string|max:255',
            'bapak' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $biodataWanita = new BiodataWanita($validatedData);

        if ($request->hasFile('foto')) {
            $biodataWanita->foto = $request->file('foto')->store('foto_wanita', 'public');
        }

        $biodataWanita->save();

        return redirect()->route('biodataWanita.index')->with('success', 'Biodata Wanita berhasil ditambahkan.');
    }

    public function show(BiodataWanita $biodataWanita)
    {
        // return view('biodata_Wanita.show', compact('biodataWanita'));
    }

    public function edit(BiodataWanita $biodataWanita)
    {
        return view('admin.wanita.edit', compact('biodataWanita'));
    }

    public function update(Request $request, BiodataWanita $biodataWanita)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'ibu' => 'required|string|max:255',
            'bapak' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $biodataWanita->fill($validatedData);

        if ($request->hasFile('foto')) {
            $biodataWanita->foto = $request->file('foto')->store('foto_wanita', 'public');
        }

        $biodataWanita->save();

        return redirect()->route('biodataWanita.index')->with('success', 'Biodata wanita berhasil diupdate.');
    }

    public function destroy(BiodataWanita $biodataWanita)
    {
        $biodataWanita->delete();

        return redirect()->route('biodataWanita.index')->with('success', 'Biodata wanita berhasil dihapus.');
    }
}
