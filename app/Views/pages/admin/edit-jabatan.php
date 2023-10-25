<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>
<div class="main__content px-4 pt40">
  <div class="d-flex align-items-baseline mb10">
    <a href="<?= base_url('admin/jabatan'); ?>" class="text-decoration-none blue">Daftar Jabatan</a>
    <h4 class="mx-2">/</h4>
    <a href="" class="text-decoration-none grey">Ubah Jabatan</a>
  </div>
  <div class="detail__header d-flex justify-content-between align-items-center">
    <h2 class="fw-bold darkblue">Form Ubah Jabatan</h2>
    <a href="<?= base_url('admin/jabatan'); ?>">
      <i class="fa-solid fa-arrow-left-long fs20"></i>
    </a>
  </div>
  <div class="mt20">
    <!-- Alert update jabatan berhasil -->
    <?php if (session()->getFlashdata('pesanSimpanEditJabatan')) : ?>
      <div class="alert alert-success mt20 bd__radius__none" role="alert">
        <?= session()->getFlashdata('pesanSimpanEditJabatan'); ?>
      </div>
    <?php endif; ?>
    <!-- End Alert update jabatan berhasil -->

    <div class="struktur__organisasi__section mt20">
      <form action="/admin/simpanEditJabatan/<?= $jabatan['id_jabatan']; ?>" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
          <label for="namaJabatan" class="form-label">Nama Jabatan</label>
          <input value="<?= $jabatan['nama_jabatan']; ?>" required type="text" name="namaJabatan" class="form-control" id="nip" aria-describedby="emailHelp" placeholder="Masukkkan nama jabatan" />
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label grey">Indikator Kerja</label>
          <div class="form-floating">
            <textarea class="form-control p-2 grey bd__radius__none" name="indikatorKerja" required id="indikatorKerja"><?php foreach ($indikator as $indikator) : ?><?= $indikator; ?><?php endforeach; ?></textarea>
            <div class="valid-feedback">
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end mt40">
          <a href="<?= base_url('admin/jabatan'); ?>">
            <button type="button" class="btn btn-secondary bd__radius__none me-3">
              Batal
            </button>
          </a>
          <button type="submit" class="btn btn-primary bd__radius__none bgblue">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>