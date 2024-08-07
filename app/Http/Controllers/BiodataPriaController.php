<?php

namespace App\Http\Controllers;

use App\Models\BiodataPria;
use Illuminate\Http\Request;

class BiodataPriaController extends Controller
{
    public function index()
    {
        $biodataPria = BiodataPria::all();
        return view('admin.pria.index', compact('biodataPria'));
    }

    public function create()
    {
        return view('admin.pria.create');
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

        $biodataPria = new BiodataPria($validatedData);

        if ($request->hasFile('foto')) {
            $biodataPria->foto = $request->file('foto')->store('foto_pria', 'public');
        }

        $biodataPria->save();

        return redirect()->route('biodataPria.index')->with('success', 'Biodata pria berhasil ditambahkan.');
    }

    public function show(BiodataPria $biodataPria)
    {
        return view('biodata_pria.show', compact('biodataPria'));
    }

    public function edit(BiodataPria $biodataPria)
    {
        return view('admin.pria.edit', compact('biodataPria'));
    }

    public function update(Request $request, BiodataPria $biodataPria)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'ibu' => 'required|string|max:255',
            'bapak' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $biodataPria->fill($validatedData);

        if ($request->hasFile('foto')) {
            $biodataPria->foto = $request->file('foto')->store('foto_pria', 'public');
        }

        $biodataPria->save();

        return redirect()->route('biodataPria.index')->with('success', 'Biodata pria berhasil diupdate.');
    }

    public function destroy(BiodataPria $biodataPria)
    {
        $biodataPria->delete();

        return redirect()->route('biodataPria.index')->with('success', 'Biodata pria berhasil dihapus.');
    }
}
