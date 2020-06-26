<?php
namespace App\Models;

use App\Core\Core;

class Contact extends Core
{
    public $contact;
    public $contactSuccessMessage;
    public $contactErrorMessag;

    public function __construct($data)
    {
        $this->contact = $data;
    }

    public function sendMessage()
    {
        $to = 'contact@londotrade.online';
        $subject = $this->contact['subject'];
        $message = $this->contact['message'];
        $headers = 'From : '.$this->contact['name'].' <'.$this->contact['email'].'>';
        $result = mail($to, $subject, $message, $headers);

        if ($result) {
            $this->contactSuccessMessage = 'message sent';
        } else {
            $this->contactErrorMessage = 'message unable to send';
        }
    }
}
