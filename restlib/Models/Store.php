<?php
namespace BAServer\Models;

use BAServer\Models\Base;

class Store extends \BAServer\Models\Base
{

    public function getItems($categoryId) {
        $dbConn = $this->_databaseConnection;
        $statement = $dbConn->prepare("SELECT * FROM store WHERE categoryid=:categoryid");
        $statement->bindValue(':categoryid', $categoryId, SQLITE3_INTEGER);

        $result = $statement->execute();
        $resultData = $result->fetchArray();

        if (!is_array($resultData) || count($resultData) === 0) {
            return false;
        }

        return $resultData;
    }
}