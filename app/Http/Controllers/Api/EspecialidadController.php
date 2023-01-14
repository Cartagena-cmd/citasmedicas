<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Especialidad;
use App\User;
use Illuminate\Support\Facades\Http;

class EspecialidadController extends Controller
{
    public function index(){
        $especialidades = Especialidad::all();
        return $especialidades;
    }

    public function medicos(Request $request){
        $idEspecialidad = $request->id;
        $obj =User::join('medicoespecialidad', 'users.id', '=', 'medicoespecialidad.idMedico')
        ->select('users.id','users.name')
        ->where('medicoespecialidad.idEspecialidad','=',$idEspecialidad)
        ->get();
        return $obj;
    }

    public function guardar(Request $request){
        // $especialidad = new Especialidad();
        // $especialidad->nombre = $request->nombre; 
        // $especialidad->descripcion = $request->descripcion; 
        // $especialidad->save();

        // if ($especialidad) 
    	// 	$success = true;
    	// else 
    	// 	$success = false;

    	// return compact('success');
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::post($url.'/especialidades',[
            'nombre'=> $request->nombre,
            'descripcion'=> $request->descripcion
        ]);
        return compact('success');
    }
    public function delete($id_especialidad){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url.'/especialidades');
    }
}
