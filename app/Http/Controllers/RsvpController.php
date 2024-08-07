<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function index()
    {
        $rsvps = Rsvp::all();
        return view('admin.rsvp.index', compact('rsvps'));
    }

    public function create()
    {
        return view('admin.rsvp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tamu' => 'required',
            'jumlah' => 'required|integer',
            'kehadiran' => 'required|boolean'
        ]);

        Rsvp::create($request->all());

        return redirect()->route('rsvp.index')->with('success', 'Rspv created successfully.');
    }

    // public function show(Rsvp $rsvp)
    // {
    //     return view('rsv.show', compact('rspv'));
    // }

    public function edit(Rsvp $rsvp)
    {
        return view('admin.rsvp.edit', compact('rsvp'));
    }

    public function update(Request $request, Rsvp $rsvp)
    {
        $request->validate([
            'nama_tamu' => 'required',
            'jumlah' => 'required|integer',
            'kehadiran' => 'required|boolean'
        ]);

        $rsvp->update($request->all());

        return redirect()->route('rsvp.index')->with('success', 'Rspv updated successfully.');
    }

    public function destroy(Rsvp $rsvp)
    {
        $rsvp->delete();

        return redirect()->route('rsvp.index')->with('success', 'Rspv deleted successfully.');
    }
}
