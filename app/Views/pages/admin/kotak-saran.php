<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="main__content px-4 pt40">
  <h2 class="fw-bold darkblue">Kotak Saran</h2>
  <div class="mt20">
    <!-- Tabel -->
    <div class="tabel__section px-3 table-responsive pt20 pb20 bgwhite">
      <table class="table table-responsive table-hover border-bottom-0 mb20i" id="kotakSaran">
        <thead>
          <tr>
            <th scope="col" class="text-center nomor">No</th>
            <th scope="col" style="">Tanggal</th>
            <th scope="col" class="nama__pengirim">Nama Pengirim</th>
            <th scope="col" class="" style="">Email</th>
            <th scope="col">Pesan</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Data -->
          <?php $i = 1; ?>
          <?php foreach ($kotakSaran as $kotakSaran) : ?>
            <tr>
              <td scope="row" class="text-center"><?= $i++; ?></td>
              <td><?= $kotakSaran['tanggal_input']; ?></td>
              <td class=""><?= $kotakSaran['nama_pengirim']; ?></td>
              <td class=""><?= $kotakSaran['email']; ?></td>
              <td class="">
                <?= $kotakSaran['pesan']; ?>
              </td>
              <td class="text-center">
                <!-- Button trigger modal -->
                <button type="button" class="button button__transparan" data-bs-toggle="modal" data-bs-target="#modal_<?= $kotakSaran['id_kotak_saran']; ?>">
                  <i class="bi bi-trash3-fill red"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modal_<?= $kotakSaran['id_kotak_saran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="<?= base_url() ?>/admin/hapusKotakSaran/<?= $kotakSaran['id_kotak_saran']; ?>">
                          <button type="button" class="btn btn-danger">
                            Hapus
                          </button>
                        </a>
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