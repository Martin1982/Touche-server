<?php

namespace BAServer\Resources;

use Tonic\Resource,
    Tonic\Response,
    Tonic\ConditionException;

/**
 * Token Authorization resource
 *
 * The @uri annotation routes requests that match that URL to this resource. Multiple
 * annotations allow this resource to match multiple URLs.
 *
 * @uri /token_auth/:token
 */
class AuthToken extends Resource
{
    /**
     * Authorize using a token
     *
     * @method GET
     * @param str $token
     * @return str
     */
    public function doTokenAuth($token)
    {
        return 'Authenticating token ' . $token;
    }
}