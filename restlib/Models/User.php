<?php
namespace BAServer\Models;

use BAServer\Models\Base;

class User extends \BAServer\Models\Base
{
    const PRE_SALT = 'u3SeRT0ken';
    const POST_SALT = 'G4!n4<<3S';

    public function getUser($username, $password) {
        $dbConn = $this->_databaseConnection;
        $statement = $dbConn->prepare("SELECT userid FROM user WHERE username=:username AND password=:password");
        $statement->bindValue(':username', $username, SQLITE3_TEXT);
        $statement->bindValue(':password', md5($password), SQLITE3_TEXT);

        $result = $statement->execute();
        $resultData = $result->fetchArray();

        if (!is_array($resultData) || count($resultData) === 0) {
            return false;
        }

        $resultData['token'] = $this->_assignToken($resultData['userid']);

        return $resultData;
    }

    public function getUserByToken($token) {
        $dbConn = $this->_databaseConnection;
        $statement = $dbConn->prepare("SELECT userid FROM user WHERE token=:token");
        $statement->bindValue(':token', $token, SQLITE3_TEXT);

        $result = $statement->execute();
        $resultData = $result->fetchArray();

        if (!is_array($resultData) || count($resultData) === 0) {
            return false;
        }

        return $resultData;
    }

    public function addUser($username, $password) {
        $dbConn = $this->_databaseConnection;
        $statement = $dbConn->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
        $statement->bindValue(':username', $username, SQLITE3_TEXT);
        $statement->bindValue(':password', md5($password), SQLITE3_TEXT);

        $statement->execute();

        return $this->getUser($username, $password);
    }

    protected function _assignToken($userId) {
        $dbConn = $this->_databaseConnection;
        $statement = $dbConn->prepare("UPDATE user SET token = :newtoken WHERE userid = :userid");
        $newToken = md5(self::PRE_SALT . rand(0,date('YmdHis')) . $userId . self::POST_SALT);

        $statement->bindValue(':newtoken', $newToken, SQLITE3_TEXT);
        $statement->bindValue(':userid', $userId, SQLITE3_INTEGER);

        $statement->execute();

        return $newToken;
    }

}