<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>
<div class="main__content px-4 pt40">
    <div class="d-flex align-items-baseline mb10">
        <a href="<?= base_url('admin/dataSd'); ?>" class="text-decoration-none blue">Data Sekolah Dasar</a>
        <h4 class="mx-2">/</h4>
        <a href="<?= base_url('admin/detailSd/' . $npsn); ?>" class="text-decoration-none blue">Detail Sekolah</a>
        <h4 class="mx-2">/</h4>
        <a href="" class="text-decoration-none grey">Tambah Data Tenaga Pendidik</a>
    </div>
    <div class="detail__header d-flex justify-content-between align-items-center">
        <h2 class="fw-bold darkblue">Form Tambah Tenaga Pendidik</h2>
        <a href="<?= base_url('admin/detailSd/' . $npsn); ?>">
            <i class="fa-solid fa-arrow-left-long fs20"></i>
        </a>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt20 bd__radius__none" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="mt20">
        <form action="/admin/simpanTenagaPendidikSd" method="POST" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIK</label>
                        <input required type="number" class="form-control" name="nik" id="npsn" aria-describedby="emailHelp" placeholder="Masukkkan NIK" />
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NUPTK</label>
                        <input type="number" class="form-control" name="nuptk" id="nuptk" aria-describedby="emailHelp" placeholder="Masukkkan NUPTK" />
                    </div>
                    <div class="mb-3">
                        <label for="namalengkapsd" class="form-label">Nama Lengkap</label>
                        <input required type="text" class="form-control" name="namaTenagaPendidik" id="nama_tenaga_pendidik" aria-describedby="emailHelp" placeholder="Masukkkan nama tenaga pendidik" />
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="kelamin" class="form-label">Jenis Kelamin</label>
                        <select required class="form-select lightlattegray bd__radius__none" name="jenisKelamin" aria-label="Default select example">
                            <option hidden>...</option>
                            <option value="Laki - laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="npsn" class="form-label">Jabatan</label>
                        <select required class="form-select lightlattegray bd__radius__none" name="jabatan" aria-label="Default select example">
                            <option hidden>...</option>
                            <?php foreach ($jabatan as $jabatan) : ?>
                                <option value="<?= $jabatan['id_jabatan']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="npsn" class="form-label">Satuan Pendidikan</label>
                        <select required class="form-select lightlattegray bd__radius__none" name="npsn" aria-label="Default select example">
                            <option hidden>...</option>
                            <?php foreach ($satuanPendidikan as $satuanPendidikan) : ?>
                                <option <?= ($satuanPendidikan['npsn'] == $npsn) ? 'selected' : ''; ?> value="<?= $satuanPendidikan['npsn']; ?>"><?= $satuanPendidikan['nama_sekolah']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt40">
                <a href="<?= base_url('admin/detailSd/' . $npsn);  ?>">
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