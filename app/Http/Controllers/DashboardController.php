<?php

namespace App\Http\Controllers;

use App\Models\BiodataPria;
use App\Models\BiodataWanita;
use App\Models\Info;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $infos = Info::all(); // Ambil semua data dari tabel infos
        $biodataPria = BiodataPria::all();
        $biodataWanita = BiodataWanita::all();
        return view('front-end.master', compact('infos', 'biodataPria', 'biodataWanita')); // Kirim data ke view
    }
}
