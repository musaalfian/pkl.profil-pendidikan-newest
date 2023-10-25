<?php

namespace App\Models;

use CodeIgniter\Model;

class MSekolah extends Model
{
    protected $table = 'sekolah';

    protected $primaryKey = 'npsn';
    protected $allowedFields = ['npsn', 'nama_sekolah', 'akreditasi', 'kontak', 'status_sekolah', 'lintang', 'bujur', 'alamat', 'foto_depan_sekolah', 'tingkat_sekolah', 'website'];

    // Fungsi menghitung jumlah sekolah
    public function jumlahSekolah($tingkatSekolah, $statusSekolah = '')
    {
        $builder = $this->db->table('sekolah');
        $builder->like('tingkat_sekolah', $tingkatSekolah);
        $builder->like('status_sekolah', $statusSekolah);
        return $builder->countAllResults();
    }
    // End fungsi menghitung jumlah sekolah

    // Fungsi menampilkan data sekolah
    public function dataSekolah($tingkatSekolah)
    {
        $builder = $this->db->table('sekolah');
        $builder->where('tingkat_sekolah', $tingkatSekolah);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // End fungsi menampilkan data sekolah

    // Fungsi menampilkan data sekolah limit 5
    public function dataSekolahLimit($tingkatSekolah)
    {
        $builder = $this->db->table('sekolah');
        $builder->where('tingkat_sekolah', $tingkatSekolah);
        $builder->limit(6);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // End fungsi menampilkan data sekolah
}
