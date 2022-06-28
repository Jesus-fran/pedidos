<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcularEnvio extends Controller
{
    public function Calcular(Request $request)
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
        
        // $long_dest = '16.904753220641805';
        // $lat_dest = '-92.10504985739328';
        $destino = $calle.', '.$colonia.', '.$cp.', '.$municipio.', '.$estado;
        $api_key = 'AIzaSyC1013AP-y0F2d8zZtwDRbsFVVr7aMbblU';
        $distance_data = file_get_contents ( 'https://maps.googleapis.com/maps/api/distancematrix/json?&origins='.$origen.'&destinations='.urlencode($destino).'&key='.$api_key);
        $distancia_arr = json_decode ( $distance_data ) ;

        $status = $distancia_arr->status;
        $encontrado = $distancia_arr->rows[0]->elements[0]->status;
        $distancia = $distancia_arr->rows[0]->elements[0]->distance->text;
        $distancia_value = $distancia_arr->rows[0]->elements[0]->distance->value;
        $duracion = $distancia_arr->rows[0]->elements[0]->duration->text;
        $destino_dir = $distancia_arr->destination_addresses[0];
        $origen_dir = $distancia_arr->origin_addresses[0];
        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($destino).'&key='.$api_key);
        $geo_arr = json_decode($geo);
        $lat_dest = $geo_arr->results[0]->geometry->location->lat;
        $long_dest = $geo_arr->results[0]->geometry->location->lng;
        return view('calcular_envio', compact('nombre', 'email', 'tel', 'status', 'encontrado', 'distancia', 'distancia_value', 'duracion', 'destino_dir', 'origen_dir', 'long_dest', 'lat_dest'));
    }
}
