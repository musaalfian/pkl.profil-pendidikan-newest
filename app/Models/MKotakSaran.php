<?php

namespace App\Models;

use CodeIgniter\Model;

class MKotakSaran extends Model
{
    protected $table = 'kotak_saran';

    protected $primaryKey = 'id_kotak_saran';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_kotak_saran', 'tanggal_input', 'nama_pengirim', 'email', 'pesan'];

    // Fungsi menampilkan kotak saran
    public function kotakSaran()
    {
        $builder = $this->db->table('kotak_saran');
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // End fungsi menampilkan kotak saran
}
