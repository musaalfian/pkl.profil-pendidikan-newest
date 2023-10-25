<?= $this->extend('layout/template-user'); ?>

<?= $this->section('content'); ?>
<!-- Main page -->
<div class="px data__sekolah__dasar">
  <div class="container">
    <h2 class="fw-bold darkblue">Data Sekolah Menengah Pertama</h2>
    <div class="mt20">
      <!-- Data sekolah -->
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="tabel__section px-3 table-responsive pt20 pb20">
          <table class="table table-responsive table-hover mb-3 border-bottom-0" id="userDataSekolahSd">
            <thead>
              <tr>
                <th scope="col" class="text-center nomor">No</th>
                <th scope="col">Nama Sekolah</th>
                <th scope="col">Status Sekolah</th>
                <th scope="col" class="akreditasi">Akreditasi</th>
                <th scope="col">Kontak</th>
                <th scope="col">Alamat</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data -->
              <?php $i = 1; ?>
              <?php foreach ($dataSekolah as $dataSekolah) : ?>
                <tr>
                  <td scope="row" class="text-center"><?= $i++; ?></td>
                  <td><?= $dataSekolah['nama_sekolah']; ?></td>
                  <td><?= ucfirst($dataSekolah['status_sekolah']); ?></td>
                  <td class="text-center"><?= $dataSekolah['akreditasi']; ?></td>
                  <td><?= $dataSekolah['kontak']; ?></td>
                  <td><?= $dataSekolah['alamat']; ?></td>
                  <td class="text-center">
                    <div class="btn__aksi">
                      <a href="<?= base_url() ?>/user/detailSekolahMenengahPertama/<?= $dataSekolah['npsn'] ?> " data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat detail" class="bgblue text-white text-decoration-none px-3 py-1">
                        Detail
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
              <!-- End data -->
            </tbody>
          </table>
        </div>
      </div>
      <!-- End data sekolah -->
    </div>
  </div>
</div>
<!-- End main page -->
<?= $this->endSection(); ?>