<?php
namespace App\Controllers;

use App\Models\Admin as AdminModel;
use App\Models\Investment;

class Admin extends AdminModel
{
    public $data;
    public $iv;

    public function __construct($data)
    {
        $this->data = $data;
        $this->iv = new Investment($this->data);
    }

    public function adminLoginController()
    {
        $result = $this->adminLogin($this->data['username'], $this->data['password']);

        if ($result > 0) {
            session_start();
            $_SESSION['username'] = $this->data['username'];
            header('location: admin');
        }
    }

    public function adminLogoutController()
    {
        if (isset($this->data)) {
            $this->logout();
        }
    }

    public function getUserInvestmentDetails()
    {
        return $this->iv->getUserInvestment($this->data);
    }
}
