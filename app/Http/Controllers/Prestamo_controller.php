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
        ["num_comprobante_prestamo"=>"required"]);//required es necesario
        if(!$validar_prestamo->fails())//si al validar no hay falla
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
        $validar_prestamo=Validator::make($request->all(),
        ["num_comprobante_prestamo"=>"required"]);
        if(!$validar_prestamo->fails())
          {
            $prestamos=Prestamo_model::find($id); // hay  que  buscar el id  para sabe r si esxite
            if(isset($prestamo)) // se pregunta  si existe es variables si no esta vacia
            {
                 $prestamos->num_comprobante_prestamo= $request->num_comprobante_prestamo; // requeste  es lo que  envia el  usuario
                 $prestamos->fecha_emitida_prestamo= $request->fecha_emitida_prestamo;
                 $prestamos->hora_emitida_prestamo= $request->hora_emitida_prestamo;
                 $prestamos->img_arma= $request->img_arma;
                 
                 $prestamo->save();
                return response()->json(['mensaje'=>"prestamo quedo actualizado"]);
            }
            else{
                return response()->json(['mensaje'=>"prestamo no encontrado" ]);
            }
        }
           else{
                return response()->json(['mensaje'=>"validacion incorrecta" ]);
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
        $prestamo = Prestamo_model::find($id);
        if(isset($prestamo)) // se pregunta  si existe es variables si no es  nulo
        {
         $prestamo->delete();
         return response()->json(['mensaje'=>"registro del prestamo borrado",]);
        }
         else
         {
           return response()->json(['mensaje'=>"id no encontrado",]);
         }

       return response()->json([
        'mensaje'=>"ok",
        "id"=>$id,
        'prestamo'=>$prestamo
         ]);
    }
}
