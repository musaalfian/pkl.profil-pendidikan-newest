<?= $this->extend('layout/template-user'); ?>

<?= $this->section('content'); ?>
<!-- Main page -->
<div class="px">
  <div class="container tentang__section">
    <div class="visi__section">
      <h2 class="fw-bold darkblue">Visi & Misi</h2>
      <h3 class="darkblue mt10">
        Terselenggaranya Layanan Prima Pendidikan yang Berkualitas untuk Mewujudkan Masyarakat Batang yang Cerdas Komprehensif dan Berdaya Saing
      </h3>
      <div class="content mt20">
        <div class="d-flex align-items-baseline">
          <div class="nomor bggrey d-flex justify-content-center align-items-center me-2">
            <h5 class="text-white">1</h5>
          </div>
          <div class="deskripsi">
            <h4 class="grey">
              Meningkatkan ketersediaan pendidikan dan perluasan akses pendidikan yang merata, terjangkau, setara, berkelanjutan serta berkeadilan bagi seluruh lapisan masyarakat;
            </h4>
          </div>
        </div>
        <div class="d-flex align-items-baseline mt10">
          <div class="nomor bggrey d-flex justify-content-center align-items-center me-2">
            <h5 class="text-white">2</h5>
          </div>
          <div class="deskripsi">
            <h4 class="grey">
              Mewujudkan kualitas/mutu dan relevansi pendidikan yang memiliki keunggulan serta memberdayakan lembaga pendidikan formal dan non formal;
            </h4>
          </div>
        </div>
        <div class="d-flex align-items-baseline mt10">
          <div class="nomor bggrey d-flex justify-content-center align-items-center me-2">
            <h5 class="text-white">3</h5>
          </div>
          <div class="deskripsi">
            <h4 class="grey">
              Mewujudkan dukungan sustainabilitas (keberlanjutan) lulusan anak didik sekolah menengah pertama ke sekolah menengah atas dengan mengembangkan dukungan nyata pembangunan fasilitas pendidikan baru yang variatif dan kreatif;
            </h4>
          </div>
        </div>
        <div class="d-flex align-items-baseline mt10">
          <div class="nomor bggrey d-flex justify-content-center align-items-center me-2">
            <h5 class="text-white">4</h5>
          </div>
          <div class="deskripsi">
            <h4 class="grey">
              Mewujudkan pendidikan kecakapan hidup (life skill) yang mencakup kecakapan personal, sosial, akademik dan vocasional dalam meningkatkan sumber daya manusia yang cerdas, produktif, berkarakter dan berwawasan lingkungan serta memahami nilai-nilai luhur;
            </h4>
          </div>
        </div>
        <div class="d-flex align-items-baseline mt10">
          <div class="nomor bggrey d-flex justify-content-center align-items-center me-2">
            <h5 class="text-white">5</h5>
          </div>
          <div class="deskripsi">
            <h4 class="grey">
              Mewujudkan kreatifitas, daya saing dan prestasi kepemudaan dan keolahragaan;
            </h4>
          </div>
        </div>
        <div class="d-flex align-items-baseline mt10">
          <div class="nomor bggrey d-flex justify-content-center align-items-center me-2">
            <h5 class="text-white">6</h5>
          </div>
          <div class="deskripsi">
            <h4 class="grey">
              Mewujudkan tata kelola dan tata nilai penyelenggaraan layanan prima pendidikan.
            </h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Kondisi geografis -->
    <div class="line2 mt40"></div>
    <div class="geografis__section mt40">
      <h2 class="fw-bold darkblue">Kondisi Geografis Kabupaten Batang</h2>
      <div class="row mt20">
        <div class="col-xl-4 col-xxl-3 col-12">
          <img src="<?= base_url('/assets/img/peta-geografis-batang.jpg'); ?>" alt="" width="100%" height="300px" class="me-3" />
        </div>
        <div class="col-xl-8 col-xxl-9 mt-xl-0 mt-3 col-12">
          <div class="content">
            <h3 class="fw-bold darkblue">Letak Atronomis</h3>
            <h4 class="mt10 grey">
              Kabupaten Batang berada di Provinsi Jawa Tengah dan terletak
              diantara : 6° 51’ 46” dan 7° 11’ 47” Lintang Selatan dan antara 109° 40’ 19” dan 110° 03’ 06” Bujur Timur.
              <br />
              Luas wilayah: 78.864,16 Ha
            </h4>
            <div class="mt20">
              <h3 class="fw-bold darkblue">Batas Wilayah</h3>
              <h4 class="mt10 grey">
                Utara : Laut Jawa <br />
                Timur : Kabupaten Kendal <br />
                Barat : Kabupaten dan Kota Pekalongan <br />
                Selatan : Kabupaten Wonosobo dan Kabupaten Banjarnegara <br />
                Wilayah administratif terdiri dari : 15 Kecamatan.
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="line2 mt40"></div>
    <!-- End kondisi geografis -->

    <!-- Struktur organisasi -->
    <div class="organisasi__section mt40">
      <h2 class="fw-bold darkblue">Struktur Organisasi</h2>
      <?php $i = 1; ?>
      <?php foreach ($karyawanJabatan as $data) : ?>
        <a class="fs-3 text-decoration-none organisasi__content" data-bs-toggle="collapse" href="#extend_<?= $i; ?>" role="button" aria-expanded="false" aria-controls="collapseExample1">
          <div class="content mt20">
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="fw-bold darkblue">
                <span class="me-3 fw-bold darkblue"><?= $i; ?>.</span> <?= $data[0]; ?> :
                <?= $data[2]; ?>
              </h3>
              <i class="fa fa-plus"></i>
            </div>
            <?php $j = 1; ?>
            <div class="collapse" id="extend_<?= $i++; ?>">
              <div class="deskripsi mt10">
                <h4 class="grey">Indikator kerja :</h4>
                <?php foreach ($data[1] as $item) : ?>
                  <h4 class="mt10 grey">
                    <span class="me-3 grey"><?= $j++; ?>.</span><?= $item; ?>
                  </h4>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
    <!-- End struktur organisasi -->
  </div>
</div>
<!-- End main page -->

<?= $this->endSection(); ?>