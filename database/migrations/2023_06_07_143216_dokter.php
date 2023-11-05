<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokter', function(Blueprint $table){
          $table->increments('id');
          $table->text('nama_dokter');
          $table->text('spesialis');
          $table->text('alamat');
          $table->string('no_telp');
          $table->date('jadwal_dokter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
