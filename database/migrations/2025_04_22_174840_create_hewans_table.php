<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('hewans', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('jenis_hewan');
        $table->string('jenis_kelamin');
        $table->integer('berat');
        $table->integer('umur'); // Tambahkan ke schema
        $table->string('mata');
        $table->string('kaki');
        $table->string('tanduk');
        $table->string('ekor');
        $table->string('telinga');
        $table->string('status'); // Layak atau Tidak Layak
        $table->timestamps();
    });
}
};
