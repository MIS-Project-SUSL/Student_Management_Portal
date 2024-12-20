<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Reports extends Controller
{
    public function index()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $userModel = new UserModel();
        
        // Get department data
        $departments = $userModel->getDepartmentPercentages();
        
        // Prepare data for view
        $data = [
            'departments' => $departments
        ];
        
        // Load the view with department data
        return view('dashboard/reports/reports', $data);
        
    }

    public function logout(){
        session()->remove('logged_admin');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
