@extends('layouts.feed')

@section('content')
    <div class="mt-5 mx-3">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-column bg-white" style="width: 100%;">
                    <a href="/" class="d-flex align-items-center p-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-4 mx-auto">DUYURULAR</span>
                    </a>
                    <div class="list-group list-group-flush border-bottom">
                        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">Mühendislik Binası Yenilendi</strong>
                                <small class="text-muted">Çar</small>
                            </div>
                            <div class="col-10 mb-1 small">Yeni mühendislik binasını yeniledik. Ayrıntılar Fırat
                                Üniversitesi resmi instagram adresinde</div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">Mühendislik Binası Yenilendi</strong>
                                <small class="text-muted">Çar</small>
                            </div>
                            <div class="col-10 mb-1 small">Yeni mühendislik binasını yeniledik. Ayrıntılar Fırat
                                Üniversitesi resmi instagram adresinde</div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">Mühendislik Binası Yenilendi</strong>
                                <small class="text-muted">Çar</small>
                            </div>
                            <div class="col-10 mb-1 small">Yeni mühendislik binasını yeniledik. Ayrıntılar Fırat
                                Üniversitesi resmi instagram adresinde</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Gönderi paylaş -->
                <form>
                    <div class="form-group">
                        <label for="icerikPaylas">Gelişmeleri bizimle paylaşın</label>
                        <textarea class="form-control my-2" id="icerikPaylas"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Paylaş</button>
                    <label for="file-upload" class="btn btn-outline-dark" style="float: right;">
                        Resim Ekle <i class="bi bi-image ms-2"></i>
                    </label>
                    <input id="file-upload" type="file" />
                </form>

                <!-- Gönderi listele -->
                <form>
                    <div class="shadow-lg p-3 bg-light rounded">
                        <div class="form-group">
                            <img class="rounded-circle" src="images/p1.jpg" alt="profil_resmi" style="width: 40px; height: 40px; object-fit: cover">
                            <a class="navbar-brand ms-2" href="">Murat Can Akkoç</a>
                        </div>
                        <div class="form-group my-3">
                            <h5 class="border-bottom">Yeni Mühendislik Binası Tam Bir Mühendislik Harikası</h5>
                            <img src="images/a.jpg" alt="mühendislik binası" id="icerik" style="width: 100%;">
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

            </div>
            <div class="col">
                <div class="d-flex flex-column bg-white" style="width: 100%;">
                    <a href="/" class="d-flex align-items-center p-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-4 mx-auto">İŞ İLANLARI</span>
                    </a>
                    <div class="list-group list-group-flush border-bottom">
                        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">MAKİNE MÜHENDİSİ</strong>
                                <small class="text-muted">Çar</small>
                            </div>
                            <div class="col-10 mb-1 small">Ford fabrikasında çalışacak alanında başarılı makine
                                mühendisi aranıyor</div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">MAKİNE MÜHENDİSİ</strong>
                                <small class="text-muted">Çar</small>
                            </div>
                            <div class="col-10 mb-1 small">Ford fabrikasında çalışacak alanında başarılı makine
                                mühendisi aranıyor</div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">MAKİNE MÜHENDİSİ</strong>
                                <small class="text-muted">Çar</small>
                            </div>
                            <div class="col-10 mb-1 small">Ford fabrikasında çalışacak alanında başarılı makine
                                mühendisi aranıyor</div>
                        </a>
                    </div>
                </div>
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
