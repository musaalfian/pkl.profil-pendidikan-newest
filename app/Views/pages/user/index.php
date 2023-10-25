<?= $this->extend('layout/template-user'); ?>

<?= $this->section('content'); ?>
<!-- Main page -->
<div class="px">
  <div class="container">
    <!-- Carousel -->
    <div class="carousel__section">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active indikator" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="indikator mg15" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="indikator" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?= base_url('/assets/img/foto-depan-dinas.jpg'); ?>" class="d-block w-100" alt="gambar1" />
            <div class="carousel-caption d-none d-md-block">
              <h3 class="text-white fw-bold mb-3">
                Data dapat dipertanggungjawabkan kebenarannya
              </h3>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?= base_url('/assets/img/foto-depan-dinas.jpg'); ?>" class="d-block w-100" alt="gambar2" />
            <div class="carousel-caption d-none d-md-block">
              <h3 class="text-white fw-bold mb-3">
                Data dapat dipertanggungjawabkan kebenarannya
              </h3>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?= base_url('/assets/img/foto-depan-dinas.jpg'); ?>" class="d-block w-100" alt="gambar3" />
            <div class="carousel-caption d-none d-md-block">
              <h3 class="text-white fw-bold mb-3">
                Data dapat dipertanggungjawabkan kebenarannya
              </h3>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- End carousel -->

    <!-- Info penting -->
    <div class="info__section bgdarkblue d-flex align-items-center py-3">
      <h4 class="text-white fs12 mx-3">
        Lihat info terkait dinas pendidikan dan kebudayaan kabupaten batang
        di :
        <span><a href="https://disdikbud.batangkab.go.id/index.html" target="blank" class="text-white text-decoration-none fw-bold">www.disdikbud.batangkab.go.id</a></span>
      </h4>
    </div>
    <!-- End info penting -->

    <!-- Data SD -->
    <div class="data__sekolah__section mt20">
      <div class="header">
        <h2 class="darkblue fw-bold">Data Sekolah Dasar</h2>
      </div>
      <div class="content mt20 bgblue p-3 p-sm-5">
        <div class="row">
          <div class="col-4 text-center">
            <h1 class="text-white fw-bold fs24"><?= $jumlahSd['totalSd']; ?></h1>
            <h2 class="text-white fs16">Jumlah Sekolah</h2>
          </div>
          <div class="col-4 text-center bdx">
            <h1 class="text-white fw-bold fs24"><?= $jumlahSd['negeri']; ?></h1>
            <h2 class="text-white fs16">Negeri</h2>
          </div>
          <div class="col-4 text-center">
            <h1 class="text-white fw-bold fs24"><?= $jumlahSd['swasta']; ?></h1>
            <h2 class="text-white fs16">Swasta</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- End data -->

    <!-- Data SMP -->
    <div class="data__sekolah__section mt20">
      <div class="header">
        <h2 class="darkblue fw-bold">Data Sekolah Menengah Pertama</h2>
      </div>
      <div class="content mt20 bgblue p-3 p-sm-5">
        <div class="row">
          <div class="col-4 text-center">
            <h1 class="text-white fw-bold fs24"><?= $jumlahSmp['totalSmp']; ?></h1>
            <h2 class="text-white fs16">Jumlah Sekolah</h2>
          </div>
          <div class="col-4 text-center bdx">
            <h1 class="text-white fw-bold fs24"><?= $jumlahSmp['negeri']; ?></h1>
            <h2 class="text-white fs16">Negeri</h2>
          </div>
          <div class="col-4 text-center">
            <h1 class="text-white fw-bold fs24"><?= $jumlahSmp['swasta']; ?></h1>
            <h2 class="text-white fs16">Swasta</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- End data -->
  </div>
</div>
<!-- End main page -->
<?= $this->endSection(); ?>