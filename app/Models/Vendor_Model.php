<?php

namespace App\Models;

use CodeIgniter\Model;

class Vendor_Model extends Model
{
    protected $table      = 'vendors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'business_name', 'email', 'phone', 'address', 'password'];

    public function get_list_vendor()
    {
        return $this->findAll();
    }
}
