<?php
require_once('./modelo/MgrCliente.php');
require_once('./modelo/MgrTransaccion.php');
require_once('./modelo/MgrComercio.php');

header("Access-Control-Allow-Origin: *");
//header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');

define('API_KEY','3d524a53c110e4c22463b10ed32cef9d');

require './libs/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/trx/:cliente', function ($cliente) {
    
    $vecTrx = MgrTransaccion::buscarXCliente($cliente);
    $vecResultado = array ();
    foreach ($vecTrx as $value) {
        array_push($vecResultado, MgrCliente::toArray2($value));
    }
    $response["error"] = false;
    $response["message"] = "OK"; //podemos usar count() para conocer el total de valores de un array
    $response["datos"] = $vecResultado;
    
    echoResponse(200, $response);
});

$app->get('/cliente/:codigo', function ($codigo) {
    $vecClientes = MgrCliente::buscarXCodigo($codigo);
    $response["error"] = false;
    $response["message"] = "OK"; //podemos usar count() para conocer el total de valores de un array
    $response["datos"] = MgrCliente::toArray2($vecClientes);
    
    echoResponse(200, $response);
});

function echoResponse($status_code, $response) {
$app = \Slim\Slim::getInstance();
// Http response code
$app->status($status_code);
 
// setting response content type to json
$app->contentType('application/json');
 
echo json_encode($response);

}
 	


$app->get('/auto', function () {
 
$response = array();
//$db = new DbHandler();
 
/* Array de autos para ejemplo response
* Puesdes usar el resultado de un query a la base de datos mediante un metodo en DBHandler
**/
$autos = array(
array('make'=>'Toyota', 'model'=>'Corolla', 'year'=>'2006', 'MSRP'=>'18,000'),
array('make'=>'Nissan', 'model'=>'Sentra', 'year'=>'2010', 'MSRP'=>'22,000')
);
 
$response["error"] = false;
$response["message"] = "Autos cargados: " . count($autos); //podemos usar count() para conocer el total de valores de un array
$response["autos"] = $autos;
 
echoResponse(200, $response);
});

$app->run();


