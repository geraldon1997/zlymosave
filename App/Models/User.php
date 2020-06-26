<?php
namespace App\Models;

use App\Core\Gateway;

class User extends Gateway
{

    public function createUsersTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
                    `id` INT PRIMARY KEY AUTO_INCREMENT,
                    `fullname` VARCHAR(100) NULL,
                    `username` VARCHAR(20) NOT NULL UNIQUE,
                    `email` VARCHAR(40) NOT NULL UNIQUE,
                    `phone` VARCHAR(15) NOT NULL,
                    `dob` DATE NULL,
                    `zip_code` INT NULL,
                    `city` VARCHAR(20) NULL,
                    `country` VARCHAR(40) NULL,
                    `password` VARCHAR(100) NOT NULL,
                    `status` BOOLEAN NOT NULL,
                    `ref_id` INT NULL,
                    `isDeleted` BOOLEAN NOT NULL
                )";

        $this->execute($sql);
    }

    public function register($data, $ref)
    {
        $register = implode("','", $data);
        $register = "'".$register."'";

        $sql = "INSERT INTO users (username,email,phone,password,status,isDeleted) VALUES ($register, false, false)";
        $result = $this->execute($sql);

        $lastid = $this->getLastId();

        if ($result) {
            $sql1 = "INSERT INTO `referals` (`user_id`,`ref_id`) VALUES ('$ref','$lastid')";
            $this->execute($sql1);
        }

        return $result;
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND `password` = '$password' LIMIT 1";
        $result = $this->fetch($sql);
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function confirmUserEmail($username)
    {
        $sql = "UPDATE users SET `status` = true WHERE `username` = '$username' ";
        $result = $this->execute($sql);
    }

    public function deactivateUser($username)
    {
        $sql = "UPDATE users SET `status` = false WHERE `username` = '$username' ";
        $result = $this->execute($sql);
    }

    public function updateProfile($fullname, $email, $phone, $dob, $zip, $city, $country)
    {
        $username = $_SESSION['username'];
        $sql = "UPDATE `users` SET 
                `fullname` = '$fullname', 
                `email` = '$email', 
                `phone` = '$phone', 
                `dob` = '$dob', 
                `zip_code` = '$zip', 
                `city` = '$city', 
                `country` = '$country' 
                WHERE `username` = '$username' ";

        $this->execute($sql);
    }

    public function logout()
    {
            session_destroy();
            header('location: ../index.html');
    }

    public function getUserId()
    {
        $username = $_SESSION['username'];
        $sql = "SELECT id FROM `users` WHERE `username`='$username' ";
        $result = $this->fetch($sql);
        foreach ($result as $key => $value) {
            return $value['id'];
        }
    }

    public function getUserDetails()
    {
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
        $result = $this->fetch($sql);
        return $result;
    }

    public function changePassword($oldpassword, $newpassword)
    {
        $username = $_SESSION['username'];
        foreach ($this->getUserDetails() as $key => $value) {
            $old = $value['password'];
            if ($old === $oldpassword) {
                $sql = "UPDATE `users` SET `password` = '$newpassword' WHERE `username` = '$username' ";
                $result = $this->execute($sql);
            }
        }
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM `users` ORDER BY `id` DESC ";
        $result = $this->fetch($sql);
        return $result;
    }

    public function getTotalNumberOfUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->fetch($sql);
        echo count($result);
    }

    public function forgotPassword($username)
    {
        $sql = "SELECT * FROM `users` WHERE `username` = '$username' LIMIT 1";
        $result = $this->fetch($sql);
        return $result;
    }

    public function resetPassword($username, $password)
    {
        $sql = "UPDATE `users` SET `password` = '$password' WHERE `username` = '$username' ";
        $result = $this->execute($sql) ;
        return $result;
    }

    public function getLastId()
    {
        $sql = "SELECT * FROM `users` ORDER BY `id` DESC LIMIT 1";
        $result = $this->fetch($sql);

        foreach ($result as $key => $value) {
            return $value['id'];
        }
    }
}
