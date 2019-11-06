<?php

/**
 * Request interface.
 */

namespace paravibe\WhoisXmlApi\DnsLookup;

interface RequestInterface
{
    const BASE_URL = 'https://www.whoisxmlapi.com/whoisserver/DNSService';

    public function request(String $path);
}
