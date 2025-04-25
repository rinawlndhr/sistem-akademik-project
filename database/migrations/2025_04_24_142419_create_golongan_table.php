<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('golongan', function (Blueprint $table) {
            $table->string('id_Gol')->primary();
            $table->string('nama_Gol');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('golongan');
    }
};