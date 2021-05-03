<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universitas;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\Storage;

class UniversitasController extends Controller
{

    private $statuses = [
        'Kementerian Riset Teknologi dan Pendidikan Tinggi', 
        'Kementerian Agama', 
        'Kementerian Dalam Negeri',
        'Kementerian Energi dan Sumber Daya Mineral',
        'Kementerian Hukum dan HAM',
        'Kementerian Pariwisata',
        'Kementerian Kesehatan',
        'Kementerian Keuangan',
        'Kementerian Komunikasi dan Informatika',
        'Kementerian Perhubungan',
        'Kementerian Perindustrian',
        'Kementerian Pertanian',
        'Kementerian Sosial'
    ];
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

        foreach ($univ as $unv) {
            $unv->bidang_keilmuan = explode(',', $unv->bidang_keilmuan);
        }    
        // return dd($univ);
        return view('/admin/universitas', compact('univ'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/tambah_universitas', [
            'statuses' => $this->statuses
        ]);
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
            'logo' => 'required',
            'link_web' => 'required',
            'no_telp' => 'required',
            'jumlah_mahasiswa' => 'required',
            'bidang_keilmuan' => 'required'
        ]);

        $data = $request->all();
        $data['bidang_keilmuan'] = implode(",", $data['bidang_keilmuan']);

        // return dd($data);

        if ($request->logo) {
            $data['logo'] = $request->file('logo')->store('images/logo', 'public');
        }

        Universitas::create($data);

        return redirect('/admin/universitas')->with('status', 'Tambah Data Universitas Berhasil');
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
        // return dd($univ);
        return view('admin.edit_universitas', [
            'univ' => $univ,
            'statuses' => $this->statuses
        ]);
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
        $data = $request->all();

        $univ = Universitas::find($id);

        if ($request->logo) {
            if ($univ->logo != null) {
                Storage::delete('public/' . $univ->logo);
            }
            $data['logo'] = $request->file('logo')->store('images/logo', 'public');
        }

        if ($request->bidang_keilmuan) {
            $data['bidang_keilmuan'] = implode(",", $data['bidang_keilmuan']);
        }

        $univ->fill($data);
        $univ->save();

        return redirect('/admin/universitas')->with('update', 'Ubah Data Universitas Berhasil');
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
        return redirect('/admin/universitas')->with('hapus', 'Hapus Data Universitas Berhasil');
    }
}
