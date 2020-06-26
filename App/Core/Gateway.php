<?php
namespace App\Core;

use App\Core\Connection;

class Gateway extends Connection
{
    public function execute($query)
    {
        $result = $this->connect()->query($query);

        if (!$result) {
            return false;
        }

        return $result;
    }
 
    public function fetch($query)
    {
        $result = $this->execute($query);
        $datas = [];
        
        while ($row = $result->fetch_assoc()) {
            $datas[] = $row;
        }
        return $datas;
    }
}
