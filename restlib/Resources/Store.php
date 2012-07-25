<?php

namespace BAServer\Resources;

use Tonic\Resource,
    Tonic\Response,
    Tonic\ConditionException;


/**
 * Store resource
 *
 * The @uri annotation routes requests that match that URL to this resource. Multiple
 * annotations allow this resource to match multiple URLs.
 *
 * @uri /store
 * @uri /store/:categoryId
 */
class Store extends Resource
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
     * @param  str $categoryId
     * @return str
     */
    public function getItems($categoryId = 1)
    {
        $storeModel = new \BAServer\Models\Store();
        $storeItems = $storeModel->getItems($categoryId);

        var_dump($storeItems);

        return 'Items for category ' . $categoryId;
    }
}