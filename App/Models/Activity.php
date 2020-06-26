<?php
namespace App\Models;

use App\Core\Gateway;

class Activity extends Gateway
{
    public function __construct()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `activities` (
            `id` INT PRIMARY KEY AUTO_INCREMENT,
            `username` VARCHAR(40) NOT NULL,
            `activity` TEXT NOT NULL
        ) ";
        $this->execute($sql);
    }
    
    public function addActivity($username, $activity)
    {
        $sql = "INSERT INTO activities (username,activity) VALUES ('$username','$activity') ";
        $this->execute($sql);
    }

    public function getActivities()
    {
        $sql = "SELECT * From activities ORDER BY `id` DESC";
        $result = $this->fetch($sql);
        return $result;
    }

    public function getActivity()
    {
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM activities WHERE username = '$username' ORDER BY `id` DESC";
        $result = $this->fetch($sql);
        return $result;
    }
}
