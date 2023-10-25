<?php

namespace App\Controllers;

use App\Models\MIndikatorKerja;
use App\Models\MSekolah;
use App\Models\MJabatan;
use App\Models\MKaryawanDinas;
use App\Models\MKotakSaran;
use App\Models\MTenagaPendidik;

class User extends BaseController
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
    }

    // Halaman beranda
    public function index()
    {
        // Jumlah sd
        $jumlahSd = [
            'negeri' => $this->MSekolah->jumlahSekolah('sd', 'negeri'),
            'swasta' => $this->MSekolah->jumlahSekolah('sd', 'swasta'),
            'totalSd' => $this->MSekolah->jumlahSekolah('sd')
        ];
        // dd($jumlahSd);
        // End jumlah sd

        // Jumlah smp
        $jumlahSmp = [
            'negeri' => $this->MSekolah->jumlahSekolah('smp', 'negeri'),
            'swasta' => $this->MSekolah->jumlahSekolah('smp', 'swasta'),
            'totalSmp' => $this->MSekolah->jumlahSekolah('smp')
        ];
        // dd($jumlahSmp);
        // End jumlah smp


        $data = [
            'title' => 'Beranda | Profil Pendidikan',
            'jumlahSd' => $jumlahSd,
            'jumlahSmp' => $jumlahSmp
        ];

        return view('pages/user/index', $data);
    }
    // End beranda

    // Tentang
    public function tentang()
    {
        $karyawanDinas = $this->MKaryawanDinas->karyawanDinasIndikatorKerja();

        // foreach ($karyawanDinas as $item) {
        //     $indikator[] = $item['deskripsi_indikator'];
        //     $item['deskripsi_indikator'] = $indikator;
        // }
        // $result[] = $item;

        $result = [];

        foreach ($karyawanDinas as $item) {
            $key = $item['nama_karyawan'];
            $activity = $item['deskripsi_indikator'];
            $position = $item['nama_jabatan'];

            if (!isset($result[$key])) {
                $result[$key] = [$key, [], $position];
            }
            $result[$key][1][] = $activity;
        }

        $data = [
            'title' => 'Tentang | Profil Pendidikan',
            'karyawanJabatan' => $result
        ];
        return view('pages/user/tentang', $data);
    }
    // End tentang

    // Rekap data - sekolah dasar
    public function dataSekolahDasar()
    {
        // Menampilkan data sekolah
        $dataSekolah = $this->MSekolah->dataSekolah('sd');

        // Menampilkan data tenaga pendidik
        $dataTenagaPendidik = $this->MTenagaPendidik->dataTenagaPendidik('sd');


        $data = [
            'title' => 'Data Sekolah Dasar | Profil Pendidikan',
            'dataSekolah' => $dataSekolah,
            'dataTenagaPendidik' => $dataTenagaPendidik
        ];
        return view('pages/user/data-sekolah-dasar', $data);
    }
    public function detailSekolahDasar($npsn)
    {
        $dataSekolah = $this->MSekolah->find($npsn);

        $dataTenagaPendidik = $this->MTenagaPendidik->tenagaPendidikNpsn($npsn);
        // dd($dataTenagaPendidik);
        // dd($dataTenagaPendidik);
        $data = [
            'title' => 'Detail Sekolah | Profil Pendidikan',
            'dataSekolah' => $dataSekolah,
            'dataTenagaPendidik' => $dataTenagaPendidik
        ];
        return view('pages/user/detail-sekolah-sd', $data);
    }
    // End rekap data - sekolah dasar

    // Rekap data - sekolah menengah pertama
    public function dataSekolahMenengahPertama()
    {
        // Menampilkan data sekolah
        $dataSekolah = $this->MSekolah->dataSekolah('smp');

        // Menampilkan data tenaga pendidik
        $dataTenagaPendidik = $this->MTenagaPendidik->dataTenagaPendidik('smp');

        // dd($dataSekolah);
        $data = [
            'title' => 'Data Sekolah Menengah Pertama | Profil Pendidikan',
            'dataSekolah' => $dataSekolah,
            'dataTenagaPendidik' => $dataTenagaPendidik
        ];
        return view('pages/user/data-sekolah-menengah-pertama', $data);
    }

    public function detailSekolahMenengahPertama($npsn)
    {
        $dataSekolah = $this->MSekolah->find($npsn);
        $dataTenagaPendidik = $this->MTenagaPendidik->tenagaPendidikNpsn($npsn);

        // dd($dataTenagaPendidik);
        $data = [
            'title' => 'Detail Sekolah | Profil Pendidikan',
            'dataSekolah' => $dataSekolah,
            'dataTenagaPendidik' => $dataTenagaPendidik
        ];
        return view('pages/user/detail-sekolah-smp', $data);
    }
    // End rekap data - sekolah menengah pertama

    // Kotak saran
    public function kotakSaran()
    {
        $data = [
            'title' => 'Kotak Saran | Profil Pendidikan'
        ];
        return view('pages/user/kotak-saran', $data);
    }

    // Fungsi menginput kotak saran dari user 
    public function inputKotakSaran()
    {
        $this->MKotakSaran->save([
            'nama_pengirim' => $this->request->getVar('namaLengkap'),
            'email' => $this->request->getVar('email'),
            'pesan' => $this->request->getVar('pesan')
        ]);

        session()->setFlashdata('pesan', 'Pesan terkirim! Terima kasih atas saran dan masukan Anda.');

        return redirect()->to('/user/kotakSaran');
    }
    // End kotak saran



}
