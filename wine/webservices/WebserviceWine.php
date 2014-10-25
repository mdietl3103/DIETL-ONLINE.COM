<?php
/**
 * Created by PhpStorm.
 * User: m.dietl
 * Date: 05.10.2014
 * Time: 12:02
 */

//namespace MyAppNamespace;
namespace dietl_online\wine;

use \Haste\Http\Response\JsonResponse;

class WebserviceWine extends \RESTfulWebservices\RESTfulController
{
    public function get()
    {
        $arrData = array();

        // Add "Hello World!" to the json output
        $arrData['status'] = 'Hello World!';

        // Send response
        $objResponse = new JsonResponse();
        $objResponse->setContent($arrData, JSON_PRETTY_PRINT);
        $objResponse->send();
    }

    public function put()
    {
        $arrData = array();

        // Add "Hello World!" to the json output
        $arrData['status'] = 'Hello World!';
        $arrData['params'] = \Input::get('token');

        // Send response
        $objResponse = new JsonResponse();
        $objResponse->setContent($arrData, JSON_PRETTY_PRINT);
        $objResponse->send();

    }

    public function post()
    {
        $arrData = array();

        // Add "Hello World!" to the json output
        $arrData['status'] = 'Hello World!';
        $arrData['params'] = \Input::get('token');
        $test = \Input::get("params");

        $rawJsonData = $_POST;
        $decodedData = json_decode($rawJsonData);
        $test2 = \Input::post('ajaxFormId');
        // Send response
        $objResponse = new JsonResponse();
        $objResponse->setContent($arrData, JSON_PRETTY_PRINT);
        $objResponse->send();
    }

    public function delete()
    {
        // Code for DELETE requests
    }
}