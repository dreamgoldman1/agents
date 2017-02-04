<?php

namespace App\Http\Controllers\Match;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asignacion;
use App\Models\Csv;

/**
 * Description of MatchController
 *
 * @author familia-orozco
 */
class MatchController extends Controller {

    public function index() {
        // Formulario para ingresar los agentes y hacer Match
        return view('pages.Match.index');
    }

    public function match(Request $request) {
        $agente1 = array(
            'codigo' => $request->input('codigo1'),
            'nombre' => $request->input('nombre1'),
            'zipcode' => $request->input('zipcode1'),
        );
        
        $agente2 = array(
            'codigo' => $request->input('codigo2'),
            'nombre' => $request->input('nombre2'),
            'zipcode' => $request->input('zipcode2'),
        );
        
        // Validacion de los zipcodes ingresados para los agentes
        $existe1 = DB::table('zipcodes')->where('zip', '=', $agente1['zipcode'])->first();
        if (!isset($existe1->zip)){
            return view('pages.Match.index',['mensaje' => 'El zipcode para el Agente 1 no existe']);
        }
        
        $existe2 = DB::table('zipcodes')->where('zip', '=', $agente2['zipcode'])->first();
        if (!isset($existe2->zip)){
            return view('pages.Match.index',['mensaje' => 'El zipcode para el Agente 2 no existe']);
        }
        
        // Codigo para procesar el match
        $csvs = Csv::all();
        foreach ($csvs as $csv){
            $contactoUbicacion = DB::table('zipcodes')->where('zip', '=', $csv->zipcode)->first();
            $distanciaAgente1 = $this->harvestine($contactoUbicacion->latitud, $contactoUbicacion->longitud, $existe1->latitud, $existe1->longitud);
            $distanciaAgente2 = $this->harvestine($contactoUbicacion->latitud, $contactoUbicacion->longitud, $existe2->latitud, $existe2->longitud);
            if($distanciaAgente1 <= $distanciaAgente2){
                $agente1['asignados'][] = array(
                    'contacto' => $csv->contact,
                    'zipcode_contacto' => $csv->zipcode,
                );
            }else{
                $agente2['asignados'][] = array(
                    'contacto' => $csv->contact,
                    'zipcode_contacto' => $csv->zipcode,
                );
            }
        }
        
        $this->limpiarTabla('asignacions');
        
        foreach($agente1['asignados'] as $asignado){
            $asignarContacto = new Asignacion;
            $asignarContacto->codigo_agente = $agente1['codigo'];
            $asignarContacto->nombre_agente = $agente1['nombre'];
            $asignarContacto->zipcode_agente = $agente1['zipcode'];
            $asignarContacto->contacto = $asignado['contacto'];
            $asignarContacto->zipcode_contacto = $asignado['zipcode_contacto'];
            $asignarContacto->save();
        }
        
        foreach($agente2['asignados'] as $asignado){
            $asignarContacto = new Asignacion;
            $asignarContacto->codigo_agente = $agente2['codigo'];
            $asignarContacto->nombre_agente = $agente2['nombre'];
            $asignarContacto->zipcode_agente = $agente2['zipcode'];
            $asignarContacto->contacto = $asignado['contacto'];
            $asignarContacto->zipcode_contacto = $asignado['zipcode_contacto'];
            $asignarContacto->save();
        }
        
        return redirect()->action('Asignacion\AsignacionController@asignaciones');
    }

    function harvestine($lat1, $long1, $lat2, $long2) {
        //Distancia en kilometros en 1 grado distancia.
        //Distancia en millas nauticas en 1 grado distancia: $mn = 60.098;
        //Distancia en millas en 1 grado distancia: 69.174;
        //Solo aplicable a la tierra, es decir es una constante que cambiaria en la luna, marte... etc.
        $km = 111.302;

        //1 Grado = 0.01745329 Radianes    
        $degtorad = 0.01745329;

        //1 Radian = 57.29577951 Grados
        $radtodeg = 57.29577951;
        //La formula que calcula la distancia en grados en una esfera, llamada formula de Harvestine. Para mas informacion hay que mirar en Wikipedia
        //http://es.wikipedia.org/wiki/F%C3%B3rmula_del_Haversine
        $dlong = ($long1 - $long2);
        $dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad)) + (cos($lat1 * $degtorad) * cos($lat2 * $degtorad) * cos($dlong * $degtorad));
        $dd = acos($dvalue) * $radtodeg;
        return round(($dd * $km), 2);
    }
    
    public function limpiarTabla($tabla) {
        $sql = "TRUNCATE $tabla";
        DB::connection()->getPdo()->exec( $sql );
    }

}
