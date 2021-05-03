<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universitas;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class UniversitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $univ = Universitas::join('provinces','universitas.id_provinsi', '=', 'provinces.id')
            ->join('regencies', 'universitas.id_kab_kota', '=', 'regencies.id')
            ->get(['universitas.*', 'provinces.name as provinsi', 'regencies.name as kab_kota']);
        // dd($univ);
        return view('/admin/universitas', compact('univ'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/tambah_universitas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->status);
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'id_provinsi' => 'required',
            'id_kab_kota' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'status' => 'required',
            'jumlah_mahasiswa' => 'required',
        ]);

        // dd($request->all());
        Universitas::create($request->all());

        return redirect('/universitas')->with('status', 'Tambah Data Universitas Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $univ = Universitas::join('provinces','universitas.id_provinsi', '=', 'provinces.id')
            ->join('regencies', 'universitas.id_kab_kota', '=', 'regencies.id')
            ->find($id, ['universitas.*', 'provinces.name as provinsi', 'regencies.name as kab_kota']);
        // dd($univ);
        return view('/admin/edit_universitas', compact('univ'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->status);
        Universitas::where('id', $id)
            ->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'id_provinsi' => $request->id_provinsi,
            'id_kab_kota' => $request->id_kab_kota,
            'link_web' => $request->link_web,
            'no_telp' => $request->no_telp,
            'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
            'logo' => $request->logo,
            'status' => $request->status,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return redirect('/universitas')->with('update', 'Ubah Data Universitas Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Universitas::destroy($id);
        return redirect('/universitas')->with('hapus', 'Hapus Data Universitas Berhasil');
    }
}
