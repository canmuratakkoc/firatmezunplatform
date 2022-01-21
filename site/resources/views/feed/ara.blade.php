@extends('layouts.feed')

@section('content')
<?php
use App\Models\Kullanici;
use App\Models\Resim;
?>
    <div class="mt-5 mx-3">
        <div class="row">
            <div class="col">
                <!-- Boşluk -->
            </div>
            <div class="col-6">
                <!-- Filtreler -->
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a href="?keywoard={{$_GET['keywoard']}}&filtre=k" class="border-3 border-dark nav-link {{($_GET['filtre']=='k') ? 'border-bottom' : ''}}">Kişiler</a></li>
                    <li class="list-inline-item"><a href="?keywoard={{$_GET['keywoard']}}&filtre=g" class="border-3 border-dark nav-link {{($_GET['filtre']=='g') ? 'border-bottom' : ''}}">Gruplar</a></li>
                    <li class="list-inline-item"><a href="?keywoard={{$_GET['keywoard']}}&filtre=i" class="border-3 border-dark nav-link {{($_GET['filtre']=='i') ? 'border-bottom' : ''}}">İlanlar</a></li>
                    <li class="list-inline-item"><a href="?keywoard={{$_GET['keywoard']}}&filtre=d" class="border-3 border-dark nav-link {{($_GET['filtre']=='d') ? 'border-bottom' : ''}}">Duyurlar</a></li>
                </ul>
                <?php
                  if($_GET['filtre']=='k') {
                    $sonuclar = App\Models\Kullanici::where('ad', 'like', '%'.$_GET['keywoard'].'%')->get();
                  }
                  foreach ($sonuclar as $sonuc) {
                ?>
                <div class="bg-light p-3">
                  <div class="form-group my-2 py-2 border-bottom border-dark">
                      <img class="rounded-circle" src="images/{{Resim::firstwhere('id', $sonuc->resim_id)->adres}}" alt="profil_resmi"
                          style="width: 40px; height: 40px; object-fit: cover">
                      <a class="navbar-brand ms-2" href="">{{$sonuc->ad}}</a>
                  </div>
                </div>
                <?php } ?>
            </div>
            <div class="col">
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        const begeniIcon = document.querySelectorAll('.begeni-butonu');
        begeniIcon.forEach(el => el.addEventListener('mouseover', event => {
            el.classList.remove('bi-hand-thumbs-up');
            el.classList.add('bi-hand-thumbs-up-fill');
        }));

        begeniIcon.forEach(el => el.addEventListener('mouseout', event => {
            el.classList.remove('bi-hand-thumbs-up-fill');
            el.classList.add('bi-hand-thumbs-up');
        }));
    </script>
    @endsection
