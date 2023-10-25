<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css" />

    <!-- Custom Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet" />

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Google Map -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>

    <!-- Capctha -->
    <script src="<?= base_url('/assets/js/captcha.js'); ?>"></script>

    <title><?= $title; ?></title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bgdarkblue sticky-top">
        <div class="container container-fluid d-flex justify-content-between">
            <a class="navbar-brand d-flex align-items-center" href="/user/index">
                <img src="/assets/img/logo-batang.png" height="50px" alt="" />
                <h4 class="text-white ff2 ms-2">
                    Dinas Pendidikan dan Kebudayaan <br />
                    Kabupaten Batang
                </h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-end">
                    <li class="nav-item">
                        <a class="nav-link" id="beranda" aria-current="page" href="<?= base_url('user/index'); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tentang" href="<?= base_url('user/tentang'); ?>">Tentang</a>
                    </li>
                    <li class="nav-item dropdown dropdown__section">
                        <a class="nav-link dropdown-toggle" href="#" id="rekapData" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Sekolah
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="rekapData">
                            <li>
                                <a class="dropdown-item text-black" href="<?= base_url('/user/dataSekolahDasar'); ?>">Sekolah Dasar</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-black" href="<?= base_url('/user/dataSekolahMenengahPertama'); ?>">Sekolah Menengah Pertama</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <?= $this->renderSection('content'); ?>

    <!-- Footer -->
    <footer class="bgdarkblue footer__section">
        <div class="container">
            <div class="pt40 pb20">
                <div class="row">
                    <div class="col-12 text-center col-md-4 text-md-start brand">
                        <h4 class="text-white mb20 fw-bold ff2 fs14 mb10">
                            Dinas Pendidikan dan Kebudayaan <br />
                            Kabupaten Batang
                        </h4>
                    </div>
                    <div class="col-12 text-center col-md-8 text-md-end">
                        <h4 class="text-white ff2 fs14">
                            Profil pendidikan merupakan website yang berisi informasi
                            terkait pendidikan di Kabupaten Batang. Website ini merupakan
                            bagian resmi dari dinas pendidikan dan kebudayaan kabupaten
                            batang. Informasi yang terdapat didalamnya dapat
                            dipertanggungjawabkan.
                        </h4>
                    </div>
                    <div class="kotak__saran d-flex justify-content-center justify-content-md-end mt20">
                        <a href="<?= base_url('/user/kotakSaran'); ?>">
                            <button class="btn btn-light ff2 button">Kotak Saran</button>
                        </a>
                    </div>
                </div>
                <div class="line mt40"></div>
                <div class="copyright text-center">
                    <h5 class="text-white ff2 mt20 fs12">
                        Copyright 2022 Sub Bagian Program, Dinas Pendidikan dan Kebudayaan
                        Kabupaten Batang. All Rights Reserved.
                    </h5>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer -->

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- JS Custom -->
    <script src="<?= base_url('/assets/js/main.js'); ?>"></script>
    <script src="https://kit.fontawesome.com/55f12d8286.js" crossorigin="anonymous"></script>
</body>

</html>