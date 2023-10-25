<?php

namespace App\Models;

use CodeIgniter\Model;

class MIndikatorKerja extends Model
{
    protected $table = 'indikator_kerja';

    protected $primaryKey = 'id_indikator';
    protected $allowedFields = ['id_indikator', 'deskripsi_indikator', 'id_jabatan'];

    public function indikatorKerjaJabatan($idJabatan)
    {
        $builder = $this->db->table('indikator_kerja');
        $builder->select('deskripsi_indikator');
        $builder->where('id_jabatan', $idJabatan);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    // Fungsi join indikator kerja dengan jabatan
    public function indikatorJabatan($idJabatan)
    {
        $builder = $this->db->table('jabatan');
        $builder->select();
        $builder->join('indikator_kerja', 'indikator_kerja.id_jabatan = jabatan.id_jabatan');
        $builder->where('jabatan.id_jabatan', $idJabatan);
        return  $builder->get()->getResultArray();
    }
    // End fungsi join indikator kerja dengan jabatan

    // Fungsi delete indikator sesuai id jabatan
    public function hapusIndikator($idJabatan)
    {
        $builder = $this->db->table('indikator_kerja');
        $builder->where('id_jabatan', $idJabatan);
        $builder->delete();
    }
    // End fungsi delete indikator sesuai id jabatan




}
