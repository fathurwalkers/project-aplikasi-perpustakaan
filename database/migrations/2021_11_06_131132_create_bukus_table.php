<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('buku_judul')->nullable();
            $table->string('buku_kode')->nullable();
            $table->string('buku_kodekategori')->nullable();
            $table->string('buku_penerbit')->nullable();
            $table->string('buku_penulis')->nullable();
            $table->string('buku_tahunterbit')->nullable();
            $table->string('buku_jumlahhalaman')->nullable();
            $table->integer('buku_support_rekomendasi')->nullable()->default(0);

            $table->unsignedBigInteger('kategori_id')->nullable()->default(null);
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
