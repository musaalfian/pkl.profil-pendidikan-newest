<?= $this->extend('layout/template-user'); ?>

<?= $this->section('content'); ?>
<!-- Main page -->
<div class="px saran__section">
  <div class="container">
    <h2 class="fw-bold darkblue">Kotak Saran</h2>
    <h3 class="mt10 grey">
      Berikan saran dan masukan Anda untuk website yang lebih baik.
    </h3>
    <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success mt20 bd__radius__none" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
      </div>
    <?php endif; ?>
    <form action="/user/inputKotakSaran" method="post" class="needs-validation" novalidate>
      <div class="saran__content mt40">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="">
              <label for="namalengkap" class="form-label grey">Nama Lengkap</label>
              <input type="text" name="namaLengkap" required class="form-control grey" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama lengkap" autofocus />
              <div class="invalid-feedback">
                Kolom harus diisi.
              </div>
            </div>
            <div class="mt10">
              <label for="email" class="form-label grey">Email</label>
              <input type="email" name="email" required class="form-control grey" id="email" placeholder="Masukkan email" />
              <div class="invalid-feedback">
                Kolom harus diisi.
              </div>
            </div>
            <div class="mt10 captcha__section">
              <label for="captcha" class="grey">Captcha</label>
              <div class="d-flex justify-content-between mt10">
                <div class="captcha__content">
                  <div id="captcha" class="captcha">
                    <script>
                      createCaptcha();
                    </script>
                  </div>
                </div>
                <div class="input">
                  <input class="input__text" type="text" name="reCaptcha" id="reCaptcha" placeholder="Masukkan captcha" />
                </div>
              </div>
              <div id="errCaptcha" class="errmsg mt10 mb10"></div>
              <div class="restart mt10">
                <a href="#" onclick="createCaptcha()" class="fs14 blue">Ubah kode captcha</a>
              </div>
              <input hidden type="text" name="" id="hasilCaptcha">
              <!-- <button class="btn btn-primary fs14" type="button" onclick="validateCaptcha()">Cek
                            captcha</button> -->
            </div>
          </div>
          <div class="col-md-6 mt-md-0 mt10 col-12">
            <div class="">
              <label for="pesan" class="form-label grey">Pesan</label>
              <div class="form-floating">
                <textarea class="form-control p-2 blue" required name="pesan" placeholder="Masukkan saran dan pesan" id="pesan"></textarea>
                <div class="invalid-feedback">
                  Kolom harus diisi.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-end mt20">
        <!-- Button trigger modal -->
        <button type="button" class="btn button bgblue text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Kirim
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title fw-bold" id="exampleModalLabel">
                  Konfirmasi
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">Yakin ingin mengirim pesan?</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger bd__radius__none" data-bs-dismiss="modal">
                  Batal
                </button>
                <button type="submit" class="btn button text-white bgblue" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-dismiss="modal">
                  Kirim
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  // $(document).ready(function() {
  //     $("#submit_login").prop("disabled", true);
  // });
  $('form').on('submit', function(e) {
    e.preventDefault();
    validateCaptcha();
    if ($('#hasilCaptcha').val() == 'benar') {
      this.submit();
    }
  });
</script>
<!-- End main page -->
<?= $this->endSection(); ?>