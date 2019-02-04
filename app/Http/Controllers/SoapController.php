<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';
use Illuminate\Http\Request;
use \WSDL\WSDLCreator;

class SoapController extends Controller
{
    public function __construct() {
       
        ini_set('soap.wsdl_cache_enabled', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        ini_set('default_socket_timeout', 300);
        ini_set('max_execution_time', 0);
    }

    public function server() {
        $location = url('server'); // http://payment.dev/server
        $namespace = $location;
        $class = \HelloWorld::class;

       // $wsdl = new \WSDL\WSDLCreator($class, $location);
        //$wsdl->setNamespace($namespace);

        if (isset($_GET['wsdl'])) {
            $serverUrl = "http://127.0.0.1:8080";
            $soapAutoDiscover = new AutoDiscover();
            $soapAutoDiscover->setUri($serverUrl . '/wsdl');
            $soapAutoDiscover->setClass(\HelloWorld::class);
            $soapAutoDiscover->handle();
            exit;
        }

       // $wsdl->renderWSDLService();

        $server = new \SoapServer(
            url('server?wsdl'),
            array(
                'exceptions' => 1,
                'trace' => 1,
            )
        );

        $server->setClass($class);
        $server->handle();
        exit;
    }

    public function client() {
        $wsdl = url('server?wsdl');
        $client = new \SoapClient($wsdl);

        try {
            $res = $client->hello('world');
            dd($res);
        } catch (\Exception $ex) {
            dd($ex);
        }
    }
}
