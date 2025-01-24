<?php

namespace App\Models;

use CodeIgniter\Model;

class Supervisor_Model extends Model
{
    protected $table      = 'supervisors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'password'];

    public function get_list_supervisor()
    {
        return $this->findAll();
    }
}
