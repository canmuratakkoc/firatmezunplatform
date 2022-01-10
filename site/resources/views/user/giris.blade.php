<html>

<head>
    <title>FIRAT ÜNİVERSİTESİ MEZUN PLATFORMU</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/stil.css">
</head>

<body>
    <div class="container-fluid vh-100" style="margin-top:100px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light rounded">
                <div class="text-center">
                    <h3 class="text-dark">Giriş Yap</h3>
                </div>
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                  <strong>{{ $message }}</strong>
                </div>
                @endif
                <form action="/" method="post">
                @csrf
                    <div class="p-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i
                                    class="bi bi-envelope-fill text-white"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark"><i class="bi bi-key-fill text-white"></i></span>
                            <input type="password" name="sifre" class="form-control" placeholder="Şifre">
                        </div>
                        <button class="btn btn-dark text-center mt-2" type="submit" name="giris">
                            Giriş Yap
                        </button>
                            <a class="btn btn-outline-dark text-center mt-2" href="kurtar" style="float:right">Şifremi unuttum</a>
                        <p class="text-center mt-5">Hesabınız yok mu?
                            <a class="btn btn-outline-dark" href="kayit">Aramıza katılın</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
