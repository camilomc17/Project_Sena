<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//llamo la DB
use Illuminate\Support\Facades\Validator;
use App\Models\Acta_Entrega_model;//llamo el Model

class Acta_Entrega_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acta_entrega=Acta_Entrega_model::all();
        return $acta_entrega;
    }
    
    public function show($id)
    {
        $acta_entrega=Acta_Entrega_model::Where('id',$id)->get();
        return $acta_entrega;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar_acta_entrega=Validator::make($request->all(),
        ["hora_entrega"=>"required"]);//required es necesario
        if(!$validar_acta_entrega->fails())//si al validar no hay falla
          {
            $acta_entrega = new Acta_Entrega_model();
            $acta_entrega->hora_entrega = $request->hora_entrega;
            $acta_entrega->fecha_entrega = $request->fecha_entrega;
            $acta_entrega->save();
            return response()->json(['mensaje'=>"QUEDO GUARDADO LA ACTA DE ENTREGA"]);
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validar_acta_entrega=Validator::make
        ($request->all(),["hora_entrega"=>"required"]);
        if(!$validar_acta_entrega->fails())
        {
            $acta_entrega = Acta_Entrega_model::find($id);
                if(isset($acta_entregas))
                {
                    $acta_entrega->hora_entrega = $request->hora_entrega;
                    $acta_entrega->fecha_entrega = $request->fecha_entrega;

                    $acta_entregas->save();
                    return response()->json(['mensaje'=>"QUEDO ACTUALIZADA ESA ENTREGA"]);
                }
                 else{
                    return response()->json(['mensaje'=>" ESA ENTREGA NO SE ENCONTRO"]);
                 }
        }
        else
        {
            return response()->json(['mensaje'=>" LA VALIDACION DE ESA ENTREGA ES INCORRECTA"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acta_entrega=Acta_Entrega_model::find($id);
        if(isset($acta_entrega))
        {
          $acta_entrega->delete();
          return response()->json(['mensaje'=>"LA ENTREGA SE ELIMINO CORRECTAMENTE"]);
        }
        else{
            return response()->json(['mensaje'=>"EL ID DE LA ENTREGA NO FUE ENCONTRADO"]);
        }
        return response()->json([
            'mensaje'=>"ok",
            "id"=>$id,
            'acta_entrega'=>$acta_entrega
             ]);
    }
}
