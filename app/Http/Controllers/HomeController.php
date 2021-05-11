<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use App\Models\Universitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        if (!$request->id_provinsi && !$request->id_kab_kota && !$request->keyword && !$request->bidang_keilmuan) {
            $univs = Universitas::all();

            return view('home', [
                'univs' => $univs,
                'search_result' => null
            ]);
        } 
        
        if ($request->id_provinsi && $request->id_kab_kota) {
            $provinsi = Province::where('id', $request->id_provinsi)->first();
            $kab_kota = Regency::where('id', $request->id_kab_kota)->first();

            $univs = Universitas::with(['provinsi', 'kab_kota'])->where('id_provinsi', $request->id_provinsi)->where('id_kab_kota', $request->id_kab_kota)->get();

            return view('home', [
                'univs' => $univs,
                'search_result' => $provinsi->name . ", " . $kab_kota->name
            ]);
        }

        if ($request->keyword) {
            $univs = Universitas::with(['provinsi', 'kab_kota'])->where('nama', 'LIKE', "%{$request->keyword}%")->get();

            return view('home', [
                'univs' => $univs,
                'search_result' => $request->keyword
            ]);
        }

        if ($request->bidang_keilmuan) {
            $univs = Universitas::all();

            $univs_result = array();

            foreach ($univs as $univ) {
                $univ->bidang_keilmuan = explode(',', $univ->bidang_keilmuan);

                foreach ($univ->bidang_keilmuan as $bidang_keilmuan) {
                    if ($bidang_keilmuan == $request->bidang_keilmuan) {
                        $univs_result[] = $univ;
                    }
                }
            }

            $univs = $univs_result;
            
            return view('home', [
                'univs' => $univs,
                'search_result' => $request->bidang_keilmuan
            ]);
        }
    }

    public function detail($id)
    {
        $univ = Universitas::findOrFail($id);

        $provinsi = Province::where('id', $univ->id_provinsi)->first();
        $kab_kota = Regency::where('id', $univ->id_kab_kota)->first();

        $univ['provinsi'] = $provinsi->name;
        $univ['kab_kota'] = $kab_kota->name;

        $bidang_keilmuan = explode(',', $univ->bidang_keilmuan);

        $univ['bidang_keilmuan'] = $bidang_keilmuan;

        return view('detail', [
            'univ' => $univ
        ]);
    }
}
