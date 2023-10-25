<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>

<!-- Content -->
<div class="main__content px-4 pt40">
  <div class="d-flex align-items-baseline mb10">
    <a href="<?= base_url('admin/dataSmp'); ?>" class="text-decoration-none blue">Data Sekolah Menengah Pertama</a>
    <h4 class="mx-2">/</h4>
    <a href="" class="text-decoration-none grey">Detail Sekolah</a>
  </div>
  <div class="detail__header d-flex justify-content-between align-items-center">
    <h2 class="fw-bold darkblue mt10">Detail Sekolah</h2>
    <a href="<?= base_url('admin/dataSmp'); ?>">
      <i class="fa-solid fa-arrow-left-long fs20"></i>
    </a>
  </div>
  <div class="detail__section mt20">
    <div class="row">
      <div class="col-xl-4 col-12">
        <div class="gambar">
          <img src="/assets/img/admin/<?= $dataSekolah['foto_depan_sekolah']; ?>" alt="Foto depan sekolah">
        </div>
      </div>
      <div class="col-xl-8 mt-xl-0 mt20 col-12">
        <div class="detail__content bdb pb-2">
          <div class="row">
            <div class="col-4">
              <h3>NPSN</h3>
            </div>
            <div class="col-1">
              <h3>:</h3>
            </div>
            <div class="col-7">
              <h3><?= $dataSekolah['npsn']; ?></h3>
            </div>
          </div>
        </div>
        <div class="detail__content bdb pb-2 mt-3">
          <div class="row">
            <div class="col-4">
              <h3 class="">Nama Sekolah</h3>
            </div>
            <div class="col-1">
              <h3>:</h3>
            </div>
            <div class="col-7">
              <h3><?= $dataSekolah['nama_sekolah']; ?></h3>
            </div>
          </div>
        </div>
        <div class="detail__content bdb pb-2 mt-3">
          <div class="row">
            <div class="col-4">
              <h3 class="">Status Sekolah</h3>
            </div>
            <div class="col-1">
              <h3>:</h3>
            </div>
            <div class="col-7">
              <h3><?= ucfirst($dataSekolah['status_sekolah']); ?></h3>
            </div>
          </div>
        </div>
        <div class="detail__content pb-2 bdb mt-3">
          <div class="row">
            <div class="col-4">
              <h3>Akreditasi</h3>
            </div>
            <div class="col-1">
              <h3>:</h3>
            </div>
            <div class="col-7">
              <h3><?= $dataSekolah['akreditasi']; ?></h3>
            </div>
          </div>
        </div>
        <div class="detail__content pb-2 bdb mt-3">
          <div class="row">
            <div class="col-4">
              <h3>Kontak</h3>
            </div>
            <div class="col-1">
              <h3>:</h3>
            </div>
            <div class="col-7">
              <h3><?= $dataSekolah['kontak']; ?></h3>
            </div>
          </div>
        </div>
        <div class="detail__content pb-2 bdb mt-3">
          <div class="row">
            <div class="col-4">
              <h3>Website Sekolah</h3>
            </div>
            <div class="col-1">
              <h3>:</h3>
            </div>
            <div class="col-7">
              <h3><?= $dataSekolah['website']; ?></h3>
            </div>
          </div>
        </div>
        <div class="detail__content pb-2 bdb mt-3">
          <div class="row">
            <div class="col-4">
              <h3>Alamat</h3>
            </div>
            <div class="col-1">
              <h3>:</h3>
            </div>
            <div class="col-7">
              <h3>
                <?= $dataSekolah['alamat']; ?>
              </h3>
            </div>
          </div>
        </div>
        <div class="detail__content pb-2 bdb mt-3">
          <div class="row">
            <div class="col-4">
              <h3>Titik Koordinat</h3>
            </div>
            <div class="col-1">
              <h3>:</h3>
            </div>
            <div class="col-7">
              <h3>Lintang : <?= $dataSekolah['lintang']; ?>, Bujur : <?= $dataSekolah['bujur']; ?> </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-end mt20">
      <div class="btn__hapus">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger bd__radius__none" data-bs-toggle="modal" data-bs-target="#exampleModal2">
          <h4 class="text-white">Hapus</h4>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="<?= base_url() ?>/admin/hapusDataSekolah/<?= $dataSekolah['npsn']; ?>">
                  <button type="button" class="btn btn-danger">
                    Hapus
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="<?= base_url() ?>/admin/editSekolah/<?= $dataSekolah['npsn']; ?>" class="ms-3">
        <button type="button" class="btn btn-primary bd__radius__none bgblue">
          <h4 class="text-white">Edit</h4>
        </button>
      </a>
    </div>
  </div>

  <h2 class="fw-bold darkblue mt40">Info Terkait Lainnya</h2>
  <!-- Ajax tabs -->
  <ul class="ajax__section nav nav-tabs mt20" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#tenagaPendidik" type="button" role="tab" aria-controls="home" aria-selected="true">
        Data Tenaga Pendidik
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#sarpras" type="button" role="tab" aria-controls="profile" aria-selected="false">
        Data Sarpras
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#siswa" type="button" role="tab" aria-controls="profile" aria-selected="false">
        Data Siswa
      </button>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <!-- Data tenaga pendidik -->
    <div class="tab-pane fade show active" id="tenagaPendidik" role="tabpanel" aria-labelledby="profile-tab">
      <div class="tabel__tenaga__pendidik tabel__section border-top-0 px-3 table-responsive bgwhite pt20 pb20">
        <table class="table table-responsive table-hover mb20i border-bottom-0" id="dataTenagaPendidikSd">
          <div class="d-flex justify-content-between align-items-center mb20">
            <h4 class="darkblue fw-bold">Data Tenaga Pendidik Terbaru</h3>
              <a href="<?= base_url('admin/tambahTenagaPendidikSmp/' . $dataSekolah['npsn']); ?>">
                <div class="btn btn-primary bd__radius__none bgblue">Tambah Tenaga Pendidik <i class="bi bi-plus text-white"></i></div>
              </a>
          </div>
          <thead>
            <tr>
              <th scope="col" class="text-center">
                <div class="fw600 grey nomor">No</div>
              </th>
              <th scope="col">NUPTK</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Satuan Pendidikan</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Data -->
            <?php $i = 1; ?>
            <?php foreach ($dataTenagaPendidik as $dataTenagaPendidik) : ?>
              <tr>
                <td scope="row" class="text-center"><?= $i++; ?></td>
                <td><?= $dataTenagaPendidik['nuptk']; ?></td>
                <td><?= $dataTenagaPendidik['nama_tenaga_pendidik']; ?></td>
                <td><?= $dataTenagaPendidik['jenis_kelamin']; ?></td>
                <td><?= $dataTenagaPendidik['nama_jabatan']; ?></td>
                <td><?= $dataTenagaPendidik['nama_sekolah']; ?></td>
                <td class="text-center">
                  <div class="d-flex justify-content-center">
                    <div class="btn__edit">
                      <a href="<?= base_url() ?>/admin/editTenagaPendidik/<?= $dataTenagaPendidik['nik']; ?>" class="me-2">
                        <button type="button" class="button button__transparan" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat detail">
                          <i class="bi bi-pencil-square blue"></i></button></a>
                    </div>
                    <div class="btn__hapus">
                      <!-- Button trigger modal -->
                      <button type="button" class="button button__transparan" data-bs-toggle="modal" data-bs-target="#modal_<?= $dataTenagaPendidik['nik']; ?>">
                        <i class="bi bi-trash3-fill red"></i>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="modal_<?= $dataTenagaPendidik['nik']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="<?= base_url() ?>/admin/hapusTenagaPendidik/<?= $dataTenagaPendidik['nik']; ?>">
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
            <!-- End data -->
          </tbody>
        </table>
      </div>
    </div>
    <!-- End tenaga pendidik -->

    <!-- Data sarpras -->
    <div class="tab-pane fade" id="sarpras" role="tabpanel" aria-labelledby="profile-tab">
      <div class="tabel__section bgwhite d-flex justify-content-center align-items-center sarpras__section border-top-0 px-3 table-responsive pt20 pb20">
        <div class="maintenance__content text-center">
          <img src="<?= base_url('/assets/img/maintenance-icon.png'); ?>" alt="">
          <h4 class="mt10">Sedang dalam pengembangan</h4>
        </div>
      </div>
    </div>
    <!-- End data sarpras -->

    <!-- Data siswa -->
    <div class="tab-pane fade" id="siswa" role="tabpanel" aria-labelledby="profile-tab">
      <div class="tabel__section bgwhite d-flex justify-content-center align-items-center siswa__section border-top-0 px-3 table-responsive pt20 pb20">
        <div class="maintenance__content text-center">
          <img src="<?= base_url('/assets/img/maintenance-icon.png'); ?>" alt="">
          <h4 class="mt10">Sedang dalam pengembangan</h4>
        </div>
      </div>
    </div>
    <!-- End data siswa -->
  </div>

</div>
<?= $this->endSection(); ?>