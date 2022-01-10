<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kullanici extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('kullanici', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('bolum_id')->nullable()->constrained();
          $table->unsignedBigInteger('resim_id')->nullable()->constrained();
          $table->boolean('yetki');
          $table->boolean('editor');
          $table->string('mail','75');
          $table->string('sifre','20');
          $table->string('ad','50');
          $table->string('telefon','10');
          $table->string('d_tarih','10');
          $table->string('k_tarih','10');
          $table->string('m_tarih','10');
          $table->string('facebook','50')->nullable();
          $table->string('instagram','30')->nullable();
          $table->string('twitter','15')->nullable();
          $table->timestamp('son_giris',$precision = 0);
          $table->boolean('aktif');
          $table->timestamps();

          $table->foreign('bolum_id')->references('id')->on('bolum');
          $table->foreign('resim_id')->references('id')->on('resim');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kullanici');
    }
}
