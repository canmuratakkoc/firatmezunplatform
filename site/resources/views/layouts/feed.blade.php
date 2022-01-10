<?php use App\Models\Kullanici; ?>
<html>
<head>
    <title>FIRAT ÜNİVERSİTESİ MEZUN PLATFORMU</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/stil.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .dropdown-item {
            cursor: pointer;
        }

        input[type="file"] {
            display: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="logo.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
            <a style="margin-left: 1rem;" class="navbar-brand"> FIRAT ÜNİVERSİTESİ MEZUN PLATFORMU </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-2">
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">Akış</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">İlanlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">Duyurular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="profil/{{Session::get('basarili')}}">{{Kullanici::firstwhere('id', Session::get('basarili'))->ad}}</a>
                    </li>
                    <li>
                        <div class="btn-group">
                            <button type="button" id="bildirimButon" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="bildirim" class="bi bi-bell bld"></i>
                            </button>
                            <div class="dropdown-menu mt-5">
                                <a class="dropdown-item">Ayşe paylaşımınızı beğendi</a>
                                <a class="dropdown-item">Mehmet paylaşımınıza yorum yaptı</a>
                                <a class="dropdown-item">Ali paylaşımınızı beğendi</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <form class="d-flex mt-3">
                    <input class="form-control me-2" type="search" placeholder="arkadaş, ilan veya duyuru arayın" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                </form>
                <form class="d-flex mt-3" action="/" method="post" id="cikis">
                  @csrf
                  <a class="nav-link ms-2" onclick="document.getElementById('cikis').submit()" style="cursor: pointer">Çıkış</a>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
<script>
    bildirimButon = document.getElementById("bildirimButon");

    bildirimButon.addEventListener('mouseover', bildirimDolu, false);
    bildirimButon.addEventListener("mouseout", bildirimBos, false);

    function bildirimDolu() {
        document.getElementById("bildirim").classList.remove('bi-bell');
        document.getElementById("bildirim").classList.add('bi-bell-fill');
    }

    function bildirimBos() {
        document.getElementById("bildirim").classList.remove('bi-bell-fill');
        document.getElementById("bildirim").classList.add('bi-bell');
    }
</script>
@yield('script')
</html>
