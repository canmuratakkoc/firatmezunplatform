<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RaporKayit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('rapor_kayit', function (Blueprint $table) {
          $table->id();
          $table->string('icerik');
          $table->unsignedBigInteger('rapor_id')->constrained();
          $table->unsignedBigInteger('kullanici_id')->constrained();
          $table->timestamps();

          $table->foreign('kullanici_id')->references('id')->on('kullanici');
          $table->foreign('rapor_id')->references('id')->on('rapor');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rapor_kayit');
    }
}
