<?php
namespace BAServer\Models;

use BAServer\Models\Base;

class Game extends \BAServer\Models\Base
{

    public function add($name, $max) {
        $dbConn = $this->_databaseConnection;
        $statement = $dbConn->prepare("INSERT INTO game (name, maxusers, port) VALUES (:name, :max, 743)");
        $statement->bindValue(':name', $name, SQLITE3_TEXT);
        $statement->bindValue(':max', $max, SQLITE3_INTEGER);

        $result = $statement->execute();

        if (!$result) {
            return false;
        }

        return $result;
    }

}