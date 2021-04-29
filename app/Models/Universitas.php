<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'id_provinsi',
        'id_kab_kota',
        'latitude',
        'longitude',
        'link_web',
        'no_telp',
        'status',
        'jumlah_mahasiswa',
        'logo',
        'bidang_keilmuan'
    ];

    public function provinsi()
    {
        return $this->belongsTo(Province::class, 'id_provinsi', 'id');
    }

    public function kab_kota()
    {
        return $this->belongsTo(Regency::class, 'id_kab_kota', 'id');
    }
}
