<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpts', function (Blueprint $table) {
            $table->id();
            $table->string('jml_tps');
            $table->string('jml_laki');
            $table->string('jml_perempuan');
            $table->string('file');
            $table->bigInteger('kecamatan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dpts');
    }
}
