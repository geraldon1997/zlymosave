<?php
namespace App\Models;

use App\Core\Gateway;

class Investment extends Gateway
{
    public function createInvestmentTable()
    {
        $sql = "CREATE TABLE `investments` (
            `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            `username` varchar(255) NOT NULL,
            `plan` varchar(255) NOT NULL,
            `amount` varchar(255) NOT NULL,
            `profit` varchar(255) NOT NULL,
            `invest_date` varchar(255) NOT NULL,
            `mature` varchar(255) NOT NULL,
            `invest_id` varchar(255) NOT NULL,
            `invest_status` BOOLEAN NOT NULL,
            `withdraw_status` BOOLEAN NOT NULL,
            `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
          )";
        $this->execute($sql);
    }

    public function addInvestment($plan, $amount, $profit, $invest_date, $mature, $investid)
    {
        $username = $_SESSION['username'];
        $sql = "INSERT INTO investments (
            `username`,`plan`,`amount`,`profit`,`invest_date`,`mature`,`invest_id`,`invest_status`, `withdraw_status`
            ) VALUES (
                '$username','$plan','$amount','$profit','$invest_date','$mature','$investid',false, false
            )";
        $this->execute($sql);
    }

    public function getCurrentInvestment()
    {
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM `investments` WHERE `username` = '$username' ORDER BY `id` DESC LIMIT 1";
        $result = $this->fetch($sql);
        return $result;
    }

    public function getTotalInvestment()
    {
        $username = $_SESSION['username'];
        $sql = "SELECT SUM(amount) as total FROM `investments` WHERE `username` = '$username' ";
        $result = $this->fetch($sql);
        
        foreach ($result as $key => $value) {
            echo number_format($value['total']);
        }
    }

    public function getInvestments()
    {
        $username =$_SESSION['username'];
        $sql = "SELECT * FROM `investments` WHERE `username` = '$username' ORDER BY `id` DESC ";
        $result = $this->fetch($sql);
        return $result;
    }

    public function getAllInvestments()
    {
        $sql = "SELECT * FROM `investments` ORDER BY `id` DESC";
        $result = $this->fetch($sql);
        
        foreach ($result as $key => $value) {
            $mature = date('Y-m-d h:i:s', $value['mature']);
            $investid = $value['invest_id'];
            $user = $value['username'];
            $plan = $value['plan'];

            echo "<tr>";
            echo "<td>".$investid."</td>";
            echo "<td>".$user."</td>";
            echo "<td>".$plan."</td>";
            echo "<td>$".number_format($value['amount'])."</td>";
            echo "<td>".$value['created_on']."</td>";
            echo "<td>$".number_format($value['profit'])."</td>";
            echo "<td>".$mature."</td>";
            echo "<td>".$value['invest_status']."</td>";
            echo "<td>".$value['withdraw_status']."</td>";
            echo "<td>
                    <a href='editinvestment.php?civ=$investid'>edit</a>
                    <hr>
                    <a href='?civ=$investid&user=$user&plan=$plan'>confirm</a>
                </td>";
            echo "</tr>";
        }
    }

    public function getTotalNumberOfInvestments()
    {
        $sql = "SELECT * FROM investments";
        $result = $this->fetch($sql);
        echo count($result);
    }

    public function confirmInvestment($investid, $plan)
    {
        switch ($plan) {
            case $plan === 'starter':
                $mature = time() + (60 * 60 * 24);
                break;
            
            case $plan === 'advance':
                $mature = time() + (60 * 60 * 24);
                break;

            case $plan === 'enterprise':
                $mature = time() + (60 * 60 * 24);
                break;
        }

        $invest_date = time();

        $sql = "UPDATE `investments` SET `invest_status` = true, `invest_date` = '$invest_date', `mature` = '$mature'  WHERE `invest_id` = '$investid'";
        $this->execute($sql);

        $sql1 = "SELECT * FROM `investments` WHERE `invest_id` = '$investid' ";
        $result = $this->fetch($sql1);
        foreach ($result as $key => $value) {
            $user = $value['username'];
            $refbonus = 0.1 * $value['amount'];
            $sql2 = "SELECT * FROM `users` WHERE `username` = '$user' ";
            $result1 = $this->fetch($sql2);
            foreach ($result1 as $key => $value) {
                $uid = $value['id'];
                $sql3 = "UPDATE `referals` SET `ref_amount` = '$refbonus' WHERE `ref_id` = '$uid' ";
                $this->execute($sql3);
            }
        }
    }

    public function getUserInvestment($ref)
    {
        $sql = "SELECT * FROM `investments` WHERE `invest_id` = '$ref' ";
        $result = $this->fetch($sql);
        return $result;
    }

    public function updateInvestment($iv, $civ)
    {
        switch ($iv['plan']) {
            case $iv['plan'] === 'silver':
                $pr = (0.1 * $iv['amount']) + $iv['amount'];
                break;
            
            case $iv['plan'] === 'bronze':
                $pr = (0.15 * $iv['amount']) + $iv['amount'];
                break;

            case $iv['plan'] === 'gold':
                $pr = (0.25 * $iv['amount']) + $iv['amount'];
                break;
        }

        $u = $iv['username'];
        $p = $iv['plan'];
        $a = $iv['amount'];
        $s = $iv['ivstatus'];

        $sql = "UPDATE `investments`
            SET `username` = '$u', 
                `plan` = '$p', 
                `amount` = '$a', 
                `profit` = '$pr', 
                `invest_status` = '$s' WHERE `invest_id` = '$civ' ";
        $this->execute($sql);
        header('location: http://zlymosave.com/admin/investment.php');
    }
}
