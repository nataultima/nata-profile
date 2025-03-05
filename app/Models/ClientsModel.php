<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientsModel extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['image', 'created_at', 'deskripsi', 'updated_at'];
    protected $useTimestamps = true;
}
