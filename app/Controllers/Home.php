<?php

namespace App\Controllers;
use App\Models\UserAdminModel;
// use App\Models\Supervisor_model;
use App\Models\Supervisor_Model;
use App\Models\Manager_model;
use App\Models\Vendor_model;
use CodeIgniter\Controller;
class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
    public function check_login()
    {
        $session = session();
    
        $username = $this->request->getPost('name');
        $password = $this->request->getPost('password');
    
        $userModel = new UserAdminModel();
    
        $user = $userModel->where('username', $username)->first();
        if ($user) {
            if ($user['status'] !== '1') {
                $session->setFlashdata('error', 'Your account is not active.');
                return redirect()->back();
            }
    
            if (md5($password) === $user['md5_pass']) {
            $session->set([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'role'      => $user['role'],
            ]);

            switch ($user['role']) {
                case 'Supervisor':
                    return redirect()->to(base_url('supervisor_dashboard'));
                case 'Manager':
                    return redirect()->to(base_url('manager_dashboard'));
                case 'Superadmin':
                    return redirect()->to(base_url('superadmin_dashboard'));
                case 'Vendor':
                    return redirect()->to(base_url('vendor_dashboard'));
                    case 'Client':
                    return redirect()->to(base_url('client_dashboard'));
                default:
                    $session->setFlashdata('error', 'Invalid user role.');
                    return redirect()->back();
            }

            } else {
                $session->setFlashdata('error', 'Invalid password.');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'Username not found.');
            return redirect()->back();
        }
    }
    public function superadmin() {
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        echo view('superadmin/superadmin_dashboard');
    }

    public function supervisor() {
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('supervisor/supervisor_dashboard');
    }
    public function list_supervisor()
    {        
        $UserAdminModel = new UserAdminModel();
        $data['list_supervisor'] = $UserAdminModel->get_list_supervisor();
        
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('supervisor/list_supervisor', $data);
    }
    public function add_supervisor() {
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('supervisor/add_supervisor');
    }
    public function save_supervisor()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $password = $this->request->getPost('password');

        $data = [
            'name'  => $name,
            'email' => $email,
            'phone' => $phone,
            'username' => $email,
            'password' => $password,
            'md5_pass' => md5($password),
            'address' => $address,
            'role' => 'Supervisor',
            'status' => '1',
        ];
        $UserAdminModel = new \App\Models\UserAdminModel();
        $inserted = $UserAdminModel->insert($data);
        
        if ($inserted) {
            session()->setFlashdata('success', 'Supervisor added successfully.');
            return redirect()->to('list_supervisor');
        } else {
            session()->setFlashdata('error', 'Failed to add supervisor.');
            return redirect()->to('add_supervisor');
        }
    }
    
    public function edit_supervisor($id) 
    {
        $UserAdminModel = new UserAdminModel();
        
        $data['supervisor'] = $UserAdminModel->find($id);
        
        if (!$data['supervisor']) {
            return redirect()->to('/list_supervisor')->with('error', 'Supervisor not found');
        }
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('supervisor/edit_supervisor', $data);
    }
    public function update_supervisor($id) 
    {
        $UserAdminModel = new UserAdminModel();
        $supervisor = $UserAdminModel->find($id);
        if (!$supervisor) {
            return redirect()->to(base_url('list_supervisor'))->with('error', 'Supervisor not found.');
        }

                $data = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'username' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'address' => $this->request->getPost('address'),
                    'password' => $this->request->getPost('password'),
                    'md5_pass' => $this->request->getPost('password'),
                ];
                // print_r( $data ); die();
                $UserAdminModel->update($id, $data);
                
                return redirect()->to(base_url('list_supervisor'))->with('success', 'Supervisor updated successfully.');
    
        return view('supervisor/edit_supervisor', ['supervisor' => $supervisor]);
    }
    public function delete_supervisor($id) {
        $UserAdminModel = new UserAdminModel();
    
        $supervisor = $UserAdminModel->find($id);
        
        if (!$supervisor) {
            return redirect()->to(base_url('list_supervisor'))->with('error', 'Supervisor not found.');
        }
    
        $UserAdminModel->delete($id);
    
        return redirect()->to(base_url('list_supervisor'))->with('success', 'Supervisor deleted successfully.');
    }  
    
    
    public function manager() {
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('manager/manager_dashboard');
    }

    public function list_manager() {
        $UserAdminModel = new UserAdminModel();
        $data['list_manager'] = $UserAdminModel->get_list_manager();
        // print_r($data['list_manager']); die();
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('manager/list_manager', $data);
    }
    public function add_manager() {
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('manager/add_manager');
    }
    public function save_manager()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $password = $this->request->getPost('password');
        $data = [
            'name'  => $name,
            'email' => $email,
            'username' => $email,
            'phone' => $phone,
            'address' => $address,
            'password' => $password,
            'md5_pass' => md5($password),
            'status' => '1',
            'role' => 'Manager',
        ];
        $UserAdminModel = new UserAdminModel();
        $inserted = $UserAdminModel->insert($data);
        
        if ($inserted) {
            session()->setFlashdata('success', 'manager added successfully.');
            return redirect()->to('list_manager');
        } else {
            session()->setFlashdata('error', 'Failed to add manager.');
            return redirect()->to('add_manager');
        }
    }
public function edit_manager($id)
{
    $UserAdminModel = new UserAdminModel();
    $manager = $UserAdminModel->find($id);

    if (!$manager) {
        return redirect()->to('/list_manager')->with('error', 'Manager not found');
    }

    $data['manager'] = $manager;

    echo view('header');
    echo view('sidebar');
    echo view('manager/edit_manager', $data);
    echo view('footer');
}
    public function update_manager($id) 
    {
        $UserAdminModel = new UserAdminModel();
        $manager = $UserAdminModel->find($id);
        
        if (!$manager) {
            return redirect()->to(base_url('list_manager'))->with('error', 'manager not found.');
        }
                $data = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'username' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'address' => $this->request->getPost('address'),
                    'password' => $this->request->getPost('password'),
                    'md5_pass' => $this->request->getPost('password'),
                ];
                // print_r( $data ); die();
                $UserAdminModel->update($id, $data);
                // print_r($Manager_model); die();
                return redirect()->to(base_url('list_manager'))->with('success', 'manager updated successfully.');
    
        return view('manager/edit_manager', ['manager' => $manager]);
    }
    public function delete_manager($id) {
        $UserAdminModel = new UserAdminModel();
    
        $manager = $UserAdminModel->find($id);
        
        if (!$manager) {
            return redirect()->to(base_url('list_manager'))->with('error', 'manager not found.');
        }
    
        $UserAdminModel->delete($id);
    
        return redirect()->to(base_url('list_manager'))->with('success', 'manager deleted successfully.');
    }  

    // public function vendor() {
    //     echo view('header');
    //     echo view('footer');
    //     echo view('sidebar');
    //     return view('vendor/vendor_dashboard');
    // }

    public function list_vendor() {
        $UserAdminModel = new UserAdminModel();
        $data['list_vendor'] = $UserAdminModel->get_list_vendor();
        // print_r($data['list_vendor']); die();
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('vendor/list_vendor', $data);
    }
    public function add_vendor() {
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('vendor/add_vendor');
    }
    public function save_vendor()
    {
        $name = $this->request->getPost('name');
        $business_name = $this->request->getPost('business_name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $password = $this->request->getPost('password');
        $data = [
            'name'  => $name,
            'business_name' => $business_name,
            'email' => $email,
            'username' => $email,
            'phone' => $phone,
            'address' => $address,
            'password' => $password,
            'md5_pass' => md5($password),
            'status' => '1',
            'role' => 'Vendor',
        ];
        $UserAdminModel = new UserAdminModel();
        $inserted = $UserAdminModel->insert($data);
        
        if ($inserted) {
            session()->setFlashdata('success', 'vendor added successfully.');
            return redirect()->to('list_vendor');
        } else {
            session()->setFlashdata('error', 'Failed to add vendor.');
            return redirect()->to('add_vendor');
        }
    }
    public function edit_vendor($id) {
        $UserAdminModel = new UserAdminModel();
        
        $data['vendor'] = $UserAdminModel->find($id);
        
        if (!$data['vendor']) {
            return redirect()->to('/list_vendor')->with('error', 'vendor not found');
        }
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('vendor/edit_vendor', $data);
    }
    public function update_vendor($id) 
    {
        $UserAdminModel = new UserAdminModel();
        $vendor = $UserAdminModel->find($id);
        
        if (!$vendor) {
            return redirect()->to(base_url('list_vendor'))->with('error', 'vendor not found.');
        }
                $data = [
                    'name' => $this->request->getPost('name'),
                    'business_name' => $this->request->getPost('business_name'),
                    'email' => $this->request->getPost('email'),
                    'username' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'address' => $this->request->getPost('address'),
                    'password' => $this->request->getPost('password'),
                    'md5_pass' => $this->request->getPost('password'),
                ];
                // print_r( $data ); die();
                $UserAdminModel->update($id, $data);
                // print_r($Vendor_model); die();
                return redirect()->to(base_url('list_vendor'))->with('success', 'vendor updated successfully.');
    
        return view('vendor/edit_vendor', ['vendor' => $vendor]);
    }
    public function delete_vendor($id) {
        $UserAdminModel = new UserAdminModel();
    
        $vendor = $UserAdminModel->find($id);
        
        if (!$vendor) {
            return redirect()->to(base_url('list_vendor'))->with('error', 'vendor not found.');
        }
    
        $UserAdminModel->delete($id);
    
        return redirect()->to(base_url('list_vendor'))->with('success', 'vendor deleted successfully.');
    }  
    public function profile() {
        echo view('header');
        echo view('footer');
        echo view('sidebar');
        return view('profile');
    }
    
}
