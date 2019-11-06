<?php

/**
 * Client class.
 */

namespace paravibe\WhoisXmlApi\DnsLookup;

class Client implements ClientInterface
{
    protected $token;

    public function setToken(String $token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }
}
