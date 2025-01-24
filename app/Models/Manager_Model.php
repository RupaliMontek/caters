<?php

namespace App\Models;

use CodeIgniter\Model;

class Manager_Model extends Model
{
    protected $table      = 'managers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'password'];

    public function get_list_manager()
    {
        return $this->findAll();
    }
}
