<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\City;
use App\Models\Province;
use Symfony\Component\HttpFoundation\Request;

class OngkirAPIController extends Controller
{
    public function index() {
        return "API Raja Ongkir";
    }

    public function getprovince() {
        $client = new Client();

        try {
            $response = $client->get('https://api.rajaongkir.com/starter/province',
                array(
                    'headers' => array(
                        'key' => '244aae4ed5aa56ef039c7c26c08bee2d',
                    )
                )
            );
        } catch(RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);
        // print_r($array_result);

        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++) {

            $province = new Province;
            $province->id = $array_result["rajaongkir"]["results"][$i]["province_id"];
            $province->name = $array_result["rajaongkir"]["results"][$i]["province"];
            $province->save();
        }
    }

    public function getcity() {
        $client = new Client();

        try {
            $response = $client->get('https://api.rajaongkir.com/starter/city',
                array(
                    'headers' => array(
                        'key' => '244aae4ed5aa56ef039c7c26c08bee2d',
                    )
                )
            );
        } catch(RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);
        print_r($array_result);

        // for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++) {

        //     $city = new City;
        //     $city->id = $array_result["rajaongkir"]["results"][$i]["city_id"];
        //     $city->name = $array_result["rajaongkir"]["results"][$i]["city_name"];
        //     $city->id_province = $array_result["rajaongkir"]["results"][$i]["province_id"];
        //     $city->save();
        // }
    }

    public function checkshipping() {
        $title = "Check Shipping";
        $city = City::get();

        return view('', compact('title','city'));
    }

    public function processShipping(Request $request) {
        $title = "Check Shipping Result";
        $client = new Client();

        try {
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
                [
                    'body' => 'origin=501&destination=114&weight=1700&courier=jne',
                    'headers' => [
                        'key' => '244aae4ed5aa56ef039c7c26c08bee2d',
                        'content-type' => 'application/x-www-form-urlencoded',
                    ]
                ]
            );
        } catch(RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);
        // print_r($array_result);

        $origin = $array_result["rajaongkir"]["origin_details"]["city_name"];
        $destination = $array_result["rajaongkir"]["destination_details"]["city_name"];

        return view('', compact('title','origin','destination','array_result'));
    }
}
