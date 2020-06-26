<?php
namespace App\Models;

use App\Core\Gateway;

class Admin extends Gateway
{
    public function adminLogin($username, $password)
    {
        $sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
        $result = $this->fetch($sql);

        if (!empty($result) && $result != '') {
            return $result;
        } else {
            return false;
        }
    }

    public function logout()
    {
            session_destroy();
            header('location: ../index.html');
    }
}
