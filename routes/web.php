<?php
use \App\PlanService;
use \Zend\Soap\AutoDiscover;
use \Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;
use Zend\Soap\Server;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$serverUrl = "http://127.0.0.1:8080/soap";
function populateServer($server){
    $server->setClass(PlanService::class);
    $server->addFunction('App\PlanService\GetPlans');
}

function getUrl(){
    $ip = $_SERVER['SERVER_NAME'];
    $port = $_SERVER['SERVER_PORT'];
    return $ip . ':' . $port;
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/soap', function(){
    $serverUrl = "http://127.0.0.1:8080";
    $opts = array(
        'ssl' => array(
            'ciphers' => 'RC4-SHA',
            'verify_peer' => false,
            'verify_peer_name' => false
        )
    );
    $params = array(
        'encoding' => 'UTF-8',
        'verifypeer' => false,
        'verifyhost' => false,
        'soap_version' => SOAP_1_2,
        'trace' => 1,
        'exceptions' => 1,
        'stream_context' => stream_context_create($opts)
    );
    libxml_disable_entity_loader(false);
    $client = new SoapClient($serverUrl.'/wsdl', $params);
    $result =  $client->GetPlans();
    
    //$client = new Zend\Soap\Client($serverUrl."/wsdl", $options);
    return $result;
});

Route::get('/wsdl', function(){
    $serverUrl = "http://127.0.0.1:8080";
    $soapAutoDiscover = new AutoDiscover();
    $soapAutoDiscover->setUri($serverUrl . '/wsdl');
    $soapAutoDiscover->setClass(PlanService::class);
    $soapAutoDiscover->handle();
    exit;
});

Route::post('/wsdl', function(){
    $serverUrl = "http://127.0.0.1:8080" . '/wsdl';
    $server = new Server($serverUrl);
    populateServer($server);
    $server->handle();
    
    //$params = array('uri' => 'localhost/wsdl');
});

Route::any('/server', 'SoapController@server');
Route::any('/client', 'SoapController@client');

Route::resource('movies', 'MovieController');
Route::resource('top-ten', 'TopTenController');