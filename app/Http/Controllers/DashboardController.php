<?php

namespace App\Http\Controllers;

use App\Models\Universitas;
use Illuminate\Http\Request;

class DashboardController extends Controller
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

    public function index()
    {
        $count_univ = Universitas::all()->count();
        $count_univ_by_status = [];

        foreach ($this->statuses as $status) {
            $count_univ_by_status[$status] = Universitas::where('status', $status)->count();
        }

        return view('admin.index', [
            'count_univ' => $count_univ,
            'count_univ_by_status' => $count_univ_by_status
        ]);
    }
}
