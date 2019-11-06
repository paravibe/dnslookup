<?php

/**
 * Request class.
 */

namespace paravibe\WhoisXmlApi\DnsLookup;

use GuzzleHttp\Client;

class Request implements RequestInterface
{
    private $client;
    protected $requestBody;
    protected $timeout;
    protected $sink;
    protected $query;
    protected $method = 'get';

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Creates request.
     */
    public function request(String $domain)
    {
        $query = $this->query;

        $query['outputFormat'] = 'JSON';
        $query['domainName'] = $domain;
        $query['apiKey'] = $this->client->getToken();

        $client = $this->createHttpClient();
        $result = $client->request(
            $this->method,
            '',
            [
                'body' => $this->requestBody,
                'timeout' => $this->timeout,
                'sink' => $this->sink,
                'query' => $query,
            ]
        );

        return $result;
    }

    /**
     * Sets query parameters for the request.
     */
    public function setQuery(Array $query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Sets the timeout limit for the request.
     */
    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Sets sink for the request.
     */
    public function setSink(String $path)
    {
        $this->sink = $path;

        return $this;
    }

    /**
     * Attach a body to the request.
     */
    public function attachBody($data)
    {
        $this->method = 'post';
        $this->requestBody = $data;

        if (!is_string($data) || !is_a($data, 'GuzzleHttp\\Psr7\\Stream')) {
            $this->requestBody = json_encode($data);
        } else {
            $this->requestBody = $data;
        }

        return $this;
    }

    /**
     * Creates a new http client.
     */
    protected function createHttpClient()
    {
        $client = new Client(['base_uri' => self::BASE_URL]);

        return $client;
    }
}
