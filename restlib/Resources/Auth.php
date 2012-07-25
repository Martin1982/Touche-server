<?php

namespace BAServer\Resources;

use Tonic\Resource,
    Tonic\Response,
    Tonic\ConditionException;

/**
 * Authorization resource
 *
 * The @uri annotation routes requests that match that URL to this resource. Multiple
 * annotations allow this resource to match multiple URLs.
 *
 * @uri /auth/:username/:password
 */
class Auth extends Resource
{

    /**
     * Use this method to handle GET HTTP requests.
     *
     * The optional :name parameter in the URL available as the first parameter to the method
     * or as a property of the resource as $this->name.
     *
     * Method can return a string response, an HTTP status code, an array of status code and
     * response body, or a full Tonic\Response object.
     *
     * @method GET
     * @param  str $username
     * @param  str $password
     * @return str
     */
    public function doAuth($username, $password)
    {
        $userModel = new \BAServer\Models\User();
        $userData = $userModel->getUser($username, $password);

        var_dump($userData);

        return 'Hello ' . $username . ' with pass ' . $password;
    }

    /**
     * Register a new user
     *
     * @method PUT
     * @param str $username
     * @param str $password
     */
    public function doRegister($username, $password)
    {
        $userModel = new \BAServer\Models\User();
        $userData = $userModel->addUser($username, $password);

        var_dump($userData);

        return 'Registering user with username ' . $username . ' and password ' . $password;
    }
}