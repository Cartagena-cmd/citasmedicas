<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;
use App\User;

class EspecialidadCtr extends Controller
{
    public function index(){
        $especialidades = Especialidad::all();
        return $especialidades;
    }
}
