<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kullanici;
use App\Models\Resim;
use App\Models\Gonderi;

class UserController extends Controller
{
  function kullanici(Request $req) {
    function pre_up($str){
      $str = str_replace('i', 'İ', $str);
      $str = str_replace('ı', 'I', $str);
      return $str;
    }
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
            $req -> session() -> put('id', $id);
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
      } else if(strlen($data['telefon'])!=10) {
        return back()->with('error','Telefon numarası 10 haneli olmalıdır!');
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
          'ad' => mb_strtoupper(pre_up($data['ad']), 'UTF-8'),
          'telefon' => $data['telefon'],
          'd_tarih' => $data['dtarih'],
          'k_tarih' => $data['ktarih'],
          'm_tarih' => $data['mtarih'],
          'son_giris' => date("d.m.Y"),
          'aktif' => 1,
        ]);
        return view('user.giris');
      }
    } else if(isset($_POST['paylas'])) {
      $image = $req->file('resim');
      $teaser_image = date("Y-m-d") . ' ' . date("H.i.s").'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/images');
      $image->move($destinationPath, $teaser_image);
      Resim::create([
        'adres' => $teaser_image,
      ]);
      Gonderi::create([
        'metin' => $req->input('icerik'),
        'resim_id' => Resim::firstwhere('adres', '=', $teaser_image)->id,
        'kullanici_id' => session('id'),
      ]);
      return back();
    } else {
      // Çıkış
      session() -> pull('id');
      return view('welcome');
    }
  }

  function guncelle(Request $req) {
    $data = $req -> input();
      $image = $req->file('resim');
    if($image != null) {
      $teaser_image = date("Y-m-d") . ' ' . date("H.i.s").'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/images');
      $image->move($destinationPath, $teaser_image);
      Resim::create([
        'adres' => $teaser_image,
      ]);
    } else {
      $teaser_image = Resim::firstwhere('id', Kullanici::firstwhere('id', $data['kullanici_id'])->resim_id)->adres;
    }
    Kullanici::where('id', $data['kullanici_id'])
    ->update([
      'mail' => $data['mail'],
      'instagram' => $data['instagram'],
      'facebook' => $data['facebook'],
      'twitter' => $data['twitter'],
      'bolum_id' => $data['bolum'],
      'resim_id' => Resim::firstwhere('adres', '=', $teaser_image)->id
    ]);
    return redirect()->to('profil?kullanici='.$data['kullanici_id'])->send();
  }

  function kontrol() {
    if(session() -> has('id')) {
      return view('feed.akis');
    } else {
      return view('welcome');
    }
  }

  function kontrol_giris() {
    if(session() -> has('id')) {
      return view('feed.akis');
    } else {
      return view('user.giris');
    }
  }
}
