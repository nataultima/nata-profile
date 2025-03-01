<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactsModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['address', 'phone', 'email', 'google_map', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
