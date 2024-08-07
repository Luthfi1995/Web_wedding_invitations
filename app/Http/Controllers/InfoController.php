<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::all();
        return view('admin.info.index', compact('infos'));
    }

    public function create()
    {
        return view('admin.info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengantin_istri' => 'required',
            'nama_pengantin_pria' => 'required',
            'tanggal_pernikahan' => 'required|date',
            'waktu_acara' => 'required|date_format:H:i',
            'alamat' => 'required',
            'deskripsi' => 'required'
        ]);

        Info::create($request->all());

        return redirect()->route('info.index')->with('success', 'Info created successfully.');
    }



    public function edit(Info $info)
    {
        return view('admin.info.edit', compact('info'));
    }

    public function update(Request $request, Info $info)
    {
        $request->validate([
            'nama_pengantin_istri' => 'required|exists:infos,id',
            'nama_pengantin_pria' => 'required|exists:infos,id',
            'tanggal_pernikahan' => 'required|date',
            'waktu_acara' => 'required|date_format:H:i',
            'alamat' => 'required',
            'deskripsi' => 'required'
        ]);


        $info->update($request->all());

        return redirect()->route('info.index')->with('success', 'Info updated successfully.');
    }

    public function destroy(Info $info)
    {
        // Hapus data yang bergantung terlebih dahulu
        $info->galleries()->delete(); // Misalnya, jika ada relasi dengan model 'Gallery'
        $info->delete();

        return redirect()->route('info.index')->with('success', 'Info deleted successfully.');
    }
}
