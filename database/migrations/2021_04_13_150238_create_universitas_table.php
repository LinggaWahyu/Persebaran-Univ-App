<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->longText('alamat');
            $table->unsignedInteger('id_provinsi');
            $table->unsignedInteger('id_kab_kota');
            $table->decimal('latitude', 11, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('link_web')->nullable();
            $table->string('no_telp', 15)->nullable();
            $table->enum('status', ['Kementerian Riset Teknologi dan Pendidikan Tinggi', 'Kementerian Agama', 'Kementerian Dalam Negeri', 'Kementerian Energi dan Sumber Daya Mineral', 'Kementerian Hukum dan HAM', 'Kementerian Pariwisata', 'Kementerian Kesehatan', 'Kementerian Keuangan', 'Kementerian Komunikasi dan Informatika', 'Kementerian Perhubungan', 'Kementerian Perindustrian', 'Kementerian Pertanian', 'Kementerial Sosial']);
            $table->integer('jumlah_mahasiswa');
            $table->string('logo')->nullable();
            $table->longText('bidang_keilmuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('universitas');
    }
}
