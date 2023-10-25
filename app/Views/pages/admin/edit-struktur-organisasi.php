<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>
<div class="main__content px-4 pt40">
  <div class="d-flex align-items-baseline mb10">
    <a href="<?= base_url('admin/strukturOrganisasi'); ?>" class="text-decoration-none blue">Struktur Organisasi</a>
    <h4 class="mx-2">/</h4>
    <a href="" class="text-decoration-none grey">Ubah Data Stuktur Organisasi</a>
  </div>
  <div class="detail__header d-flex justify-content-between align-items-center">
    <h2 class="fw-bold darkblue">Form Ubah Struktur Organisasi</h2>
    <a href="<?= base_url('admin/strukturOrganisasi'); ?>">
      <i class="fa-solid fa-arrow-left-long fs20"></i>
    </a>
  </div>
  <div class="mt20">
    <!-- Alert update karyawan berhasil -->
    <?php if (session()->getFlashdata('pesanSimpanEditStrukturOrganisasi')) : ?>
      <div class="alert alert-success mt20 bd__radius__none" role="alert">
        <?= session()->getFlashdata('pesanSimpanEditStrukturOrganisasi'); ?>
      </div>
    <?php endif; ?>
    <!-- End Alert update karyawan berhasil -->

    <div class="struktur__organisasi__section mt20">
      <form action="/admin/simpanEditStrukturOrganisasi/<?= $karyawan['nip']; ?>" method="post" class="needs-validation" novalidate>
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="mb-3">
              <label for="nip" class="form-label">NIP</label>
              <input value="<?= $karyawan['nip']; ?>" required type="number" name="nip" class="form-control" id="nip" aria-describedby="emailHelp" placeholder="Masukkkan NIP" />
            </div>
            <div class="mb-3">
              <label for="namaKaryawan" class="form-label">Nama Lengkap</label>
              <input value="<?= $karyawan['nama_karyawan']; ?>" required type="text" name="namaKaryawan" class="form-control" id="namaKaryawan" aria-describedby="emailHelp" placeholder="Masukkkan nama lengkap" />
            </div>
            <div class="mb-3">
              <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
              <input value="<?= $karyawan['tanggal_lahir']; ?>" required type="date" name="tanggalLahir" class="form-control" id="tanggalLahir" aria-describedby="emailHelp" placeholder="Masukkkan nama sekolah" />
            </div>
            <div class="mb-3">
              <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
              <select required name="jenisKelamin" class="form-select lightlattegray bd__radius__none" id="jenisKelamin">
                <option disabled selected value="">...</option>
                <option <?= ($karyawan['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?> value="Laki-laki">Laki-laki</option>
                <option <?= ($karyawan['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input value="<?= $karyawan['email']; ?>" type="email" name="email" class="form-control" id="namaLengkap" aria-describedby="emailHelp" placeholder="Masukkkan email" />
            </div>
            <div class="mb-3">
              <label for="telepon" class="form-label">Nomor Telepon</label>
              <input value="<?= $karyawan['telepon']; ?>" required type="text" name="telepon" class="form-control" id="namaLengkap" aria-describedby="emailHelp" placeholder="Masukkkan nomor telepon" />
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <div class="form-floating">
                <textarea class="form-control p-2 grey bd__radius__none" name="alamat" required placeholder="Masukkan saran dan pesan" id="pesan"><?= $karyawan['alamat']; ?></textarea>
                <div class="valid-feedback">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <select required name="jabatan" class="form-select lightlattegray bd__radius__none" aria-label="Default select example">
                <option disabled selected value>...</option>
                <?php foreach ($jabatan as $jabatan) : ?>
                  <option <?= ($karyawan['id_jabatan'] == $jabatan['id_jabatan']) ? 'selected' : ''; ?> value="<?= $jabatan['id_jabatan']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="pangkat" class="form-label">Pangkat</label>
              <select required name="pangkat" class="form-select lightlattegray bd__radius__none" aria-label="Default select example">
                <option disabled selected value>...</option>
                <?php foreach ($pangkat as $pangkat) : ?>
                  <option <?= ($karyawan['pangkat'] == $pangkat) ? 'selected' : ''; ?> value="<?= $pangkat; ?>"><?= $pangkat; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="golongan" class="form-label">Golongan</label>
              <select required name="golongan" class="form-select lightlattegray bd__radius__none" aria-label="Default select example">
                <option disabled selected value>...</option>
                <?php foreach ($golongan as $gol) : ?>
                  <?php foreach ($gol as $g) : ?>
                    <option <?= ($karyawan['golongan'] == $g) ? 'selected' : ''; ?> value="<?= $g; ?>"><?= $g; ?></option>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end mt40">
          <a href="<?= base_url('admin/strukturOrganisasi'); ?>">
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