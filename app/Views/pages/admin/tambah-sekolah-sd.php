<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>
<div class="main__content px-4 pt40">
    <div class="d-flex align-items-baseline mb10">
        <a href="<?= base_url('admin/dataSd'); ?>" class="text-decoration-none blue">Data Sekolah Dasar</a>
        <h4 class="mx-2">/</h4>
        <a href="" class="text-decoration-none grey">Tambah Data Sekolah</a>
    </div>
    <div class="detail__header d-flex justify-content-between align-items-center">
        <h2 class="fw-bold darkblue">Form Tambah Sekolah</h2>
        <a href="<?= base_url('admin/dataSd'); ?>">
            <i class="fa-solid fa-arrow-left-long fs20"></i>
        </a>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt20 bd__radius__none" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="edit__sekolah__section mt20">
        <form action="/admin/simpanSekolah/sd" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="npsn" class="form-label">NPSN</label>
                        <input type="number" name="npsn" class="form-control" id="npsn" required aria-describedby="emailHelp" placeholder="Masukkan NPSN" />
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namaSekolah" class="form-label">Nama Sekolah</label>
                        <input type="text" name="namaSekolah" class="form-control" id="namaSekolah" required aria-describedby="emailHelp" placeholder="Masukkan nama sekolah" />
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="akreditasi" class="form-label">Akreditasi</label>
                        <select class="form-select bd__radius__none" name="akreditasi" aria-label="Default select example">
                            <option selected hidden>-- Pilih Akreditasi --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="">Belum terakreditasi</option>
                        </select>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input type="text" name="kontak" class="form-control" id="kontak" aria-describedby="emailHelp" placeholder="Masukkan kontak" />
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="statusSekolah" class="form-label">Status Sekolah</label>
                        <select class="form-select bd__radius__none" name="statusSekolah" aria-label="Default select example">
                            <option selected value="" hidden>-- Pilih Status Sekolah --</option>
                            <option value="negeri">Negeri</option>
                            <option value="swasta">Swasta</option>
                        </select>
                        <div class="valid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website Sekolah</label>
                        <input type="text" name="website" class="form-control" id="website" aria-describedby="emailHelp" placeholder="Masukkan website sekolah" />
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="alamat" class="form-label grey">Alamat</label>
                        <div class="form-floating">
                            <textarea class="form-control p-2 grey" name="alamat" required placeholder="Masukkan saran dan pesan" id="pesan"></textarea>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="lintang" class="form-label">Titik Koordinat (Lintang)</label>
                        <input type="text" class="form-control" name="lintang" id="lintang" required aria-describedby="emailHelp" placeholder="Masukkan lintang koordinat" />
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bujur" class="form-label">Titik Koordinat (Bujur)</label>
                        <input type="text" class="form-control" name="bujur" id="bujur" required aria-describedby="emailHelp" placeholder="Masukkan bujur koordinat" />
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Depan Sekolah <span class="darkblue">(Ukuran foto 1920x1080 dengan format .png)</span></label>
                        <input type="file" class="form-control" name="foto" id="foto" aria-describedby="emailHelp" placeholder="Masukkan titik koordinat" />
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt40">
                <a href="<?= base_url('admin/dataSd'); ?>">
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