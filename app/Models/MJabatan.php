<?php

namespace App\Models;

use CodeIgniter\Model;

class MJabatan extends Model
{
    protected $table = 'jabatan';

    protected $primaryKey = 'id_jabatan';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_jabatan', 'nama_jabatan'];

    // Join tabel karyawan dengan tabel jabatan
    public function joinKaryawanJabatan()
    {
        $names = ['Kepala Sekolah', 'Tenaga Pendidik', 'Tenaga Administrasi'];
        $builder = $this->db->table('jabatan');
        $builder->select('nama_karyawan, nama_jabatan, jabatan.id_jabatan');
        $builder->join('karyawan_dinas', 'karyawan_dinas.id_jabatan = jabatan.id_jabatan');
        $builder->whereNotIn('nama_jabatan', $names);
        $query = $builder->get()->getResultArray();
        return $query;
        // $query = $builder->get()->getResultArray();
        // return $query;
    }
    // End join tabel karyawan dengan tabel jabatan

    // Fungsi menampilkan hanya jabatan tenaga pendidik
    public function jabatanTenagaPendidik()
    {
        $names = ['Kepala Sekolah', 'Tenaga Pendidik', 'Tenaga Administrasi'];
        $builder = $this->db->table('jabatan');
        $builder->select();
        $builder->whereIn('nama_jabatan', $names);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // End fungsi menampilkan hanya jabatan tenaga pendidik

    // Fungsi menampilkan hanya jabatan karyawan dinas
    public function jabatanKaryawanDinas()
    {
        $names = ['Kepala Sekolah', 'Tenaga Pendidik', 'Tenaga Administrasi'];
        $builder = $this->db->table('jabatan');
        $builder->select();
        $builder->whereNotIn('nama_jabatan', $names);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // End fungsi menampilkan hanya jabatan tenaga pendidik

    public function jumlahKaryawanJabatan($id_jabatan)
    {
        $builder = $this->db->table('jabatan');
        $builder->select();
        $builder->join('karyawan_dinas', 'jabatan.id_jabatan = karyawan_dinas.id_jabatan');
        $builder->where('karyawan_dinas.id_jabatan', $id_jabatan);

        return  $builder->countAllResults();
    }
}
