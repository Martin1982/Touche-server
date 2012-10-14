<?php

namespace Login\Model;

use Zend\Http\Client;

class Login
{
    public $userid;
    public $username;
    public $password;
    public $token;

    protected $_client;

    public function __construct() {
        $this->_client = new Client();
    }


}