<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kullanici;

class UserController extends Controller
{
  function kullanici(Request $req) {
    if(isset($_POST['giris'])) {
      // Giriş doğrulama
      $data = $req -> input();
      if($data['email']==null) {
        return back()->with('error','E-mail yazmadınız!');
      } else if($data['sifre']==null) {
        return back()->with('error','Sifre yazmadınız!');
      } else {
        if (Kullanici::where('mail', '=', $data['email'])->exists()) {
          $id = Kullanici::firstwhere('mail', '=', $data['email'])->id;
          if (Kullanici::firstwhere('id', '=', $id)->sifre == $data['sifre']) {
            $req -> session() -> put('email', $data['email']);
            $req -> session() -> put('sifre', $data['sifre']);
            $req -> session() -> put('basarili', $id);
            return view('feed.akis');
          } else {
            return back()->with('error','Kullanıcı adı veya şifre hatalı!');
          }
        } else {
          return back()->with('error','Kullanıcı adı veya şifre hatalı!');
        }
      }

    } else if(isset($_POST['kayit'])) {
      // Veri tabanı kayıt işlemleri
      $data = $req -> input();
      if($data['ad']==null) {
        return back()->with('error','Ad Soyad yazmadınız!');
      } else if($data['telefon']==null) {
        return back()->with('error','Telefon numarası yazmadınız!');
      } else if($data['dtarih']==null) {
        return back()->with('error','Doğum tarihi yazmadınız!');
      } else if($data['bolum'] == -1) {
        return back()->with('error','Bölüm seçmediniz!');
      } else if($data['ktarih']==null) {
        return back()->with('error','Kayıt tarihi yazmadınız!');
      } else if($data['mtarih']==null) {
        return back()->with('error','Mezuniyet tarihi yazmadınız!');
      } else if($data['email']==null) {
        return back()->with('error','E-mail yazmadınız!');
      } else if($data['sifre']==null) {
        return back()->with('error','Şifre yazmadınız!');
      } else if (Kullanici::where('telefon', '=', $data['telefon'])->exists()) {
        return back()->with('error','Aynı telefon numarası ile 1 kere kayıt yapılabilir!');
      } else if(Kullanici::where('mail', '=', $data['email'])->exists()) {
        return back()->with('error','Aynı mail ile 1 kere kayıt yapılabilir!');
      } else {
        Kullanici::create([
          'bolum_id' => $data['bolum'],
          'resim_id' => 1,
          'yetki' => 0,
          'editor' => 0,
          'mail' => $data['email'],
          'sifre' => $data['sifre'],
          'ad' => $data['ad'],
          'telefon' => $data['telefon'],
          'd_tarih' => $data['dtarih'],
          'k_tarih' => $data['ktarih'],
          'm_tarih' => $data['mtarih'],
          'son_giris' => date("d.m.Y"),
          'aktif' => 1,
        ]);
        return view('user.giris');
      }
    } else {
      // Çıkış
      session() -> pull('basarili');
      return view('welcome');
    }
  }

  function kontrol() {
    if(session() -> has('basarili')) {
      return view('feed.akis');
    } else {
      return view('user.giris');
    }
  }
}
