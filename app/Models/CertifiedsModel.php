<?php

namespace App\Models;

use CodeIgniter\Model;

class CertifiedsModel extends Model
{
    protected $table = 'certifieds';
    protected $primaryKey = 'id';
    protected $allowedFields = ['image', 'deskripsi', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
