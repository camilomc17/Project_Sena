<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prestamo_model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Prestamo_controller extends Controller
{   /*
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamo = Prestamo_model::all();
        return $prestamo;
    }
   
    public function show($id)
    {
        $prestamo=Prestamo_model::Where('id',$id)->get();
        return $prestamo;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar_prestamo=Validator::make($request->all(),
        ["num_comprobante_prestamo"=>"required"]);
        if(!$validar_prestamo->fails())
        {
           $prestamo = new Prestamo_model();
           $prestamo->num_comprobante_prestamo = $request->num_comprobante_prestamo;
           $prestamo->fecha_emitida_prestamo = $request->fecha_emitida_prestamo;
           $prestamo->hora_emitida_prestamo = $request->hora_emitida_prestamo;
           $prestamo->img_arma = $request->img_arma;
           $prestamo->save();
           return response()->json(['mensaje'=>"QUEDO GUARDADO"]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestamo = Prestamo_model::destroy($id);
        return $prestamo;
    }
}
