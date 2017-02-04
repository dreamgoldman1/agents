<?php

namespace App\Http\Controllers\Asignacion;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Asignacion;

/**
 * Description of AsignacionController
 *
 * @author familia-orozco
 */
class AsignacionController extends Controller {

    public function asignaciones() {
        // Lista las asignaciones actuales
        $asignaciones = Asignacion::all();
        foreach ($asignaciones as $asignacion) {
            $asignacionData[$asignacion->codigo_agente][] = array(
                'id' => $asignacion->id,
                'codigo_agente' => $asignacion->codigo_agente,
                'nombre_agente' => $asignacion->nombre_agente,
                'zipcode_agente' => $asignacion->zipcode_agente,
                'contacto' => $asignacion->contacto,
                'zipcode_contacto' => $asignacion->zipcode_contacto,
            );
        }
        return view('pages.Asignacion.asignaciones', ['asignacionData' => $asignacionData]);
    }
}
