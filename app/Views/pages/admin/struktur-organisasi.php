<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="main__content px-4 pt40">
  <h2 class="fw-bold darkblue">Struktur Organisasi</h2>

  <!-- Alert penambahan jabatan berhasil -->
  <?php if (session()->getFlashdata('pesanJabatan')) : ?>
    <div class="alert alert-success mt20 bd__radius__none" role="alert">
      <?= session()->getFlashdata('pesanJabatan'); ?>
    </div>
  <?php endif; ?>
  <!-- End Alert penambahan jabatan berhasil -->

  <div class="mt20">
    <!-- Tabel -->
    <div class="tabel__section struktur__organisasi__section px-3 table-responsive pt20 pb20 bgwhite">
      <table class="table table-responsive table-hover border-bottom-0 mb20i" id="strukturOrganisasi">
        <div class="d-flex justify-content-between align-items-center mb20">
          <h4 class="darkblue fw-bold">Data Struktur Organisasi Terbaru</h3>
            <a href="<?= base_url('admin/tambahStrukturOrganisasi'); ?>">
              <div class="btn btn-primary bd__radius__none bgblue">Tambah Struktur Organisasi <i class="bi bi-plus text-white"></i></div>
            </a>
        </div>
        <thead>
          <tr>
            <th scope="col" class="text-center nomor">No</th>
            <th scope="col" style="">Nama Lengkap</th>
            <th scope="col" style="">NIP</th>
            <th scope="col" class="" style="">Jenis Kelamin</th>
            <th scope="col" class="" style="">Jabatan</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Data -->
          <?php $i = 1; ?>
          <?php foreach ($strukturOrganisasi as $strukturOrganisasi) : ?>
            <tr>
              <td scope="row" class="text-center"><?= $i++; ?></td>
              <td><?= $strukturOrganisasi['nama_karyawan']; ?></td>
              <td class=""><?= $strukturOrganisasi['nip']; ?></td>
              <td class=""><?= $strukturOrganisasi['jenis_kelamin']; ?></td>
              <td class=""><?= $strukturOrganisasi['nama_jabatan']; ?></td>
              <td class="text-center">
                <div class="d-flex justify-content-center">
                  <div class="btn__edit">
                    <a href="<?= base_url('admin/editStrukturOrganisasi/' . $strukturOrganisasi['nip']); ?>" class="me-2">
                      <button type="button" class="button button__transparan" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil-square blue"></i></button></a>
                  </div>
                  <div class="btn__hapus">
                    <!-- Button trigger modal -->
                    <button type="button" class="button button__transparan" data-bs-toggle="modal" data-bs-target="#modal_<?= $strukturOrganisasi['nip']; ?>">
                      <i class="bi bi-trash3-fill red"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal_<?= $strukturOrganisasi['nip']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title fw-bold" id="exampleModalLabel">
                              Konfirmasi
                            </h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h4 style="text-align: left">
                              Yakin ingin menghapus data?
                            </h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                              Batal
                            </button>
                            <a href="<?= base_url() ?>/admin/hapusStrukturOrganisasi/<?= $strukturOrganisasi['nip']; ?>">
                              <button type="button" class="btn btn-danger">
                                Hapus
                              </button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- End tabel -->
  </div>
</div>
<!-- End main content -->
<?= $this->endSection(); ?>