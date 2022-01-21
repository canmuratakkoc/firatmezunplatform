@extends('layouts.feed')

@section('content')
<?php
use App\Models\Kullanici;
use App\Models\Bolum;
use App\Models\Resim;
$bolumler = App\Models\Bolum::all()->sortby('ad');
$gonderiler = App\Models\Gonderi::latest()->where('kullanici_id' , $_GET['kullanici'])->get();
?>
<link rel="stylesheet" href="../css/stil.css">
    <div class="mt-5 mx-3">
        <div class="row">
          <div class="col text-center">
            <div class="bg-light">
                <?php if(isset($_GET['edit']) && $_GET['kullanici'] == session('id')) { ?>
                  <form action="profil" method="post" id="editUser" enctype="multipart/form-data">
                  @csrf
                  <img src="images/{{Resim::firstwhere('id', Kullanici::firstwhere('id', $_GET['kullanici'])->resim_id)->adres}}" class="rounded-circle p-2" alt="Kullaniciresim" style="width:200px; height:200px; object-fit: cover">
                  <label for="file-upload" class="btn btn-outline-dark">
                      Resim Seç <i class="bi bi-image ms-2"></i>
                  </label>
                  <input name="resim" id="file-upload" type="file" accept="image/*" />
                  <div class="border-bottom border-dark p-2 pb-3"><a class="navbar-brand">{{Kullanici::firstwhere('id', $_GET['kullanici'])->ad}}</a></div>
                  <div class="border-bottom border-dark p-2"><input type="email" name="mail" class="form-control" placeholder="E-mail" value="{{Kullanici::firstwhere('id', $_GET['kullanici'])->mail}}"></div>
                  <div class="border-bottom border-dark p-2">
                    <div class="input-group">
                        <span class="input-group-text bg-dark"><i class="bi bi-book-fill text-white"></i></span>
                        <select name="bolum" class="form-control">
                          <option value="-1" class="text-muted" selected>Bölüm</option>
                          <?php
                          foreach ($bolumler as $bolum) {
                           ?>
                          <option value="{{$bolum->id}}" <?php if(Kullanici::firstwhere('id', $_GET['kullanici'])->bolum_id == $bolum->id) { echo 'selected="selected"'; } ?> >{{$bolum->ad}}</option>
                        <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="border-bottom border-dark p-2">
                  <div class="input-group">
                      <span class="input-group-text bg-dark"><i
                              class="bi bi-instagram text-white"></i></span>
                      <input type="text" name="instagram" class="form-control" placeholder="instagram" value="{{Kullanici::firstwhere('id', $_GET['kullanici'])->instagram}}">
                  </div></div>

                  <div class="border-bottom border-dark p-2">
                  <div class="input-group">
                      <span class="input-group-text bg-dark"><i
                              class="bi bi-twitter text-white"></i></span>
                      <input type="text" name="twitter" class="form-control" placeholder="twitter" value="{{Kullanici::firstwhere('id', $_GET['kullanici'])->twitter}}">
                  </div></div>

                  <div class="border-bottom border-dark p-2">
                  <div class="input-group">
                      <span class="input-group-text bg-dark"><i
                              class="bi bi-facebook text-white"></i></span>
                      <input type="text" name="facebook" class="form-control" placeholder="facebook" value="{{Kullanici::firstwhere('id', $_GET['kullanici'])->facebook}}">
                  </div></div>
                  <input type="text" name="kullanici_id" value="{{$_GET['kullanici']}}" style="display: none;">
                  <a onclick="document.getElementById('editUser').submit('edit')" class="btn btn-outline-dark my-3">Profili Kaydet</a>
                  </form>
              <?php } else {  ?>
                <img src="images/{{Resim::firstwhere('id', Kullanici::firstwhere('id', $_GET['kullanici'])->resim_id)->adres}}" class="rounded-circle p-2" alt="Kullaniciresim" style="width:200px; height:200px; object-fit: cover">
                <div class="border-bottom border-dark p-2 pb-3"><a class="navbar-brand">{{Kullanici::firstwhere('id', $_GET['kullanici'])->ad}}</a></div>
                <div class="border-bottom border-dark p-2">{{Kullanici::firstwhere('id', $_GET['kullanici'])->mail}}</div>
                <div class="border-bottom border-dark p-2">{{Bolum::firstwhere('id', Kullanici::firstwhere('id', $_GET['kullanici'])->bolum_id)->ad}}</div>
                <div class="border-bottom border-dark p-2"> <i class="bi bi-instagram me-2"></i><a target="_blank" href="https://www.instagram.com/{{Kullanici::firstwhere('id', $_GET['kullanici'])->instagram}}">INSTAGRAM</a></div>
                <div class="border-bottom border-dark p-2"> <i class="bi bi-twitter me-2"></i><a target="_blank" href="https://www.twitter.com/{{Kullanici::firstwhere('id', $_GET['kullanici'])->twitter}}">TWITTER</a></div>
                <div class="border-bottom border-dark p-2"> <i class="bi bi-facebook me-2"></i><a target="_blank" href="https://www.facebook.com/{{Kullanici::firstwhere('id', $_GET['kullanici'])->facebook}}">FACEBOOK</a></div>
                <?php
                if($_GET['kullanici'] == session('id')) {
                ?>
                <a href="?kullanici={{$_GET['kullanici']}}&edit=1" class="btn btn-outline-dark my-3">Profili Düzenle</a>

              <?php } } ?>

            </div>
          </div>
          <div class="col-8">
            <?php
            foreach ($gonderiler as $gonderi) {
             ?>
             <!-- Gönderi listele -->
             <form>
                 <div class="shadow-lg p-3 bg-light rounded">
                     <div class="form-group">
                         <img class="rounded-circle" src="images/{{Resim::firstwhere('id', Kullanici::firstwhere('id', $gonderi->kullanici_id)->resim_id)->adres}}" alt="profil_resmi" style="width: 40px; height: 40px; object-fit: cover">
                         <a class="navbar-brand ms-2" href="">{{Kullanici::firstwhere('id', $gonderi->kullanici_id)->ad}}</a>
                     </div>
                     <div class="form-group my-3">
                         <h5 class="border-bottom">{{$gonderi->metin}}</h5>
                         <img src="images/{{Resim::firstwhere('id', $gonderi->resim_id)->adres}}" alt="mühendislik binası" id="icerik" style="width: 100%;">
                     </div>
                     <!-- ↓ ↓ ↓ Etkileşim ↓ ↓ ↓ -->
                     <form>
                         <a class="text-decoration-none link-dark" href=""><i class="bi bi-hand-thumbs-up begeni-butonu me-2" style="font-size: 24px"></i></a>
                         <span class="me-2">150 beğeni</span>
                         <i class="bi bi-chat-square-dots ms-3 me-2" style="font-size: 24px"></i>
                         <span>3 yorum</span>
                         <div class="form-group border-top mt-2">
                             <label for="icerikPaylas">Yorumlarını biizmle paylaşın</label>
                             <textarea class="form-control my-2" id="icerikPaylas"></textarea>
                         </div>
                         <button type="submit" class="btn btn-outline-dark">Yorum yap</button>
                     </form>
                     <!-- ↑ ↑ ↑ Etkileşim Bitti ↑ ↑ ↑ -->
                     <div class="bg-light p-3 rounded mt-3">
                         <!-- ↓ ↓ ↓ Yorum ↓ ↓ ↓ -->
                         <img class="rounded-circle" src="images/p1.jpg" alt="profil_resmi" style="width: 40px; height: 40px; object-fit: cover">
                         <a class="text-decoration-none link-dark" href=""><i class="bi bi-exclamation-triangle" style="float:right; font-size:24px;"></i></a>
                         <div class="bg-light p-3 my-3" style="max-width: max-content; border-radius:25px; width:100%">
                             <a class="navbar-brand" href="">Murat Can Akkoç</a> <br>
                             <span class="pt-2" class="width: max-content;">Harika bir bina olmuş</span>
                         </div>
                         <!-- ↑ ↑ ↑ Yorum Bitti ↑ ↑ ↑ -->

                         <!-- ↓ ↓ ↓ Yorum ↓ ↓ ↓ -->
                         <img class="rounded-circle" src="images/p2.jpg" alt="profil_resmi" style="width: 40px; height: 40px; object-fit: cover">
                         <a class="text-decoration-none link-dark" href=""><i class="bi bi-exclamation-triangle" style="float:right; font-size:24px;"></i></a>
                         <div class="bg-light p-3 my-3" style="max-width: max-content; border-radius:25px;">
                             <a class="navbar-brand" href="">Cengiz Selvi</a> <br>
                             <span class="pt-2" class="width: max-content;">Harika bir bina olmuş</span>
                         </div>
                         <!-- ↑ ↑ ↑ Yorum Bitti ↑ ↑ ↑ -->

                         <!-- ↓ ↓ ↓ Yorum ↓ ↓ ↓ -->
                         <img class="rounded-circle" src="images/p3.jpg" alt="profil_resmi" style="width: 40px; height: 40px; object-fit: cover">
                         <a class="text-decoration-none link-dark" href=""><i class="bi bi-exclamation-triangle" style="float:right; font-size:24px;"></i></a>
                         <div class="bg-light p-3 my-3" style="max-width: max-content; border-radius:25px;">
                             <a class="navbar-brand" href="">Yavuz Selim Cingöz</a> <br>
                             <span class="pt-2" class="width: max-content;">Harika bir bina olmuş</span>
                         </div>
                         <!-- ↑ ↑ ↑ Yorum Bitti ↑ ↑ ↑ -->
                     </div>
                 </div>
             </form>
           <?php } ?>
          </div>
          <div class="col">
          </div>
        </div>
      </div>
@endsection
