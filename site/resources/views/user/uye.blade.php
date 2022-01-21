<?php
$bolumler = App\Models\Bolum::all()->sortby('ad');
?>
<html>

<head>
    <title>FIRAT ÜNİVERSİTESİ MEZUN PLATFORMU</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/stil.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <style>
        .dropdown-item {
            cursor: pointer;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid vh-100" style="margin-top:100px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light rounded">
                <div class="text-center">
                    <h3 class="text-dark">Kayıt Ol</h3>
                </div>
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                  <strong>{{ $message }}</strong>
                </div>
                @endif
                <form action="kayit" method="post">
                  @csrf
                    <div class="p-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i
                                    class="bi bi-person-fill text-white"></i></span>
                            <input type="text" name="ad" class="form-control" placeholder="Ad Soyad">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i
                                    class="bi bi-telephone-fill text-white"></i></span>
                            <input type="number" name="telefon" class="form-control" maxlength="10" placeholder="Telefon örn: 5352125151">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i
                                    class="bi bi-calendar-date-fill text-white"></i></span>
                            <input type="text" name="dtarih" class="form-control" placeholder="Doğum Tarihi">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i class="bi bi-book-fill text-white"></i></span>
                            <select name="bolum" class="form-control">
                              <option value="-1" class="text-muted" selected>Bölüm</option>
                              <?php
                              foreach ($bolumler as $bolum) {
                               ?>
                              <option value="{{$bolum->id}}">{{$bolum->ad}}</option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i
                                    class="bi bi-calendar2-check-fill text-white"></i></span>
                            <input type="text" name="ktarih" class="form-control" placeholder="Kayıt Tarihi">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i
                                    class="bi bi-mortarboard-fill text-white"></i></span>
                            <input type="text" name="mtarih" class="form-control" placeholder="Mezuniyet Tarihi">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i
                                    class="bi bi-envelope-fill text-white"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i class="bi bi-key-fill text-white"></i></span>
                            <input type="password" name="sifre" class="form-control" placeholder="Şifre">
                        </div>
                        <button class="btn btn-dark text-center mt-2" name="kayit" type="submit">
                            Kayıt ol
                        </button>
                        <p class="text-center mt-5">Zaten üye misiniz?
                            <a class="btn btn-outline-dark" href="giris">Giriş yapın</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
