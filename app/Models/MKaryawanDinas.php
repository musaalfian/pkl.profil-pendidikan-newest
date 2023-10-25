<?php

namespace App\Models;

use CodeIgniter\Model;

class MKaryawanDinas extends Model
{
    protected $table = 'karyawan_dinas';

    protected $primaryKey = 'nip';
    protected $allowedFields = ['nip', 'nama_karyawan', 'jenis_kelamin', 'id_jabatan', 'tanggal_lahir', 'email', 'telepon', 'alamat', 'pangkat', 'golongan'];

    // Fungsi menampilkan data struktur organisasi
    public function strukturOrganisasi()
    {
        $builder = $this->db->table('karyawan_dinas');
        $builder->join('jabatan', 'jabatan.id_jabatan = karyawan_dinas.id_jabatan');
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // End fungsi menampilkan data struktur organisasi

    public function karyawanDinasIndikatorKerja()
    {
        $builder = $this->db->table('karyawan_dinas');
        $builder->select('nama_karyawan,indikator_kerja.deskripsi_indikator,jabatan.nama_jabatan')
            ->join('jabatan', 'jabatan.id_jabatan = karyawan_dinas.id_jabatan')
            ->join('indikator_kerja', 'indikator_kerja.id_jabatan = karyawan_dinas.id_jabatan');
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
