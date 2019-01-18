<?php
use \App\PlanService;
use \Zend\Soap\AutoDiscover;
use \Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/soap', function(){
    $serverUrl = "http://localhost:8000/soap";
    if(isset($_GET['wsdl'])){
        $soapAutoDiscover = new AutoDiscover(new ArrayOfTypeSequence());
        $soapAutoDiscover->setBindingStyle(array('style' => 'document'));
        $soapAutoDiscover->setOperationBodyStyle(array('use' => 'literal'));
        $soapAutoDiscover->setClass('App\\PlanService');
        $soapAutoDiscover->setUri($serverUrl);
        header("Content-Type: text/xml");
        echo $soapAutoDiscover->generate()->toXml();
        exit;
    }else{
        $soap = new \Zend\Soap\Server($serverUrl . '?wsdl');
        $soap->setObject(new \Zend\Soap\Server\DocumentLiteralWrapper(new App\PlanService()));
        $soap->handle();
    }
});

Route::resource('movies', 'MovieController');
Route::resource('top-ten', 'TopTenController');