### WhoisXMLAPI DNS Lookup API PHP wrapper

Provides simple wrapper for [WhoisXMLAPI](https://dns-lookup-api.whoisxmlapi.com/docs) API.

[![Total Downloads](https://img.shields.io/packagist/dt/paravibe/dnslookup.svg?style=flat-square)](https://packagist.org/packages/paravibe/dnslookup)

### Examples

Resolve a DNS record.
```php
$client = new Client();
$client->setToken($token);

$request = new Request($client);
$request->setQuery(['type' => 'A']);

$response = $request->request($domain);
$data = json_decode($response->getBody(), TRUE);
```

Please note. This wrapper doesn't provide any custom exception handlers. 
