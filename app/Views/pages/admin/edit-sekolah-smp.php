<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>
<!-- Content -->
<div class="main__content px-4 pt40 edit__sekolah__section">
  <div class="d-flex align-items-baseline mb10">
    <a href="<?= base_url('admin/dataSmp'); ?>" class="text-decoration-none blue">Data Sekolah Menengah Pertama</a>
    <h4 class="mx-2">/</h4>
    <a href="<?= base_url('admin/detailSmp/' . $dataSekolah['npsn']); ?>" class="text-decoration-none blue">Detail Sekolah</a>
    <h4 class="mx-2">/</h4>
    <a href="" class="text-decoration-none grey">Ubah Data Sekolah</a>
  </div>
  <div class="detail__header d-flex justify-content-between align-items-center">
    <h2 class="fw-bold darkblue">Form Ubah Data Sekolah</h2>
    <a href="<?= base_url('admin/detailSmp/' . $dataSekolah['npsn']); ?>">
      <i class="fa-solid fa-arrow-left-long fs20"></i>
    </a>
  </div>
  <?php if (session()->getFlashdata('pesanSimpanEditSekolah')) : ?>
    <div class="alert alert-success mt20 bd__radius__none" role="alert">
      <?= session()->getFlashdata('pesanSimpanEditSekolah'); ?>
    </div>
  <?php endif; ?>
  <div class="edit__sekolah__section mt20">
    <form action="/admin/simpanEditSekolah/<?= $dataSekolah['npsn']; ?>" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
      <input type="text" name="fotoLama" hidden value="<?= $dataSekolah['foto_depan_sekolah']; ?>">
      <input type="text" name="tingkatSekolah" hidden value="<?= $dataSekolah['tingkat_sekolah']; ?>">
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="mb-3">
            <label for="npsn" class="form-label">NPSN</label>
            <input type="number" name="npsn" class="form-control" id="npsn" required aria-describedby="emailHelp" value="<?= $dataSekolah['npsn']; ?>" />
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="mb-3">
            <label for="npsn" class="form-label">Nama Sekolah</label>
            <input type="text" name="namaSekolah" class="form-control" id="namasekolah" required aria-describedby="emailHelp" value="<?= $dataSekolah['nama_sekolah']; ?>" />
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="mb-3">
            <label for="npsn" class="form-label">Akreditasi</label>
            <select class="form-select bd__radius__none" name="akreditasi" aria-label="Default select example">
              <option hidden>-- Pilih Akreditasi --</option>
              <option <?= ($dataSekolah['akreditasi'] == 'A') ? 'selected' : ''; ?> value="A">A</option>
              <option <?= ($dataSekolah['akreditasi'] == 'B') ? 'selected' : ''; ?> value="B">B</option>
              <option <?= ($dataSekolah['akreditasi'] == 'C') ? 'selected' : ''; ?> value="C">C</option>
              <option <?= ($dataSekolah['akreditasi'] == '') ? 'selected' : ''; ?> value="">Belum terakreditasi</option>
            </select>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="mb-3">
            <label for="npsn" class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control" id="kontak" required aria-describedby="emailHelp" value="<?= $dataSekolah['kontak']; ?>" />
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="mb-3">
            <label for="statusSekolah" class="form-label">Status Sekolah</label>
            <select class="form-select bd__radius__none" name="statusSekolah" aria-label="Default select example">
              <option hidden>-- Pilih Status Sekolah --</option>
              <option <?= ($dataSekolah['status_sekolah'] == 'negeri') ? 'selected' : ''; ?> value="negeri">Negeri</option>
              <option <?= ($dataSekolah['status_sekolah'] == 'swasta') ? 'selected' : ''; ?> value="swasta">Swasta</option>
            </select>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="mb-3">
            <label for="website" class="form-label">Website Sekolah</label>
            <input type="text" name="website" class="form-control" id="kontak" required aria-describedby="emailHelp" value="<?= $dataSekolah['kontak']; ?>" />
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="mb-3">
            <label for="alamat" class="form-label grey">Alamat</label>
            <div class="form-floating">
              <textarea class="form-control p-2 grey" name="alamat" required id="alamat"><?= $dataSekolah['alamat']; ?></textarea>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="lintang" class="form-label">Titik Koordinat (Lintang)</label>
            <input type="text" class="form-control" name="lintang" id="lintang" required aria-describedby="emailHelp" value="<?= $dataSekolah['lintang']; ?>" />
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="mb-3">
            <label for="bujur" class="form-label">Titik Koordinat (Bujur)</label>
            <input type="text" class="form-control" name="bujur" id="bujur" required aria-describedby="emailHelp" value="<?= $dataSekolah['bujur']; ?>" />
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="mb-3">
            <label for="npsn" class="form-label">Foto Depan Sekolah <span class="grey">(Ukuran optimal foto 1280x720 dengan format .png)</span></label>
            <input type="file" class="form-control" name="foto" id="foto" aria-describedby="emailHelp" value="<?= $dataSekolah['foto_depan_sekolah']; ?>" />
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-end mt40">
        <a href="<?= base_url('admin/detailSd/' . $dataSekolah['npsn']); ?>">
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
<?= $this->endSection(); ?>