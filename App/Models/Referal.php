<?php
namespace App\Models;

use App\Core\Gateway;

class Referal extends Gateway
{
    public function createReferalTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `referals` (
            `id` INT PRIMARY KEY AUTO_INCREMENT,
            `user_id` INT NOT NULL,
            `ref_id` INT NOT NULL,
            `ref_amount` INT NULL
        )";
        $this->execute($sql);
    }

    public function getReferedUsers($id)
    {
        $sql = "SELECT * FROM `referals` WHERE `user_id` = '$id' ";
        $result = $this->fetch($sql);
        
        foreach ($result as $key => $value) {
            echo "<tr>";
            $ref = $value['ref_id'];
            $ref_bonus = $value['ref_amount'];

            $sql = "SELECT * FROM `users` WHERE `id` = '$ref' ";
            $result = $this->fetch($sql);
            
            foreach ($result as $key => $value) {
                $email = $value['email'];
                echo "<td>$email</td>";
            }
            echo "<td>$".number_format($ref_bonus)."</td>";
            echo "</tr>";
        }
    }

    public function getTotalReferalEarnings($userid)
    {
        $sql = "SELECT SUM(ref_amount) as `total` FROM `referals` WHERE `user_id` = '$userid' ";
        $result = $this->fetch($sql);

        foreach ($result as $key => $value) {
            echo number_format($value['total']);
        }
    }
}
