<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'icon', 'link', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
