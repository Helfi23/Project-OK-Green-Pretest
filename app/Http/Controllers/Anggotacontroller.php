<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use Faker\Core\File;
use Illuminate\Http\Request;

class Anggotacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('anggota.index')->with([
            'anggota'=> AnggotaModel::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'keterangan' => 'required',
            'status' => 'required'
        ]);
        $anggota = new AnggotaModel();
        $anggota->name = $request->name;
        $anggota->keterangan = $request->keterangan;
        $anggota->status = $request->status;

        $anggota->save();

        return redirect()->route('anggota.index')->with('success','Anggota Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnggotaModel $anggota)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('anggota.edit')->with([
            'anggota' => AnggotaModel::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $anggota)
    {
        $request->validate([
            'name' => 'required',
            'keterangan' => 'required',
            'status' => 'required'
        ]);
        $anggota = AnggotaModel::find($anggota);
        $anggota->name = $request->name;
        $anggota->keterangan = $request->keterangan;
        $anggota->status = $request->status;

        $anggota->save();

        return redirect()->route('anggota.index')->with('success','Anggota Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnggotaModel $anggota)
    {
       AnggotaModel::destroy($anggota->id);
       return redirect("anggota");
    }
}
