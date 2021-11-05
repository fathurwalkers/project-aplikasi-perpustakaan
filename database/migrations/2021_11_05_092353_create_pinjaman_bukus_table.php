<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanBukusTable extends Migration
{
    public function up()
    {
        Schema::create('buku_pinjaman', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('buku_id')->nullable()->default(null);
            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('cascade');

            $table->unsignedBigInteger('pinjaman_id')->nullable()->default(null);
            $table->foreign('pinjaman_id')->references('id')->on('pinjaman')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buku_pinjaman');
    }
}
