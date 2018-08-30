<?php

namespace App\Http\Controllers;

use Czim\Service\Requests\ServiceSoapRequest;
use Czim\Service\Services\SoapService;

class ServiceController extends Controller
{
    
    public function getActores(){
        // Set up defaults
        $defaults = new \Czim\Service\Requests\ServiceSoapRequestDefaults();

        $defaults->setLocation('http://192.168.11.13:8080/WebCine/WSActores?WSDL');

        // Instantiate service, with a to-array interpreter
        $service = new SoapService(
            $defaults,
            new \Czim\Service\Interpreters\BasicSoapXmlAsArrayInterpreter()
        );

        // Prepare a specific request
        $request = new ServiceSoapRequest();        
    
        // Perform the call, which will return a ServiceReponse object
        $response = $service->call('listarActores', $request);
        
        $actores = $response['data']['return'];

        return $actores;

    }

}
