<?php

namespace App\Controllers;

use App\Models\MIndikatorKerja;
use App\Models\MSekolah;
use App\Models\MJabatan;
use App\Models\MKaryawanDinas;
use App\Models\MKotakSaran;
use App\Models\MTenagaPendidik;

class Admin extends BaseController
{
    protected $MJabatan;
    protected $MKaryawanDinas;
    protected $MKotakSaran;
    protected $MSekolah;
    protected $MTenagaPendidik;
    protected $MIndikatorKerja;

    public function __construct()
    {
        $this->MJabatan = new MJabatan();
        $this->MKaryawanDinas = new MKaryawanDinas();
        $this->MKotakSaran = new MKotakSaran();
        $this->MSekolah = new MSekolah();
        $this->MTenagaPendidik = new MTenagaPendidik();
        $this->MIndikatorKerja = new MIndikatorKerja();
        $this->db = \Config\Database::connect();
    }

    /* *********************************** */
    /*                INDEX                */
    /* *********************************** */
    public function dashboard()
    {
        // Fungsi menghitung jumlah sekolah
        $dataSekolah = [
            'sd' => $this->MSekolah->dataSekolahLimit('sd'),
            'smp' => $this->MSekolah->dataSekolahLimit('smp'),
            'jumlahSd' => $this->MSekolah->jumlahSekolah('sd'),
            'jumlahSmp' => $this->MSekolah->jumlahSekolah('smp'),
            'jumlahTenagaPendidik' => $this->MTenagaPendidik->jumlahTenagaPendidik(),
            'jumlahTenagaPendidikSd' => $this->MTenagaPendidik->jumlahTenagaPendidik('sd'),
            'jumlahTenagaPendidikSmp' => $this->MTenagaPendidik->jumlahTenagaPendidik('smp'),
        ];

        // Fungsi jenis kelamin
        $tenagaPendidik = [
            'sd' => [
                'lakiLaki' => $this->MTenagaPendidik->jumlahTenagaPendidik('sd', 'Laki - laki'),
                'perempuan' => $this->MTenagaPendidik->jumlahTenagaPendidik('sd', 'Perempuan')
            ],
            'smp' => [
                'lakiLaki' => $this->MTenagaPendidik->jumlahTenagaPendidik('smp', 'Laki - laki'),
                'perempuan' => $this->MTenagaPendidik->jumlahTenagaPendidik('smp', 'Perempuan')
            ]
        ];

        // dd($dataSekolah);
        $data = [
            'tab' => 'beranda',
            'title' => 'Dashboard | Admin',
            'dataSekolah' => $dataSekolah,
            'tenagaPendidik' => $tenagaPendidik
        ];
        return view('pages/admin/index', $data);
    }
    /* *********************************** */
    /*              END INDEX              */
    /* *********************************** */

    /* *********************************** */
    /*            SEKOLAH DASAR            */
    /* *********************************** */
    // Fungsi menampilkan halaman sekolah dasar 
    public function dataSd()
    {
        $dataSekolah = $this->MSekolah->dataSekolah('sd');
        $dataTenagaPendidik = $this->MTenagaPendidik->dataTenagaPendidik('sd');
        // dd($dataTenagaPendidik);
        $data = [
            'title' => 'Data Sekolah Dasar | Admin',
            // 'tab' => 'dataSd',
            'dataSekolah' => $dataSekolah,
            'dataTenagaPendidik' => $dataTenagaPendidik
        ];
        return view('pages/admin/data-sd', $data);
    }
    // End fungsi menampilkan halaman sekolah dasar

    // Fungsi menampilkan halaman detail sekolah
    public function detailSd($npsn)
    {
        $dataSekolah = $this->MSekolah->find($npsn);
        $dataTenagaPendidik = $this->MTenagaPendidik->tenagaPendidikNpsn($npsn);

        $data = [
            'title' => 'Detail Sekolah Dasar | Admin',
            // 'tab' => 'dataSd',
            'dataSekolah' => $dataSekolah,
            'dataTenagaPendidik' => $dataTenagaPendidik
        ];

        return view('pages/admin/detail-sekolah-sd', $data);
    }
    // End fungsi menampilkan halaman detail sekolah

    // Fungsi menampilkan halaman edit sekolah
    public function editSekolah($npsn)
    {
        $dataSekolah = $this->MSekolah->find($npsn);
        // dd($dataSekolah);
        if ($dataSekolah['tingkat_sekolah'] == 'sd') {
            $data = [
                'title' => 'Edit Sekolah Dasar | Admin',
                // 'tab' => 'dataSd',
                'dataSekolah' => $dataSekolah
            ];
            return view('pages/admin/edit-sekolah-sd', $data);
        } else {
            $data = [
                'title' => 'Edit Sekolah Menengah Pertama | Admin',
                'dataSekolah' => $dataSekolah
            ];
            return view('pages/admin/edit-sekolah-smp', $data);
        }
    }
    // End fungsi menampilkan halam edit sekolah

    // Fungsi menyimpan edit sekolah
    public function simpanEditSekolah($npsn)
    {
        $gambarLama = $this->request->getVar('fotoLama');

        //ambil gambar inputan
        $gambar = $this->request->getFile('foto');
        // apakah tidak ada gambar yang di upload
        $namaGambar = 'icon-sekolah.jpg';
        if ($gambar->getError() == 4) {
            $namaGambar = $gambarLama;
        } else {
            if ($gambarLama != 'icon-sekolah.jpg') {
                unlink('assets/img/admin/' . $gambarLama);

                // pindahkan file ke folder image
                $namaGambar = $gambar->getName();
                $gambar->move('assets/img/admin');
            } else {
                // pindahkan file ke folder image
                $namaGambar = $gambar->getName();
                $gambar->move('assets/img/admin');
            }
        };

        $dataSekolah = [
            'npsn' => $this->request->getVar('npsn'),
            'nama_sekolah' => $this->request->getVar('namaSekolah'),
            'akreditasi' => $this->request->getVar('akreditasi'),
            'kontak' => $this->request->getVar('kontak'),
            'status_sekolah' => $this->request->getVar('statusSekolah'),
            'lintang' => $this->request->getVar('lintang'),
            'bujur' => $this->request->getVar('bujur'),
            'alamat' => $this->request->getVar('alamat'),
            'foto_depan_sekolah' => $namaGambar,
            'tingkat_sekolah' => $this->request->getVar('tingkatSekolah')
        ];

        $tingkatSekolah = $this->request->getVar('tingkatSekolah');
        $npsnBaru = $this->request->getVar('npsn');

        $this->MSekolah->update($npsn, $dataSekolah);
        // dd($dataSekolah);

        session()->setFlashdata('pesanSimpanEditSekolah', 'Data berhasil diperbarui.');
        return redirect()->to('/Admin/editSekolah/' . $npsnBaru);
    }
    // End fungsi menyimpan edit sekolah


    // Fungsi menampilkan halaman tambah data sekolah
    public function tambahSekolahSd()
    {
        $data = [
            'title' => 'Tambah Data Sekolah Dasar | Admin'
        ];
        return view('pages/admin/tambah-sekolah-sd', $data);
    }
    // End fungsi menampilkan halaman tambah data sekolah

    // Fungsi menampilkan halaman tambah tenaga pendidik
    public function tambahTenagaPendidikSd($npsn)
    {
        $jabatan = $this->MJabatan->jabatanTenagaPendidik();
        $satuanPendidikan = $this->MSekolah->dataSekolah('sd');
        // $npsn = $this->MSekolah->find($npsn);
        // dd($npsn);

        $data = [
            'title' => 'Tambah Tenaga Pendidik Sekolah Dasar | Admin',
            'jabatan' => $jabatan,
            'satuanPendidikan' => $satuanPendidikan,
            'npsn' => $npsn
        ];
        return view('pages/admin/tambah-tenaga-pendidik-sd', $data);
    }
    // End fungsi menampilkan halaman tambah tenaga pendidik

    // Fungsi menambah data tenaga pendidik
    public function simpanTenagaPendidikSd()
    {
        $dataTenagaPendidik = [
            'nik' => $this->request->getVar('nik'),
            'nuptk' => $this->request->getVar('nuptk'),
            'nama_tenaga_pendidik' => $this->request->getVar('namaTenagaPendidik'),
            'jenis_kelamin' => $this->request->getVar('jenisKelamin'),
            'id_jabatan' => $this->request->getVar('jabatan'),
            'npsn' => $this->request->getVar('npsn'),
        ];
        $npsn = $this->request->getVar('npsn');

        $this->MTenagaPendidik->insert($dataTenagaPendidik);

        session()->setFlashdata('pesanSimpanTenagaPendidikSd', 'Data berhasil ditambahkan.');

        return redirect()->to('/Admin/detailSd/' . $npsn);
    }
    // End fungsi menambah data tenaga pendidik

    // Fungsi menampilkan halaman edit tenaga pendidik
    public function editTenagaPendidik($nik)
    {
        $dataTenagaPendidik = $this->MTenagaPendidik->tenagaPendidikNik($nik);
        // dd($dataTenagaPendidik);
        $jabatan = $this->MJabatan->findAll();
        $satuanPendidikan = $this->MSekolah->dataSekolah($dataTenagaPendidik['tingkat_sekolah']);

        $npsn = $dataTenagaPendidik['npsn'];

        if ($dataTenagaPendidik['tingkat_sekolah'] == 'sd') {
            $data = [
                'title' => 'Edit Tenaga Pendidik Sekolah Dasar | Admin',
                'dataTenagaPendidik' => $dataTenagaPendidik,
                'jabatan' => $jabatan,
                'satuanPendidikan' => $satuanPendidikan,
                'npsn' => $npsn
            ];
            return view('pages/admin/edit-tenaga-pendidik-sd', $data);
        } else {
            $data = [
                'title' => 'Edit Sekolah Menengah Pertama | Admin',
                'dataTenagaPendidik' => $dataTenagaPendidik,
                'jabatan' => $jabatan,
                'satuanPendidikan' => $satuanPendidikan,
                'npsn' => $npsn
            ];
            return view('pages/admin/edit-tenaga-pendidik-smp', $data);
        }
    }
    // End fungsi menampilkan halaman edit tenaga pendidik

    // Fungsi menyimpan edit tenaga pendidik
    public function simpanEditTenagaPendidik($nik, $tingkatSekolah)
    {
        $dataTenagaPendidik = [
            'nik' => $this->request->getVar('nik'),
            'nuptk' => $this->request->getVar('nuptk'),
            'nama_tenaga_pendidik' => $this->request->getVar('namaTenagaPendidik'),
            'jenis_kelamin' => $this->request->getVar('jenisKelamin'),
            'id_jabatan' => $this->request->getVar('jabatan'),
            'npsn' => $this->request->getVar('satuanPendidikan'),
        ];

        $this->MTenagaPendidik->update($nik, $dataTenagaPendidik);
        // dd($dataSekolah);

        session()->setFlashdata('pesanSimpanEditTenagaPendidik', 'Data berhasil diperbarui.');
        return redirect()->to('/Admin/editTenagaPendidik/' . $nik);
    }
    // End fungsi menyimpan edit tenaga pendidik
    /* *********************************** */
    /*          END SEKOLAH DASAR          */
    /* *********************************** */

    /* *********************************** */
    /*      SEKOLAH MENENGAH PERTAMA       */
    /* *********************************** */

    // Fungsi menampilkan halaman data sekolah
    public function dataSmp()
    {
        $dataSekolah = $this->MSekolah->dataSekolah('smp');
        $dataTenagaPendidik = $this->MTenagaPendidik->dataTenagaPendidik('smp');

        $data = [
            'title' => 'Data Sekolah Menengah Pertama | Admin',
            'dataSekolah' => $dataSekolah,
            'dataTenagaPendidik' => $dataTenagaPendidik
        ];
        return view('pages/admin/data-smp', $data);
    }
    // End fungsi menampilkan halaman data sekolah

    // Fungsi menampilkan detail sekolah
    public function detailSmp($npsn)
    {
        $dataSekolah = $this->MSekolah->find($npsn);
        $dataTenagaPendidik = $this->MTenagaPendidik->tenagaPendidikNpsn($npsn);

        $data = [
            'title' => 'Detail Sekolah Menengah Pertama | Admin',
            'dataSekolah' => $dataSekolah,
            'dataTenagaPendidik' => $dataTenagaPendidik
        ];
        return view('pages/admin/detail-sekolah-smp', $data);
    }
    // End fungsi menampilkan detail sekolah

    // Fungsi menampilkan halaman edit sekolah 
    public function editSekolahSmp()
    {
        $data = [
            'title' => 'Detail Sekolah Menengah Pertama | Admin'
        ];
        return view('pages/admin/edit-sekolah-smp', $data);
    }
    // End fungsi menampilkan halaman edit sekolah 

    // Fungsi menampilkan halaman tambah sekolah
    public function tambahSekolahSmp()
    {
        $data = [
            'title' => 'Tambah Data Sekolah Menengah Pertama | Admin'
        ];
        return view('pages/admin/tambah-sekolah-smp', $data);
    }
    // End fungsi menampilkan halaman tambah sekolah

    // Fungsi menampilkan halaman tambah tenaga pendidik
    public function tambahTenagaPendidikSmp($npsn)
    {
        $jabatan = $this->MJabatan->jabatanTenagaPendidik();
        $satuanPendidikan = $this->MSekolah->dataSekolah('smp');
        // $npsn = $this->MSekolah->find($npsn);
        // dd($npsn);
        $data = [
            'title' => 'Tambah Tenaga Pendidik Sekolah Menengah Pertama | Admin',
            'jabatan' => $jabatan,
            'satuanPendidikan' => $satuanPendidikan,
            'npsn' => $npsn,
        ];
        return view('pages/admin/tambah-tenaga-pendidik-smp', $data);
    }
    //  End fungsi menampilkan halaman tambah tenaga pendidik

    // Fungsi menambah data tenaga pendidik smp
    public function simpanTenagaPendidikSmp()
    {
        $dataTenagaPendidik = [
            'nik' => $this->request->getVar('nik'),
            'nuptk' => $this->request->getVar('nuptk'),
            'nama_tenaga_pendidik' => $this->request->getVar('namaTenagaPendidik'),
            'jenis_kelamin' => $this->request->getVar('jenisKelamin'),
            'id_jabatan' => $this->request->getVar('jabatan'),
            'npsn' => $this->request->getVar('npsn'),
        ];
        $npsn = $this->request->getVar('npsn');

        $this->MTenagaPendidik->insert($dataTenagaPendidik);

        session()->setFlashdata('pesanSimpanTenagaPendidikSmp', 'Data berhasil ditambahkan.');

        return redirect()->to('/Admin/detailSmp/' . $npsn);
    }
    // End fungsi menambah data tenaga pendidik smp
    /* *********************************** */
    /*    END SEKOLAH MENENGAH PERTAMA     */
    /* *********************************** */

    /* *********************************** */
    /*           TAMBAH SEKOLAH            */
    /* *********************************** */
    // Fungsi menambah data sekolah sd atau smp
    public function simpanSekolah($tingkatSekolah)
    {
        //ambil gambar inputan
        // dd($tingkatSekolah);
        $gambar = $this->request->getFile('foto');
        // apakah tidak ada gambar yang di upload
        if ($gambar->getError() == 4) {
            $namaGambar = 'icon-sekolah.jpg';
        } else {
            // pindahkan file ke folder image
            $namaGambar = $gambar->getName();
            $gambar->move('assets/img/admin');
        };

        $dataSekolah = [
            'npsn' => $this->request->getVar('npsn'),
            'nama_sekolah' => $this->request->getVar('namaSekolah'),
            'akreditasi' => $this->request->getVar('akreditasi'),
            'kontak' => $this->request->getVar('kontak'),
            'status_sekolah' => $this->request->getVar('statusSekolah'),
            'website' => $this->request->getVar('website'),
            'lintang' => $this->request->getVar('lintang'),
            'bujur' => $this->request->getVar('bujur'),
            'alamat' => $this->request->getVar('alamat'),
            'foto_depan_sekolah' => $namaGambar,
            'tingkat_sekolah' => $tingkatSekolah
        ];

        $this->MSekolah->insert($dataSekolah);
        // dd($dataSekolah);
        // dd($dataSekolah);

        session()->setFlashdata('pesanSimpanSekolah', 'Data berhasil ditambahkan.');

        if ($tingkatSekolah == 'sd') {
            return redirect()->to('/Admin/dataSd');
        } else {
            return redirect()->to('/Admin/dataSmp');
        }
    }
    // End fungsi menambah data sekolah sd atau smp
    /* *********************************** */
    /*         END TAMBAH SEKOLAH          */
    /* *********************************** */

    /* *********************************** */
    /*            HAPUS SEKOLAH            */
    /* *********************************** */
    // Fungsi menghapus data sekolah sd atau smp
    public function hapusDataSekolah($npsn)
    {
        $dataSekolah = $this->MSekolah->find($npsn);
        $tingkatSekolah = $dataSekolah['tingkat_sekolah'];

        if ($dataSekolah['foto_depan_sekolah'] != 'icon-sekolah.jpg') {
            unlink('assets/img/admin/' . $dataSekolah['foto_depan_sekolah']);
        };
        $this->MSekolah->delete($npsn);

        if ($tingkatSekolah == 'sd') {
            return redirect()->to('/Admin/dataSd');
        } else {
            return redirect()->to('/Admin/dataSmp');
        }
    }
    // End fungsi menghapus data sekolah sd atau smp
    /* *********************************** */
    /*         END HAPUS SEKOLAH           */
    /* *********************************** */


    /* *********************************** */
    /*       HAPUS TENAGA PENDIDIK         */
    /* *********************************** */
    // Fungsi menghapus tenaga pendidik sd atau smp
    public function hapusTenagaPendidik($nik)
    {
        $dataTenagaPendidik = $this->MTenagaPendidik->tenagaPendidikNik($nik);
        // dd($dataTenagaPendidik);
        $tingkatSekolah = $dataTenagaPendidik['tingkat_sekolah'];
        $npsn = $dataTenagaPendidik['npsn'];

        $this->MTenagaPendidik->delete($nik);

        if ($tingkatSekolah == 'sd') {
            return redirect()->to('/Admin/detailSd/' . $npsn);
        } else {
            return redirect()->to('/Admin/detailSmp/' . $npsn);
        }
    }
    // End fungsi menghapus tenaga pendidik sd atau smp
    /* *********************************** */
    /*      END HAPUS TENAGA PENDIDIK      */
    /* *********************************** */

    /* *********************************** */
    /*         STRUKTUR ORGANISASI         */
    /* *********************************** */
    // Struktur organsisasi
    public function strukturOrganisasi()
    {
        $strukturOrganisasi = $this->MKaryawanDinas->strukturOrganisasi();
        $data = [
            'title' => 'Struktur Organisasi | Admin',
            'strukturOrganisasi' => $strukturOrganisasi
        ];

        return view('pages/admin/struktur-organisasi', $data);
    }
    public function tambahStrukturOrganisasi()
    {
        $jabatan = $this->MJabatan->jabatanKaryawanDinas();
        $i = 0;
        foreach ($jabatan as $jabatan) {
            $jabatan['slot'] =   $this->MJabatan->jumlahKaryawanJabatan($jabatan['id_jabatan']);
            // if ($jabatan['slot'] == 0) {
            $jabatan_karyawan[] = $jabatan;
            // } else {
            //     $jabatan_karyawan[] = null;
            // }
        };
        // dd($jabatan);
        // dd($jabatan_karyawan);
        $strukturOrganisasi = $this->MKaryawanDinas->strukturOrganisasi();
        // dd($strukturOrganisasi);
        $pangkat = [
            'Juru',
            'Pengatur',
            'Penata',
            'Pembina'
        ];
        // dd($pangkat);
        $golongan = [
            'I' => [
                'IA',
                'IB',
                'IC',
                'ID',
            ],
            'II' => [
                'IIA',
                'IIB',
                'IIC',
                'IID',
            ],
            'III' => [
                'IIIA',
                'IIIB',
                'IIIC',
                'IIID',
            ],
            'IV' => [
                'IVA',
                'IVB',
                'IVC',
                'IVD',
            ],
        ];
        // dd($golongan);
        $data = [
            'title' => 'Struktur Organisasi | Admin',
            'jabatan' => $jabatan_karyawan,
            'strukturOrganisasi' => $strukturOrganisasi,
            'pangkat' => $pangkat,
            'golongan' => $golongan,
        ];
        return view('pages/admin/tambah-struktur-organisasi', $data);
    }
    public function simpanTambahStrukturOrganisasi()
    {
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama_karyawan' => $this->request->getVar('namaKaryawan'),
            'jenis_kelamin' => $this->request->getVar('jenisKelamin'),
            'id_jabatan' => $this->request->getVar('jabatan'),
            'tanggal_lahir' => $this->request->getVar('tanggalLahir'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'pangkat' => $this->request->getVar('pangkat'),
            'golongan' => $this->request->getVar('golongan'),
        ];

        $this->MKaryawanDinas->insert($data);
        session()->setFlashdata('pesanTambahKaryawan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/tambahStrukturOrganisasi');
    }
    public function editStrukturOrganisasi($nip)
    {
        $jabatan = $this->MJabatan->findAll();
        $karyawan = $this->MKaryawanDinas->find($nip);
        $pangkat = [
            'Juru',
            'Pengatur',
            'Penata',
            'Pembina'
        ];
        // dd($pangkat);
        $golongan = [
            'I' => [
                'IA',
                'IB',
                'IC',
                'ID',
            ],
            'II' => [
                'IIA',
                'IIB',
                'IIC',
                'IID',
            ],
            'III' => [
                'IIIA',
                'IIIB',
                'IIIC',
                'IIID',
            ],
            'IV' => [
                'IVA',
                'IVB',
                'IVC',
                'IVD',
            ],
        ];
        $data = [
            'title' => 'Edit Struktur Organisasi | Admin',
            'karyawan'  => $karyawan,
            'jabatan' => $jabatan,
            'pangkat' => $pangkat,
            'golongan' => $golongan,
        ];
        return view('pages/admin/edit-struktur-organisasi', $data);
    }

    // Fungsi untuk menyimpan edit struktur organisasi
    public function simpanEditStrukturOrganisasi($nip)
    {
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama_karyawan' => $this->request->getVar('namaKaryawan'),
            'jenis_kelamin' => $this->request->getVar('jenisKelamin'),
            'id_jabatan' => $this->request->getVar('jabatan'),
            'tanggal_lahir' => $this->request->getVar('tanggalLahir'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'pangkat' => $this->request->getVar('pangkat'),
            'golongan' => $this->request->getVar('golongan'),
        ];

        $this->MKaryawanDinas->update($nip, $data);
        // dd($data);


        session()->setFlashdata('pesanSimpanEditStrukturOrganisasi', 'Data berhasil diperbarui.');

        return redirect()->to('/admin/editStrukturOrganisasi/' . $nip);
    }
    // End fungsi untuk menyimpan edit struktur organisasi

    // Fungsi menghapus struktur organisasi
    public function hapusStrukturOrganisasi($nip)
    {
        $this->MKaryawanDinas->delete($nip);

        return redirect()->to('/admin/strukturOrganisasi');
    }
    // End fungsi menghapus struktur organisasi
    /* *********************************** */
    /*       END STRUKTUR ORGANISASI       */
    /* *********************************** */

    /* *********************************** */
    /*              JABATAN                */
    /* *********************************** */
    public function jabatan()
    {
        $jabatan = $this->MJabatan->jabatanKaryawanDinas();
        foreach ($jabatan as $jabatan) {
            $jabatan['indikator_kerja'] = $this->MIndikatorKerja->indikatorJabatan($jabatan['id_jabatan']);
            $jbt[] = $jabatan;
        };
        $data = [
            'title' => 'Jabatan | Admin',
            // 'indikatorKerja' => $indikatorKerja,
            'jabatan' => $jbt,
        ];

        return view('pages/admin/jabatan', $data);
    }

    // Fungsi menambah jabatan
    public function simpanJabatan()
    {
        $jabatan = [
            'nama_jabatan' => $this->request->getVar('namaJabatan'),
        ];
        $this->MJabatan->insert($jabatan);
        $idJabatan = $this->db->insertID();
        // dd($idJabatan);

        // Fungsi untuk menambah indikator kerja dengan semi colon
        $indikatorKerja = $this->request->getVar('indikatorKerja');
        $indikatorKerja = (explode(";", $indikatorKerja));
        // End Fungsi untuk menambah indikator kerja dengan semi colon
        // dd($indikatorKerja);
        foreach ($indikatorKerja as $indikatorKerja) {
            $deskripsiIndikator = [
                'deskripsi_indikator' => $indikatorKerja,
                'id_jabatan' => $idJabatan
            ];
            $this->MIndikatorKerja->insert($deskripsiIndikator);
        }

        session()->setFlashdata('pesanJabatan', 'Jabatan berhasil ditambahkan.');

        return redirect()->to('/Admin/jabatan');
    }
    // End fungsi menambah jabatan

    public function editJabatan($idJabatan)
    {
        $jabatan = $this->MJabatan->find($idJabatan);
        // $indikatorKerja = $this->MIndikatorKerja->indikatorJabatan($jabatan['id_jabatan']);
        // $jabatan['indikator_kerja'] = $this->MIndikatorKerja->indikatorJabatan($idJabatan);
        $indikatorKerja = $this->MIndikatorKerja->indikatorJabatan($idJabatan);
        // dd($indikatorKerja);
        foreach ($indikatorKerja as $indikatorKerja) {
            $indikator[] = $indikatorKerja['deskripsi_indikator'] . "; \n";
        }

        // dd($indikator);

        // foreach ($jabatan as $jabatan) {
        //     $jabatan['indikator_kerja'] = $this->MIndikatorKerja->indikatorJabatan($jabatan['id_jabatan']);
        //     $jbt[] = $jabatan;
        // };
        // dd($jbt);
        $data = [
            'title' => 'Edit Jabatan | Admin',
            // 'indikatorKerja' => $indikatorKerja,
            'jabatan' => $jabatan,
            'indikator' => $indikator,
        ];

        return view('pages/admin/edit-jabatan', $data);
    }

    // Fungsi menyimpan edit jabatan
    public function simpanEditJabatan($idJabatan)
    {
        $data = [
            'nama_jabatan' => $this->request->getVar('namaJabatan'),
        ];

        $this->MJabatan->update($idJabatan, $data);
        // dd($dataSekolah);
        $this->MIndikatorKerja->hapusIndikator($idJabatan);
        $indikatorKerja = $this->request->getVar('indikatorKerja');
        $indikatorKerja = (explode(";", $indikatorKerja));
        foreach ($indikatorKerja as $indikatorKerja) {
            if (strlen(trim($indikatorKerja)) != 0) {
                $indikator = [
                    'deskripsi_indikator' => trim($indikatorKerja),
                    'id_jabatan' => $idJabatan
                ];
                $this->MIndikatorKerja->insert($indikator);
            }
        }
        // dd($indikator);

        session()->setFlashdata('pesanSimpanEditJabatan', 'Data berhasil diperbarui.');

        return redirect()->to('/Admin/editJabatan/' . $idJabatan);
    }
    // End fungsi menyimpan edit jabatan

    // Fungsi menghapus jabatan
    public function hapusJabatan($idJabatan)
    {
        $this->MJabatan->delete($idJabatan);

        session()->setFlashdata('pesanHapusJabatan', 'Data berhasil dihapus.');

        return redirect()->to('/admin/jabatan');
    }
    // End fungsi menghapus jabatan

    /* *********************************** */
    /*           END JABATAN               */
    /* *********************************** */

    /* *********************************** */
    /*            KOTAK SARAN              */
    /* *********************************** */
    // Kotak saran
    public function kotakSaran()
    {
        $kotakSaran = $this->MKotakSaran->kotakSaran();

        $data = [
            'title' => 'Kotak Saran | Admin',
            'kotakSaran' => $kotakSaran
        ];
        return view('pages/admin/kotak-saran', $data);
    }
    // End kotak saran

    // Fungsi menghapus kotak saran
    public function hapusKotakSaran($idKotakSaran)
    {
        $this->MKotakSaran->delete($idKotakSaran);

        return redirect()->to('admin/kotakSaran');
    }
    // End fungsi menghapus kotak saran
    /* *********************************** */
    /*          END KOTAK SARAN            */
    /* *********************************** */


    // public function logout()
    // {
    //     $data = [
    //         'title' => 'Struktur Organisasi | Admin'
    //     ];
    //     return view('pages/admin/login', $data);
    // }

    // // Login
    // public function login()
    // {
    //     $data = [
    //         'title' => 'Login | Admin'
    //     ];
    //     return view('pages/admin/login', $data);
    // }
    // public function daftar()
    // {
    //     $data = [
    //         'title' => 'Daftar | Admin'
    //     ];
    //     return view('pages/admin/daftar', $data);
    // }
    // public function lupaSandi()
    // {
    //     $data = [
    //         'title' => 'Daftar | Admin'
    //     ];
    //     return view('pages/admin/lupa-sandi', $data);
    // }
    // End login
}
