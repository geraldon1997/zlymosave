<?php
namespace App\Controllers;

use App\Models\Investment as IV;

class Investment extends IV
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->activity = new Activity;
        $this->date  = Date('d-m-Y');
        $this->time = Date('h:i:s');
        $this->usernameLog = $_SESSION['username'];
    }

    public function cleanInput()
    {
        foreach ($this->data as $key => $value) {
            $data = trim(htmlspecialchars(stripslashes(strip_tags($this->data[$key]))));
            $this->data[$key] = $data;
        }
    }

    public function invest()
    {
        switch ($this->data['plan']) {
            case $this->data['plan'] === 'silver':
                $profit = (0.1 * $this->data['amount']) + $this->data['amount'];
                $mature = time() + (60 * 60 * 24);
                break;
            
            case $this->data['plan'] === 'bronze':
                $profit = (0.15 * $this->data['amount']) + $this->data['amount'];
                $mature = time() + (60 * 60 * 24);
                break;

            case $this->data['plan'] === 'gold':
                $profit = (0.25 * $this->data['amount']) + $this->data['amount'];
                $mature = time() + (60 * 60 * 24);
                break;
        }
        $investid = uniqid();
        $invest_date = time();

        $this->cleanInput();
        $this->createInvestmentTable();
        $this->addInvestment($this->data['plan'], $this->data['amount'], $profit, $invest_date, $mature, $investid);
        $this->activity->addNewActivity($this->usernameLog, "pledged the sum of $".number_format($this->data['amount'])." under ".$this->data['plan']." plan on the platform on $this->date at $this->time");
    }

    public function requesPaymentDetails($method, $amount)
    {
        foreach ($this->data as $key => $value) {
            $fullname = $value['fullname'];
            $username = $value['username'];
            $email = $value['email'];
            
            $to = 'support@zlymosave.com';
            $subject = 'REQUEST FOR PAYMENT DETAILS';
            $message = "$this->usernameLog requested payment details for $method of $amount dollars";
            $headers = "From : $username <$email>";

            mail($to, $subject, $message, $headers);
            $this->activity->addNewActivity($this->usernameLog, "requested payment details for $method on $this->date at $this->time");
        }
    }

    public function updateUserInvestment($civ)
    {
        if ($this->data['ivstatus'] === 'active') {
            $this->data['ivstatus'] = 1;
        } elseif ($this->data['ivstatus'] !== 'active') {
            $this->data['ivstatus'] = 0;
        }
        $this->updateInvestment($this->data, $civ);
    }
}
