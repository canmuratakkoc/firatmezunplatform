@extends('layouts.feed')

@section('content')
    <div class="mt-5 mx-3">
        <div class="row">
            <div class="col">
                <!-- Boşluk -->
            </div>
            <div class="col-6">
                <!-- Filtreler -->
                <ul class="list-inline text-center">
                    <li class="list-inline-item "><a href="#" class=" border-3 border-dark nav-link border-bottom">Kişiler</a></li>
                    <li class="list-inline-item"><a href="#" class="border-3 border-dark nav-link">Gruplar</a></li>
                    <li class="list-inline-item"><a href="#" class="border-3 border-dark nav-link">İlanlar</a></li>
                    <li class="list-inline-item"><a href="#" class="border-3 border-dark nav-link">Duyurlar</a></li>
                </ul>
                <div class="bg-light p-3">
                  <div class="form-group my-2 py-2 border-bottom border-dark">
                      <img class="rounded-circle" src="../../images/p1.jpg" alt="profil_resmi"
                          style="width: 40px; height: 40px; object-fit: cover">
                      <a class="navbar-brand ms-2" href="">Murat Can Akkoç</a>
                  </div>

                  <div class="form-group my-2 py-2 border-bottom border-dark">
                      <img class="rounded-circle" src="../../images/p2.jpg" alt="profil_resmi"
                          style="width: 40px; height: 40px; object-fit: cover">
                      <a class="navbar-brand ms-2" href="">Cengiz Selvi</a>
                  </div>

                  <div class="form-group my-2 py-2 border-bottom border-dark">
                      <img class="rounded-circle" src="../../images/p3.jpg" alt="profil_resmi"
                          style="width: 40px; height: 40px; object-fit: cover">
                      <a class="navbar-brand ms-2" href="">Yavuz Selim Cingöz</a>
                  </div>

                  <div class="form-group my-2 py-2 border-bottom border-dark">
                      <img class="rounded-circle" src="../../images/p4.jpg" alt="profil_resmi"
                          style="width: 40px; height: 40px; object-fit: cover">
                      <a class="navbar-brand ms-2" href="">Emircan İğrek</a>
                  </div>
                </div>

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
