<?php

namespace App\Controllers;
use App\Models\UserAdminModel;
// use App\Models\Supervisor_model;
use App\Models\Supervisor_Model;
use App\Models\Manager_model;
use App\Models\Vendor_model;
use App\Models\Order_Model;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Vendor extends BaseController
{
    public function vendor() {
        $Order_Model = new Order_Model();
        $data['list_order'] = $Order_Model->get_list_order();
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('vendor/vendor_dashboard', $data);
    }
    public function list_order() {
        $Order_Model = new Order_Model();
        $data['list_order'] = $Order_Model->get_list_order();
        // print_r($data['list_order']); die();
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('vendor/list_order', $data);
    }
    public function add_order(){
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('vendor/add_order');
    }
    public function save_order()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
        $venue = $this->request->getPost('venue');
        $staffTime = $this->request->getPost('staff_time');
        $shift = $this->request->getPost('shift');
        $staff = json_decode($this->request->getPost('staffData'), true);
    
        // print_r($startDate); die();

        // Calculate total staff count
        $totalCount = array_reduce($staff, function ($sum, $staffEntry) {
            return $sum + $staffEntry['count'];
        }, 0);
        
        $orderData = [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'venue' => $venue,
            'staff_time' => $staffTime,
            'shift' => $shift,
            'staff' => json_encode($staff),
            'count' => $totalCount,
        ];
    
        $Order_Model = new Order_Model();
        $inserted = $Order_Model->insert($orderData);
    
        if ($inserted) {
            session()->setFlashdata('success', 'Order added successfully.');
            return redirect()->to('list_order');
        } else {
            session()->setFlashdata('error', 'Failed to add order.');
            return redirect()->to('add_order');
        }
    }
    
    public function edit_order($id) {
        $Order_Model = new Order_Model();
        
        $data['order'] = $Order_Model->find($id);
        // print_r($data['order']); die();
        if (!$data['order']) {
            return redirect()->to('/list_order')->with('error', 'order not found');
        }
        $data['order']['staff_data'] = json_decode($data['order']['staff'], true);
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('vendor/edit_order', $data);
    }
    public function update_order($id)
{
    $startDate = $this->request->getPost('start_date');
    $endDate = $this->request->getPost('end_date');
    $venue = $this->request->getPost('venue');
    $staffTime = $this->request->getPost('staff_time');
    $shift = $this->request->getPost('shift');
    $staffData = $this->request->getPost('staffData');

    $staff = json_decode($staffData, true);
    if (!$staff || !is_array($staff)) {
        session()->setFlashdata('error', 'Invalid staff data.');
        return redirect()->to('edit_order/' . $id);
    }

    $totalCount = array_reduce($staff, function ($sum, $staffEntry) {
        return $sum + $staffEntry['count'];
    }, 0);

    $orderData = [
        'start_date' => $startDate,
        'end_date' => $endDate,
        'venue' => $venue,
        'staff_time' => $staffTime,
        'shift' => $shift,
        'staff' => json_encode($staff),
        'count' => $totalCount,
    ];
    // print_r($orderData); die();
    $Order_Model = new Order_Model();

    if ($Order_Model->update($id, $orderData)) {
        session()->setFlashdata('success', 'Order updated successfully.');
        return redirect()->to('list_order');
    } else {
        session()->setFlashdata('error', 'Failed to update order.');
        return redirect()->to('edit_order/' . $id);
    }
}


    public function delete_order($id) {
        $Order_Model = new Order_Model();
    
        $order = $Order_Model->find($id);
        
        if (!$order) {
            return redirect()->to(base_url('list_order'))->with('error', 'order not found.');
        }
    
        $Order_Model->delete($id);
    
        return redirect()->to(base_url('list_order'))->with('success', 'order deleted successfully.');
    }  
    public function order_report() {
        $Order_Model = new Order_Model();
        $data['list_order'] = $Order_Model->get_list_order();
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('vendor/order_report', $data);
    }
    public function generateReport()
{
    // $orders = [];
    $startDate = $this->request->getPost('start_date');
    $endDate = $this->request->getPost('end_date');

    if ($startDate && $endDate) {
        $Order_Model = new Order_Model();

        $orders = $Order_Model->where('start_date >=', $startDate)
                             ->where('end_date <=', $endDate)
                             ->findAll();
                            //  print_r($orders); die();
        if (empty($orders)) {
            session()->setFlashdata('error', 'No data found for the selected date range.');
        }
    }

    echo view('header');
    echo view('footer');
    echo view('sidebar');
    return view('vendor/order_report', [
        'orders' => $orders,
        'start_date' => $startDate,
        'end_date' => $endDate,
    ]);
}
public function downloadReport($startDate, $endDate)
{
    $Order_Model = new Order_Model();

    $orders = $Order_Model->where('start_date >=', $startDate)
                         ->where('end_date <=', $endDate)
                         ->findAll();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Order ID')
          ->setCellValue('B1', 'Start Date')
          ->setCellValue('C1', 'End Date')
          ->setCellValue('D1', 'Venue')
          ->setCellValue('E1', 'Time')
          ->setCellValue('F1', 'Shift');
          
    $row = 2;
    foreach ($orders as $order) {
        $sheet->setCellValue('A' . $row, $order['id'])
              ->setCellValue('B' . $row, $order['start_date'])
              ->setCellValue('C' . $row, $order['end_date'])
              ->setCellValue('D' . $row, $order['venue'])
              ->setCellValue('E' . $row, $order['staff_time'])
              ->setCellValue('F' . $row, $order['shift']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename = 'report_' . date('YmdHis') . '.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
}

}
?>