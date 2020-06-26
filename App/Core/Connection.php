<?php
namespace App\Core;

use mysqli;

class Connection
{
    private $host;
    private $user;
    private $pass;
    private $db;
    public $link;

    public function __construct()
    {
        $this->host = '127.0.0.1';

        $this->user = 'newuser';
        $this->pass = 'password';
        $this->db = 'zlymo';



        $this->connect();
    }

    public function connect()
    {
        $mysqli = new mysqli('localhost', 'zlymstwt_zly', 'zlymosave.com', 'zlymstwt_zlymo');
      

        if ($mysqli->connect_error) {
            echo "error in connection, please contact webmaster ". $mysqli->connect_errno;
        }
         return $mysqli;
    }
}
