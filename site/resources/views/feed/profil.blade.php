@extends('layouts.feed')

@section('content')
<?php use App\Models\Kullanici;
try {
        echo Kullanici::firstwhere('id', $_GET['kullanici'])->ad;
    } catch (Throwable $e) {
        echo $e;
        return view('feed.akis');
    }
?>
<link rel="stylesheet" href="../css/stil.css">
    <div class="mt-5 mx-3">
        <div class="row">
          <div class="col text-center">
            <div class="bg-light">
                <img src="p2.jpg" class="rounded-circle p-2" alt="Kullaniciresim" style="width:200px; height:200px; object-fit: cover">
                <div class="border-bottom border-dark p-2 pb-3"><a class="navbar-brand">Murat Can Akkoç {{Kullanici::firstwhere('id', $_GET['kullanici'])->ad}}</a></div>
                <div class="border-bottom border-dark p-2">eposta@hotmail.com</div>
                <div class="border-bottom border-dark p-2">Yazılım Mühendisliği</div>
                <div class="border-bottom border-dark p-2">Çalışmıyor</div>
                <div class="border-bottom border-dark p-2"> <i class="bi bi-instagram me-2"></i><a href="">INSTAGRAM</a></div>
                <div class="border-bottom border-dark p-2"> <i class="bi bi-twitter me-2"></i><a href="">TWITTER</a></div>
                <button type="submit" class="btn btn-outline-dark my-3">Profili Düzenle</button>
            </div>
          </div>
          <div class="col-8">
          </div>
          <div class="col">
          </div>
        </div>
      </div>
@endsection
