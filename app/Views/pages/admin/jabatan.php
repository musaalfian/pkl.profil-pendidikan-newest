<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="main__content px-4 pt40">
  <h2 class="fw-bold darkblue">Daftar Jabatan</h2>
  <!-- Alert penambahan jabatan berhasil -->
  <?php if (session()->getFlashdata('pesanJabatan')) : ?>
    <div class="alert alert-success mt20 bd__radius__none" role="alert">
      <?= session()->getFlashdata('pesanJabatan'); ?>
    </div>
  <?php endif; ?>
  <!-- End Alert penambahan jabatan berhasil -->

  <!-- Alert hapus jabatan berhasil -->
  <?php if (session()->getFlashdata('pesanHapusJabatan')) : ?>
    <div class="alert alert-success mt20 bd__radius__none" role="alert">
      <?= session()->getFlashdata('pesanHapusJabatan'); ?>
    </div>
  <?php endif; ?>
  <!-- End Alert hapus jabatan berhasil -->

  <div class="mt20">
    <!-- Tabel -->
    <div class="tabel__section struktur__organisasi__section px-3 table-responsive pt20 pb20 bgwhite">
      <table class="table table-responsive table-hover border-bottom-0 mb20i" id="jabatan">
        <div class="d-flex justify-content-between align-items-center mb20">
          <h4 class="darkblue fw-bold">Daftar Jabatan Terbaru</h3>
            <div class="tambah__jabatan">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary bgblue bd__radius__none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Jabatan <i class="bi bi-plus text-white"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <form action="/admin/simpanJabatan" method="POST">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title fw-bold" id="exampleModalLabel">Tambah Jabatan</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h4 style="text-align: left">
                          <div class="mb-3">
                            <label for="namaJabatan" class="form-label">Masukkan nama jabatan</label>
                            <div class="alert alert-danger bd__radius__none" id="namaJabatanAlert">
                              Tidak dapat menambahkan jabatan karena jabatan sudah tersedia.
                            </div>
                            <input required type="text" class="form-control" name="namaJabatan" id="namaJabatan" aria-describedby="emailHelp" />
                          </div>
                          <div class="mb-3 indikator__kerja">
                            <label for="indikatorKerja" class="form-label">Indikator Kerja</label>
                            <div class="alert alert-primary bd__radius__none">
                              Catatan : <br>
                              1. Untuk menambahkan indikator kerja berikutnya, gunakan semi colon (;) di akhir kalimat. <br>
                              2. Tidak perlu menuliskan penomoran.
                            </div>
                            <div class="form-floating">
                              <textarea required class="form-control p-2 grey bd__radius__none" name="indikatorKerja" required placeholder="Masukkan saran dan pesan" id="pesan"></textarea>
                              <div class="valid-feedback">
                              </div>
                            </div>
                          </div>
                        </h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary bd__radius__none" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary bgblue bd__radius__none">Tambah</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <thead>
          <tr>
            <th scope="col" class="text-center nomor">No</th>
            <th scope="col" style="" class="nama__jabatan">Nama Jabatan</th>
            <th scope="col" style="">Indikator Kerja</th>
            <th scope="col" class="text-center aksi">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Data -->
          <?php $i = 1; ?>
          <?php foreach ($jabatan as $jbt) : ?>
            <tr>
              <td scope="row" class="text-center"><?= $i++; ?></td>
              <td><?= $jbt['nama_jabatan']; ?> </td>
              <td class="">
                <?php $j = 1; ?>
                <?php foreach ($jbt['indikator_kerja'] as $indikatorKerja) : ?>
                  <?= $j++; ?>. <?= $indikatorKerja['deskripsi_indikator']; ?> <br>
                <?php endforeach; ?>
              </td>
              <td class="text-center">
                <div class="d-flex justify-content-center">
                  <div class="btn__edit">
                    <a href="<?= base_url() ?>/admin/editJabatan/<?= $jbt['id_jabatan']; ?>" class="me-2">
                      <button type="button" class="button button__transparan" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil-square blue"></i></button></a>
                  </div>
                  <div class="btn__hapus">
                    <!-- Button trigger modal -->
                    <button type="button" class="button button__transparan" data-bs-toggle="modal" data-bs-target="#modal_<?= $jbt['id_jabatan']; ?>">
                      <i class="bi bi-trash3-fill red"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal_<?= $jbt['id_jabatan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a href="<?= base_url() ?>/admin/hapusJabatan/<?= $jbt['id_jabatan']; ?>">
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

<!-- Alert penambahan jabatan -->
<script>
  $(document).ready(function() {
    $('#namaJabatanAlert').hide();
  });
  $('form').on('submit', function(e) {
    e.preventDefault();
    console.log($('#namaJabatan').val());
    let vari = true;
    let namaJabatan = $('#namaJabatan').val();
    <?php foreach ($jabatan as $jabatan) : ?>
      if (namaJabatan.toLowerCase() == '<?= strtolower($jabatan['nama_jabatan']) ?>') {
        $('#namaJabatanAlert').show();
        vari = false;
      }
    <?php endforeach; ?>
    if (vari) {
      this.submit();
    }
  });
</script>
<!-- End alert penambahan jabatan -->

<?= $this->endSection(); ?>