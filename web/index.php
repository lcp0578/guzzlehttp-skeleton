<?php
require '../vendor/autoload.php';
$client = new GuzzleHttp\Client();
$filename = 'QQ图片20170505142827.jpg';
$res = $client->request('POST', 'http://220.181.109.203/upload/post', [
     'header' => [
        'Content-Type' => 'application/octet-stream'
     ],
     'multipart' => [
                [
                    'name' => 'file_name',
                    'contents' => fopen( $filename, 'r' ),
                ],
            ]
]);
echo $res->getStatusCode();
// "200"
var_dump($res->getHeader('content-type'));
// 'application/json; charset=utf8'
echo $res->getBody();
// {"type":"User"...'

// Send an asynchronous request.
// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
// $promise = $client->sendAsync($request)->then(function ($response) {
//     echo 'I completed! ' . $response->getBody();
// });
// $promise->wait();