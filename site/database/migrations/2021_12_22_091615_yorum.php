<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Yorum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('yorum', function (Blueprint $table) {
          $table->id();
          $table->BigInteger('ust_yorum')->nullable();
          $table->string('metin');
          $table->unsignedBigInteger('gonderi_id')->constrained();
          $table->unsignedBigInteger('kullanici_id')->constrained();
          $table->timestamps();


          $table->foreign('gonderi_id')->references('id')->on('gonderi');
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
        Schema::drop('yorum');
    }
}
