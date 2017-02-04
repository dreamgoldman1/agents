<?php

namespace App\Http\Controllers\Csv;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Csv;

/**
 * Description of CsvController
 *
 * @author familia-orozco
 */
class CsvController extends Controller{
    
    public function cargarCsv() {
        // Formulario para el cargado del CSV
        return view('pages.Csv.cargar-csv');
    }
    
    public function cargado(Request $request) {
        // Toma el archivo del formulario y lo guarda localmente
        $dirPath = public_path() . "/docs/";
        $fileName = Input::file('archivo')->getClientOriginalName();
        $fileSize = Input::file('archivo')->getSize();
        Input::file('archivo')->move($dirPath,$fileName);
        
        $this->limpiarTabla('csvs');
        
        // Se lee el archivo para el guardado de los registros
        $file = fopen($dirPath . $fileName, "r");
        while (!feof($file)){
            $registro = fgets($file);
            $registroSplit = explode(',',$registro);
            $csv = new Csv;
            if (isset($registroSplit[0]) && isset($registroSplit[1])){
                $csv->contact = trim($registroSplit[0]);
                $csv->zipcode = trim($registroSplit[1]);
                $csv->save();
            }
        }
        fclose($file);
        
        return redirect()->action('Csv\CsvController@verCsv');
    }
    
    public function verCsv() {
        // Se consultan todos los datos de la tabla
        $csvs = Csv::all();
        foreach($csvs as $csv){
            $csvData[] = array(
                'id' => $csv->id,
                'contact' => $csv->contact,
                'zipcode' => $csv->zipcode,
            );
        }
        
        return view('pages.Csv.ver-csv',['csvData' => $csvData]);
    }
    
    public function limpiarTabla($tabla) {
        $sql = "TRUNCATE $tabla";
        DB::connection()->getPdo()->exec( $sql );
    }
}
