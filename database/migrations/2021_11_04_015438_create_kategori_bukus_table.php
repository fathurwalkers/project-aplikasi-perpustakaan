<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriBukusTable extends Migration
{
    public function up()
    {
        Schema::create('buku_kategori', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('kategori_id')->nullable()->default(null);
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');

            $table->unsignedBigInteger('buku_id')->nullable()->default(null);
            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buku_kategori');
    }
}
