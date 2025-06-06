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
        $table->string('jenis');
        $table->integer('berat');
        $table->string('mata');
        $table->string('hidung');
        $table->string('mulut');
        $table->string('tanduk');
        $table->string('kaki');
        $table->string('pernafasan');
        $table->string('feses');
        $table->string('status'); // Layak atau Tidak Layak
        $table->timestamps();
    });
}
};
