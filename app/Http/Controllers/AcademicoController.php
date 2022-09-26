<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Academico;

class AcademicoController extends Controller
{
    public function index(Request $request)
    {
        $academico = Academico::all();
          return $academico;
    }
    public function store(Request $request)
    {
      $date = date("YmdHis");
        $academico = new Academico();
        $academico->programas              = $request->programas;
        $academico->estrato                = $request->estrato;
        $academico->valor                  = $request->valor;
        $academico->fecha_registro         = $date;

        if($academico->estrato  == 1){
            $des = $request->valor * 0.20;
            $des1 = $request->valor - $des;
            $academico->descuento         = $des1;
        }
        if($academico->estrato  == 2){
            $des = $request->valor * 0.20;
            $des1 = $request->valor - $des;
            $academico->descuento         = $des1;
        }

        $academico->save();
        return $academico;
    }
}
