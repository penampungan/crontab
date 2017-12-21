<?php

namespace console\controllers;

use yii\console\Controller;		
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ClientApiTestController extends Controller
{
	//http://guzzle.readthedocs.io/en/latest/overview.html
    public function actionIndex()
    {
		//=== CODE ===
		//code 201=berhasil
		//code 200=berhasil
		//coce 405=Method Not Allowed
		
		
		//==METHODE GET ==
		// $client = new \GuzzleHttp\Client();
		// $res = $client->get('http://production.kontrolgampang.com/ppob/test-apis');
		// echo $res->getStatusCode();
		// echo $res->getBody();
		
		
		//==METHODE POST BODY ==
		/* $client = new \GuzzleHttp\Client();
		$data = ["NAMA" => "SYAKA"];
		//$res = $client->post('http://production.kontrolgampang.com/ppob/test-apis', ['body' => json_encode($data), 'future' => true]);
		$res = $client->post('http://production.kontrolgampang.com/ppob/test-apis', ['body' => $data, 'future' => true]);
		//$res = $client->post('http://production.kontrolgampang.com/ppob/test-apis', ['body' =>['NAMA' =>'ALAM']]);
		//echo $res->getStatusCode();		
		$res->then(function ($response) {
			echo 'I completed! ' . $response;
		}); */
		
		//==METHODE PUT BODY ==
		/* $client = new \GuzzleHttp\Client();
		$dataHeader = ["ID"=>5];
		$dataBody = ["ID"=>"5","NAMA" => "EKA2"];
		//$res = $client->post('http://production.kontrolgampang.com/ppob/test-apis', ['body' => json_encode($data), 'future' => true]);
		//$res = $client->put('http://production.kontrolgampang.com/ppob/test-apis', ['body' => $dataBody, 'future' => true]);
		//echo $res->getStatusCode();
		$res = $client->put('http://production.kontrolgampang.com/ppob/test-apis', [
			'headers'=>$dataHeader,
			'body' => $dataBody, 
			'future' => true,
			'allow_redirects' => false,
            'timeout' => 15
		]);
		// echo $res->getStatusCode();
		// echo $res->getBody();
		$res->then(function ($response) {
			echo 'I completed! ' . $response;
		});  */
		
		// $client->put('http://httpbin.org', [
			// 'headers'         => ['X-Foo' => 'Bar'],
			// 'body'            => [
				// 'field' => 'abc',
				// 'other_field' => '123'
			// ],
			// 'allow_redirects' => false,
			// 'timeout'         => 5
		// ]);
		
		
		
	  //CAMPUR
      //==METHODE GET ==
		// $client = new \GuzzleHttp\Client();
		// 
		// echo $res->getStatusCode();
		// echo $res->getBody();
		
		
		//==METHODE POST BODY ==
		$client = new \GuzzleHttp\Client();
		$data = ["NAMA" => "SYAIRA1"];
		//$res = $client->post('http://production.kontrolgampang.com/ppob/test-apis', ['body' => json_encode($data), 'future' => true]);
		$res = $client->post('http://production.kontrolgampang.com/ppob/test-apis', ['body' => $data, 'future' => true]);
		//$res = $client->post('http://production.kontrolgampang.com/ppob/test-apis', ['body' =>['NAMA' =>'ALAM']]);
		echo $res->getStatusCode();		
		// $res->then(function ($response) {
			$res1 = $client->get('http://production.kontrolgampang.com/ppob/test-apis');
			echo $res1->getBody();
			// echo 'I completed! ' . $response;
		// });	  
		
		
      /* 	// 
		$client = new Client(['base_uri' => 'http://production.kontrolgampang.com/ppob/test-apis']);
		//$request = new \GuzzleHttp\Psr7\Request('GET', 'TGL');
		print_r($client); */
		
		//$res = $client->request('GET', 'http://production.kontrolgampang.com/ppob/test-apis');
		// $res = $client->get('http://production.kontrolgampang.com/ppob/test-apis');
		// echo $res->getStatusCode();
		// 200
		//echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		
		// '{"id": 1420053, "name": "guzzle", ...}'

		// Send an asynchronous request.
		// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://production.kontrolgampang.com');
		// $promise = $client->sendAsync($request)->then(function ($response) {
			// echo 'I completed! ' . $response->getBody();
		// });
		// $promise->wait();
		
		
		// $client = new Client([
			// 'base_url' => $apiUrl,
			// 'defaults' => [
				// 'headers' => ['Content-Type' => 'application/json'],
				// 'auth'    => [$apiToken]
			// ]
		// ]);

		// $data = ["name" => "digitaloceanisthebombdiggity.com", "ip_address" => "1.2.3.4"];
		// $response = $client->post('domains', ['body' => json_encode($data)], ['future' => true]);
		// $response->then(function ($response) {
			// echo 'I completed! ' . $response;
		// });
		
		
		
		// $client = new Client([
			// 'base_url' => $apiUrl,
			// 'defaults' => [
				// 'headers' => ['Content-Type' => 'application/json'],
				// 'auth'    => [$apiToken]
			// ]
		// ]);

		// $data = ["name" => "digitaloceanisthebombdiggity.com", "ip_address" => "1.2.3.4"];
		// $response = $client->post('domains', ['body' => json_encode($data)], ['future' => true]);
		// $response->then(function ($response) {
			// echo 'I completed! ' . $response;
		// });

    }
}
