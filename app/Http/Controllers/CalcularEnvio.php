<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidation;
use Illuminate\Http\Request;
use Ramsey\Uuid\Math\CalculatorInterface;

class CalcularEnvio extends Controller
{

    public function CalcularCosto($distancia)
    {   

 
        if ($distancia / 1000 <= 100) {
            return 100;
            // 100km
        } elseif ($distancia / 1000 <= 200) {
            return 130;
            // 200km
        } elseif ($distancia / 1000 <= 400) {
            // 400km
            return 170;
        } elseif ($distancia / 1000 <= 700) {
            // 700km
            return 210;
        } elseif ($distancia / 1000 <= 1000) {
            // 1000km
            return 250;
        } elseif ($distancia / 1000 > 1000) {
            // Mayor a 1000km
            return 350;
        }
        
    }

    public function Calcular(FormValidation $request)
    {
        $nombre = $request->name;
        $email  = $request->email;
        $tel = $request->tel;
        $estado = $request->estado;
        $municipio = $request->municipio;
        $cp = $request->cp;
        $colonia = $request->colonia;
        $calle = $request->calle;
        $num = $request->num;

        $origen = '16.895863879627875,-92.06730387778236';

        $destino = $calle.', '.$colonia.', '.$cp.', '.$municipio.', '.$estado;
        // $api_key = 'AIzaSyC1013AP-y0F2d8zZtwDRbsFVVr7aMbblU';
        $api_key = 'AIzaSyCS1WbkMD1gjkwW7umiiFDPIjQlvQTnQQs';
        $distance_data = file_get_contents ( 'https://maps.googleapis.com/maps/api/distancematrix/json?&origins='.$origen.'&destinations='.urlencode($destino).'&key='.$api_key);
        $distancia_arr = json_decode ( $distance_data ) ;
        // return $distancia_arr;
        $status = $distancia_arr->status;
        $encontrado = $distancia_arr->rows[0]->elements[0]->status;
        $distancia = $distancia_arr->rows[0]->elements[0]->distance->text;
        $distancia_value = $distancia_arr->rows[0]->elements[0]->distance->value;


        $costo_distancia = CalcularEnvio::CalcularCosto($distancia_value);

        $duracion = $distancia_arr->rows[0]->elements[0]->duration->text;
        $destino_dir = $distancia_arr->destination_addresses[0];
        $origen_dir = $distancia_arr->origin_addresses[0];
        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($destino).'&key='.$api_key);
        $geo_arr = json_decode($geo);
        // return $geo_arr;
        $lat_dest = $geo_arr->results[0]->geometry->location->lat;
        $long_dest = $geo_arr->results[0]->geometry->location->lng;

        //return compact('nombre', 'email', 'tel', 'status', 'encontrado', 'distancia', 'costo_distancia');
        return view('calcular_envio', compact('nombre', 'email', 'tel', 'status', 'encontrado', 'distancia', 'costo_distancia', 'duracion', 'destino_dir', 'origen_dir', 'long_dest', 'lat_dest'));
    }

}
