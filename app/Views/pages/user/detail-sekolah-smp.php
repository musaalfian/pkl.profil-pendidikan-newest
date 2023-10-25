<?= $this->extend('layout/template-user'); ?>

<?= $this->section('content'); ?>
<!-- Main -->

<div class="px">
  <div class="container">
    <div class="d-flex align-items-baseline">
      <a href="<?= base_url('/user/dataSekolahMenengahPertama'); ?>" class="text-decoration-none">Data Sekolah Menengah Pertama</a>
      <h4 class="grey mx-2">/</h4>
      <a href="" class="grey text-decoration-none">Detail Sekolah</a>
    </div>
    <div class="detail__header d-flex justify-content-between align-items-center">
      <h2 class="fw-bold darkblue mt10">Detail Sekolah</h2>
      <a href="<?= base_url('/user/dataSekolahDasar'); ?>">
        <i class="fa-solid fa-arrow-left-long fs20"></i>
      </a>
    </div>
    <div class="detail__section mt10">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="gambar">
            <img src="/assets/img/admin/<?= $dataSekolah['foto_depan_sekolah']; ?>" alt="Foto depan sekolah" />
          </div>
        </div>
        <div class="col-lg-8 col-12 mt10 mt-lg-0">
          <div class="detail__content pb-2">
            <div class="row">
              <div class="col-4">
                <h3>Nama</h3>
              </div>
              <div class="col-1">
                <h3>:</h3>
              </div>
              <div class="col-7">
                <h3><?= $dataSekolah['nama_sekolah']; ?></h3>
              </div>
            </div>
          </div>
          <div class="detail__content pb-2 mt-3">
            <div class="row">
              <div class="col-4">
                <h3>NPSN</h3>
              </div>
              <div class="col-1">
                <h3>:</h3>
              </div>
              <div class="col-7">
                <h3><?= $dataSekolah['npsn']; ?></h3>
              </div>
            </div>
          </div>
          <div class="detail__content pb-2 mt-3">
            <div class="row">
              <div class="col-4">
                <h3>Akreditasi</h3>
              </div>
              <div class="col-1">
                <h3>:</h3>
              </div>
              <div class="col-7">
                <h3><?= $dataSekolah['akreditasi']; ?></h3>
              </div>
            </div>
          </div>
          <div class="detail__content pb-2 mt-3">
            <div class="row">
              <div class="col-4">
                <h3>Kontak</h3>
              </div>
              <div class="col-1">
                <h3>:</h3>
              </div>
              <div class="col-7">
                <h3><?= $dataSekolah['kontak']; ?></h3>
              </div>
            </div>
          </div>
          <div class="detail__content pb-2 mt-3">
            <div class="row">
              <div class="col-4">
                <h3>Website Sekolah</h3>
              </div>
              <div class="col-1">
                <h3>:</h3>
              </div>
              <div class="col-7">
                <h3><?= $dataSekolah['website']; ?> </h3>
              </div>
            </div>
          </div>
          <div class="detail__content pb-2 mt-3">
            <div class="row">
              <div class="col-4">
                <h3>Alamat</h3>
              </div>
              <div class="col-1">
                <h3>:</h3>
              </div>
              <div class="col-7">
                <h3>
                  <?= $dataSekolah['alamat']; ?>
                </h3>
              </div>
            </div>
          </div>
          <div class="detail__content pb-2 mt-3">
            <div class="row">
              <div class="col-4">
                <h3>Titik Koordinat</h3>
              </div>
              <div class="col-1">
                <h3>:</h3>
              </div>
              <div class="col-7">
                <h3>Lintang : <?= $dataSekolah['lintang']; ?>, Bujur : <?= $dataSekolah['bujur']; ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h2 class="fw-bold darkblue mt40 mb10">Lokasi Sekolah</h2>
    <div class="lokasi">
      <!--The div element for the map -->
      <div id="map"></div>
    </div>

    <h2 class="fw-bold darkblue mt40">Info Terkait Lainnya</h2>
    <!-- Ajax tabs -->
    <ul class="ajax__section nav nav-tabs mt20" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#tenagaPendidik" type="button" role="tab" aria-controls="home" aria-selected="true">
          Data Tenaga Pendidik
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#sarpras" type="button" role="tab" aria-controls="profile" aria-selected="false">
          Data Sarpras
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#siswa" type="button" role="tab" aria-controls="profile" aria-selected="false">
          Data Siswa
        </button>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <!-- Data tenaga pendidik -->
      <div class="tab-pane fade show active" id="tenagaPendidik" role="tabpanel" aria-labelledby="profile-tab">
        <div class="tabel__section border-top-0 px-3 table-responsive pt20 pb20">
          <table class="table table-responsive table-hover mb-3 border-bottom-0" id="userDataTenagaPendidikSd">
            <thead>
              <tr>
                <th scope="col" class="text-center nomor">No</th>
                <th scope="col">NUPTK</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Satuan Pendidikan</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data -->
              <?php $i = 1; ?>
              <?php foreach ($dataTenagaPendidik as $dataTenagaPendidik) : ?>
                <tr>
                  <td scope="row" class="text-center"><?= $i++; ?></td>
                  <td><?= $dataTenagaPendidik['nuptk']; ?></td>
                  <td><?= $dataTenagaPendidik['nama_tenaga_pendidik']; ?></td>
                  <td><?= $dataTenagaPendidik['jenis_kelamin']; ?></td>
                  <td><?= $dataTenagaPendidik['nama_jabatan']; ?></td>
                  <td><?= $dataTenagaPendidik['nama_sekolah']; ?></td>
                </tr>
              <?php endforeach; ?>
              <!-- End data -->
            </tbody>
          </table>
        </div>
      </div>
      <!-- End data tenaga pendidik -->

      <!-- Data sarpras -->
      <div class="tab-pane fade" id="sarpras" role="tabpanel" aria-labelledby="profile-tab">
        <div class="tabel__section bgwhite d-flex justify-content-center align-items-center sarpras__section border-top-0 px-3 table-responsive pt20 pb20">
          <div class="maintenance__content text-center">
            <img src="<?= base_url('/assets/img/maintenance-icon.png'); ?>" alt="">
            <h4 class="mt10">Sedang dalam pengembangan</h4>
          </div>
        </div>
      </div>
      <!-- End data sarpras -->

      <!-- Data siswa -->
      <div class="tab-pane fade" id="siswa" role="tabpanel" aria-labelledby="profile-tab">
        <div class="tabel__section bgwhite d-flex justify-content-center align-items-center siswa__section border-top-0 px-3 table-responsive pt20 pb20">
          <div class="maintenance__content text-center">
            <img src="<?= base_url('/assets/img/maintenance-icon.png'); ?>" alt="">
            <h4 class="mt10">Sedang dalam pengembangan</h4>
          </div>
        </div>
      </div>
      <!-- End data siswa -->
    </div>
  </div>
</div>
<!-- End main -->

<!-- Google Map -->
<script>
  // Initialize and add the map
  function initMap() {
    // The location of Uluru
    const uluru = {
      lat: <?= $dataSekolah['lintang']; ?>,
      lng: <?= $dataSekolah['bujur']; ?>
    };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }

  window.initMap = initMap;
</script>

<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq8eZFMZBCjWamg8vzRjIYjY2kNh8vOak&callback=initMap">
</script>
<!-- End google map -->
<?= $this->endSection(); ?>