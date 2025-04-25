<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ruang', function (Blueprint $table) {
            $table->string('id_ruang')->primary();
            $table->string('nama_ruang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ruang');
    }
};