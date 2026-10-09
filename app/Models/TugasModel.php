<?php

namespace App\Models;
use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $table= 'tugas';
    protected $primaryKey = 'id_tugas';
    protected $allowedFields = [
        'judul',
        'deskripsi',
        'tenggat_waktu',
        'selesai',
        ];
    protected $useTimestamps = true;
}