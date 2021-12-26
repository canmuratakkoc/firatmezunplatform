<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Etkinlik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('etkinlik', function (Blueprint $table) {
          $table->id();
          $table->string('baslik',30);
          $table->string('metin');
          $table->timestamp('bas_tarih',$precision = 0);
          $table->timestamp('bit_tarih',$precision = 0);
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
        Schema::drop('etkinlik');
    }
}
