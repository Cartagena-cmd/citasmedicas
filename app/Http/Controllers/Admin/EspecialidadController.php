<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Especialidad;
use Illuminate\Support\Facades\Http;

class EspecialidadController extends Controller
{
    public function index(){
        // $especialidad= Especialidad::all();
        // return view('especialidad.index', compact('especialidad'));

        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url.'/especialidades');
        $especialidad=$response->json();
        return view('especialidad.index', compact('especialidad'));
    }

    public function create(){
        return view('especialidad.create');
    }

    private function validar($request){
        $rules=[
            'nombre'=>'required'
        ];
        $messages=[
            'nombre.required'=>'Es necesario ingresar un nombre'
        ];
        $this->validate($request,$rules,$messages);
    }

    public function store(Request $request){
        // $this->validar($request);

        // $obj = new Especialidad();
        // $obj->nombre = $request->nombre; 
        // $obj->descripcion = $request->descripcion; 
        // $obj->save();

        // $notificacion='La especialidad se ha registrado correctamente';
        // return redirect('/especialidad')->with(compact('notificacion'));

        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::post($url.'/especialidades',[
            'nombre'=> $request->nombre,
            'descripcion'=> $request->descripcion
        ]);
        $notificacion='La especialidad se ha registrado correctamente';
        return redirect('/especialidad')->with(compact('notificacion'));
    }

    public function edit($id){
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidad.edit', compact('especialidad'));
    }

    public function update(Request $request){
        $this->validar($request);

        // $obj = Especialidad::findOrFail($request->id);
        // $obj->nombre = $request->nombre; 
        // $obj->descripcion = $request->descripcion; 
        // $obj->save();

        // $notificacion='La especialidad se ha actualizado correctamente';
        // return redirect('/especialidad')->with(compact('notificacion'));
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::put($url.'/especialidades/'.$request->id,[
            'nombre'=> $request->nombre,
            'descripcion'=> $request->descripcion
        ]);
        $notificacion='La especialidad se ha registrado correctamente';
        return redirect('/especialidad')->with(compact('notificacion'));
    }

    public function destroy(Request $request){
        // $obj = Especialidad::findOrFail($request->id); 
        // $obj->delete();

        // $notificacion='La especialidad se ha eliminado correctamente';
        // return redirect('/especialidad')->with(compact('notificacion'));
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url.'/especialidades/'.$request->id);
        $notificacion='La especialidad se ha eliminado correctamente';
        return redirect('/especialidad')->with(compact('notificacion'));
    }


}
