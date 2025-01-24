<?php

namespace App\Models;

use CodeIgniter\Model;

class Order_Model extends Model
{
    protected $table = 'orders'; // Replace 'orders' with your table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['start_date', 'end_date', 'venue', 'staff_time', 'shift', 'staff', 'count', 'status'];

    public function get_list_order()
    {
        return $this->findAll();
    }
}

