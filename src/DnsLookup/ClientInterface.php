<?php

/**
 * Client interface.
 */

namespace paravibe\WhoisXmlApi\DnsLookup;

interface ClientInterface
{
    public function setToken(String $token);

    public function getToken();
}
