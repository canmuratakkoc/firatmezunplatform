<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Basvuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('basvuru', function (Blueprint $table) {
          $table->id();
          $table->string('metin');
          $table->unsignedBigInteger('ilan_id')->constrained();
          $table->unsignedBigInteger('kullanici_id')->constrained();
          $table->timestamps();


          $table->foreign('ilan_id')->references('id')->on('ilan');
          $table->foreign('kullanici_id')->references('id')->on('kullanici');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('basvuru');
    }
}
