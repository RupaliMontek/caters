<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAdminModel extends Model
{
    protected $table = 'user_admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'name', 'email', 'phone', 'md5_pass', 'address', 'role', 'business_name', 'status']; 

    public function get_list_manager()
    {
        return $this->where('role', 'Manager')->findAll();
    }
    public function get_list_supervisor()
{
    return $this->where('role', 'Supervisor')->findAll();
}

    public function get_list_vendor()
    {
        return $this->where('role', 'Vendor')->findAll();
    }
}