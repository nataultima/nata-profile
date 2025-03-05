<?php

namespace App\Models;

use CodeIgniter\Model;

class PortoModel extends Model
{
    protected $table = 'portfolios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'category', 'image', 'deskripsi', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    // Anda dapat menambahkan fungsi khusus di sini, jika diperlukan
}
