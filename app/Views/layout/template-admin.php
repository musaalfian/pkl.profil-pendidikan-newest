<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom style -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/admin-style.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css'); ?>" />

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <title><?= $title; ?></title>
</head>

<body>
    <!-- Sidebar section -->
    <input type="checkbox" name="" id="nav-toogle" />
    <div class="sidebar__section">
        <div class="sidebar__brand d-flex align-items-center justify-content-center">
            <div class="d-flex justify-content-center px-2 py-3 align-items-center icon__admin">
                <i class="fa-solid fa-user-gear me-2" id="navAdmin"></i>
                <h3 class="text-white ff2">Admin</h3>
            </div>
        </div>
        <div class="sidebar__menu">
            <div class="menu__content">
                <a href="<?= base_url('admin/dashboard'); ?>" class="text-decoration-none">
                    <span class="text-white"><i class="bi bi-house-door-fill" id="navDashboard"></i></span>
                    <span class="ms-2 fs18" id="navDashboard1">Dashboard</span>
                </a>
            </div>
            <div class="menu__content mt10">
                <a href="<?= base_url('admin/dataSd'); ?>" class="text-decoration-none">
                    <span class="text-white"><i class="fa-solid fa-rectangle-list" id="navDataSd"></i></span>
                    <span class="ms-2 fs18" id="navDataSd1">Data SD</span>
                </a>
            </div>
            <div class="menu__content mt10">
                <a href="<?= base_url('admin/dataSmp'); ?>" class="text-decoration-none">
                    <i class="fa-solid fa-rectangle-list" id="navDataSmp"></i>
                    <span class="ms-2 fs18" id="navDataSmp1">Data SMP</span>
                </a>
            </div>
            <div class="menu__content mt10">
                <a href="<?= base_url('admin/strukturOrganisasi'); ?>" class="text-decoration-none">
                    <i class="bi bi-person-lines-fill" id="navStrukturOrganisasi"></i>
                    <span class="ms-2 fs18" id="navStrukturOrganisasi1">Struktur Organisasi</span>
                </a>
            </div>
            <div class="menu__content mt10">
                <a href="<?= base_url('admin/jabatan'); ?>" class="text-decoration-none">
                    <i class="fa-solid fa-sitemap" id="navJabatan"></i>
                    <span class="ms-2 fs18" id="navJabatan1">Jabatan</span>
                </a>
            </div>
            <div class="menu__content mt10">
                <a href="<?= base_url('admin/kotakSaran'); ?>" class="text-decoration-none">
                    <i class="bi bi-chat-left-text-fill" id="navKotakSaran"></i>
                    <span class="ms-2 fs18" id="navKotakSaran1">Kotak Saran</span>
                </a>
            </div>
            <div class="menu__content mt10">
                <a href="/logout" class="text-decoration-none">
                    <i class="bi bi-door-open-fill"></i>
                    <span class="ms-2 fs18">Logout</span>
                </a>
            </div>
        </div>
    </div>
    <!-- End sidebar section -->

    <div class="main__section">
        <!-- Header -->
        <div class="header bgdarkblue d-flex justify-content-between align-items-center px-4">
            <label for="nav-toogle">
                <img src="<?= base_url('/assets/img/bar-putih.svg'); ?>" height="20px" alt="" for />
            </label>
            <a class="navbar-brand d-flex align-items-center" href="">
                <img src="<?= base_url('/assets/img/logo-batang.png'); ?>" height="50px" alt="" />
                <h4 class="text-white ff2 ms-2">
                    Dinas Pendidikan dan Kebudayaan <br />
                    Kabupaten Batang
                </h4>
            </a>
            <div class="kosong"></div>
        </div>

        <?= $this->renderSection('content'); ?>

        <!-- Footer -->
        <footer class="p-4 text-center mt40">
            <h4 class="ff2">
                ©2022. Dinas Pendidikan dan Kebudayaan Kabupaten Batang. All rights
                reserved
            </h4>
        </footer>
        <!-- End footer -->
    </div>
    <!-- End header -->


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- JS Custom -->
    <script src="<?= base_url('/assets/js/main.js'); ?>"></script>
    <script src="https://kit.fontawesome.com/55f12d8286.js" crossorigin="anonymous"></script>
</body>

</html>