<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class MTenagaPendidik extends Model
{
    protected $table = 'tenaga_pendidik';

    protected $primaryKey = 'nik';
    protected $allowedFields = ['nik', 'nuptk', 'nama_tenaga_pendidik', 'jenis_kelamin', 'id_jabatan', 'npsn'];

    // Fungsi menampilkan data tenaga pendidik
    public function dataTenagaPendidik($tingkatSekolah)
    {
        $builder = $this->db->table('tenaga_pendidik');
        $builder->join('sekolah', 'sekolah.npsn = tenaga_pendidik.npsn');
        $builder->join('jabatan', 'jabatan.id_jabatan = tenaga_pendidik.id_jabatan');
        $builder->where('tingkat_sekolah', $tingkatSekolah);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // End fungsi menampilkan data tenaga pendidik

    // Fungsi mengambil tenaga pendidik berdasarkan nik
    public function tenagaPendidikNik($nik)
    {
        $builder = $this->db->table('tenaga_pendidik');
        $builder->join('sekolah', 'sekolah.npsn = tenaga_pendidik.npsn');
        $builder->join('jabatan', 'jabatan.id_jabatan = tenaga_pendidik.id_jabatan');
        $builder->where('nik', $nik);
        $query = $builder->get()->getFirstRow('array');
        return $query;
    }
    // End fungsi mengambil tenaga pendidik berdasarkan nik

    // Fungsi menghitung jumlah tenaga pendidik
    public function jumlahTenagaPendidik($tingkatSekolah = '', $jenisKelamin = '')
    {
        $builder = $this->db->table('tenaga_pendidik');
        $builder->join('sekolah', 'sekolah.npsn = tenaga_pendidik.npsn');
        $builder->like('tingkat_sekolah', $tingkatSekolah);
        $builder->like('jenis_kelamin', $jenisKelamin);
        return $builder->countAllResults();
    }
    // End fungsi menghitung jumlah tenaga pendidik

    // Fungsi mengambil tenaga pendidik berdasarkan npsn
    public function tenagaPendidikNpsn($npsn)
    {
        $builder = $this->db->table('tenaga_pendidik');
        $builder->join('sekolah', 'sekolah.npsn = tenaga_pendidik.npsn');
        $builder->join('jabatan', 'jabatan.id_jabatan = tenaga_pendidik.id_jabatan');
        $builder->where('tenaga_pendidik.npsn =', $npsn);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // End fungsi mengambil tenaga pendidik berdasarkan npsn
};
