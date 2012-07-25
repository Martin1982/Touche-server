<?php
namespace BAServer\Models;

class Base
{
    protected $_databaseConnection;
    protected $_databaseLocation;

    public function __construct()
    {
        $this->_databaseLocation = __DIR__ . '/../../resources/db/badb.sqlite3';
        $this->_databaseConnection = new \SQLite3($this->_databaseLocation);
    }

    public function __destruct()
    {
        $this->_databaseConnection->close();
    }
}
