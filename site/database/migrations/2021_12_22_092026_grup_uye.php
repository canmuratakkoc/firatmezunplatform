<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GrupUye extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('grup_uye', function (Blueprint $table) {
          $table->id();
          $table->boolean('izin');
          $table->boolean('aktif');
          $table->unsignedBigInteger('kullanici_id')->constrained();
          $table->unsignedBigInteger('grup_id')->constrained();
          $table->timestamp('k_tarih',$precision = 0);
          $table->timestamps();

          $table->foreign('kullanici_id')->references('id')->on('kullanici');
          $table->foreign('grup_id')->references('id')->on('grup');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grup_uye');
    }
}
