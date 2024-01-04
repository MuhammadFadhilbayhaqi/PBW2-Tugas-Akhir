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
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama');
            $table->string('noHp');
            $table->string('alamatEmail');
            $table->string('alamatLengkap');
            $table->string('detail');
            $table->string('provinsi');
            $table->string('kecamatan');
            $table->string('jadwal');
            $table->string('informasi');
            $table->string('syarat');
            $table->string('image');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
