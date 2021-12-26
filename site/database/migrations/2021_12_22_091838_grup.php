<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Grup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('grup', function (Blueprint $table) {
          $table->id();
          $table->string('baslik', 30);
          $table->string('aciklama', 300);
          $table->boolean('acik');
          $table->unsignedBigInteger('kullanici_id')->constrained();
          $table->timestamps();

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
        Schema::drop('grup');
    }
}
