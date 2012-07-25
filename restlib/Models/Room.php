<?php
namespace BAServer\Models;

use BAServer\Models\Base;

class Room extends \BAServer\Models\Base
{

    public function getRooms() {
        $dbConn = $this->_databaseConnection;
        $statement = $dbConn->prepare("SELECT * FROM room ORDER BY name");

        $result = $statement->execute();
        $resultData = $result->fetchArray();

        if (!is_array($resultData) || count($resultData) === 0) {
            return false;
        }

        return $resultData;
    }

}