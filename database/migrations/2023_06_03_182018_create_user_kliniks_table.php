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
        Schema::create('user_kliniks', function (Blueprint $table) {
            // Tabel data pasien
            $table->increments('id');
            $table->foreignId('id_spesialis');
            $table->date('jadwal_kedatangan');
            $table->string('keluhan')->nullable();
            $table->string('nama_lengkap');
            $table->string('jns_kelamin');
            $table->date('tgl_lahir');
            $table->string('nik');
            $table->string('no_telp');
            $table->string('alamat');
            $table->string('pembayaran');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_kliniks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('user_kliniks');
    }
};
