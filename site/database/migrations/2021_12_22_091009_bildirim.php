<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bildirim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bildirim', function (Blueprint $table) {
          $table->id();
          $table->string('baslik',30);
          $table->string('metin',150);
          $table->string('link',50);
          $table->unsignedBigInteger('resim_id')->nullable()->constrained();
          $table->unsignedBigInteger('kullanici_id')->constrained();
          $table->timestamps();


          $table->foreign('resim_id')->references('id')->on('resim');
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
        Schema::drop('bildirim');
    }
}
