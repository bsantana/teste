<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/', function () {
	return 'Hello World!';
});

$app->get('/clientes/show/{id}', function( $request, $response, $id ) {
	return "Essa é sua identificação -> " . $id['id'];
});

$app->get('/produtos/:id/vendasPorAno/:ano', function ( $id, $ano ) {
	return "Teste";
});

$app->get('/produtos/:id/vendas/:ano(/:mes)', function ( $id, $ano, $mes = null ) {
	return "É isso!";
});

$app->get('/clientes/add', function () {
	return "Era isso!";
});

$app->post('/clientes/add', function () {
	return "eita!";
});

$app->put('/clientes/update/{id}', function ( $request, $response, $args ) {
	return "Agora foi o put!!!!" . $args['id'];
});

$app->put('/clientes/delete/:id', function ( $id ) {
	return "Ah meu delete.";
});

$app->post('/cliente', function ($request, $response, $args) {
	//$request = \Slim\App::getInstance()->request()->getBody();
	var_dump($request);
});

$app->get('/books/{id}', function ($request, $response, $args) {
    return $args['id'];
});

$app->post('/books', function ($request, $response, $args) {
    // Create new book
});

 $app->get('/{name}', function ( $request, $response, $arg ) { 
 	//echo "Hello, $name";

 	 $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response.$arg['name'];
 }); 


$app->run();