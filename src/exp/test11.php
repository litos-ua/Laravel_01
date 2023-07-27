<?php

namespace Litos\exp;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;

//require_once 'vendor/autoload.php';
require_once __DIR__.'/../../vendor/autoload.php';

/**
 * Проверяем работу in_array
 */
$mass=['df', '0', 11,222,'8y9','121'];
$t=in_array (121,$mass ,true);
if ($t){
    echo 'in_array = true' . PHP_EOL;
}
else{
    echo 'in_array = false' . PHP_EOL;
}

/**
 * Увеличение элементов массива на 1
 */

function inc($n)
{
    return (++$n);
}

$a = [1, 2, 3, 4, 5];
$b = array_map('Litos\exp\inc', $a);
print_r($b);


//--------------Guzzle-------------------------------
//$client = new \GuzzleHttp\Client();
//$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
//
//echo $response->getStatusCode() . PHP_EOL; // 200
//echo $response->getHeaderLine('content-type') . PHP_EOL; // 'application/json; charset=utf8'
//echo $response->getBody() . PHP_EOL; // '{"id": 1420053, "name": "guzzle", ...}'
//
//// Send an asynchronous request.
//$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
//$promise = $client->sendAsync($request)->then(function ($response) {
//    echo 'I completed! ' . $response->getBody();
//});
//
//$promise->wait();


//$value = config('app.timezone');
//$environment = App::environment();
$environment = env('APP_ENV');
if ($environment === 'prod') {
    echo 'Production mode';
} elseif ($environment === 'dev') {
    echo 'Development mode';
} else {
    echo $environment . 'Other mode';
}
$environment->loadEnvironmentFrom('.env');
echo PHP_EOL;
