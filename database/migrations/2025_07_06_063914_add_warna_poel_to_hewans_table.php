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
        Schema::table('hewans', function (Blueprint $table) {
            $table->string('warna')->after('jenis_kelamin');
            $table->string('poel')->after('warna');
        });
    }

    public function down()
    {
        Schema::table('hewans', function (Blueprint $table) {
            $table->dropColumn(['warna', 'poel']);
        });
    }

};
