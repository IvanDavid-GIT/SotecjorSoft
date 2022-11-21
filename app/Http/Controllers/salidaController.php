<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\material; //Incluir el modelo en el contralador
use App\Models\salida;
use App\Models\detalle_salida;
use App\Models\User;
use App\Models\proyectodeobra;
use Illuminate\Support\Facades\DB;
use DataTables;

class salidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactivo');
    }


    



    public function index(Request $request)
    {

        return view('salida.index');
    }
    /*
    
*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Mostrar la vista para editar
    {
        $users = User::all();

        $materiales = DB::table('materiales')
            ->select('materiales.*', 'medidas.nombre as medidaNombre')
            ->join('medidas', 'materiales.medida', '=', 'medidas.id')
            ->orderBy('materiales.nombre', 'asc')
            ->get();

        $obras = proyectodeobra::all();
        return view('salida.create', compact('users', 'materiales', 'obras'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([

            'CodigoSalida' => ['required', 'unique:salidas,CodigoSalida'],
            'Descripcion' => ['required'],
            'Responsable' => ['required'],
            'Obra' => ['required'],
        ]);
        $datos = $request->all();
        try {
            DB::beginTransaction();
            $entrada = salida::create([
                "CodigoSalida" => $datos["CodigoSalida"],
                "FechaSalida" => $datos["FechaSalida"],
                "Descripcion" => $datos["Descripcion"],
                "Responsable" => $datos["Responsable"],
                "Estado" => $datos["Estado"],
                "Obra" => $datos["Obra"],
            ]);

            foreach ($datos["IdMaterial"] as $key => $value) {

                detalle_salida::create([
                    "IdMaterial" => $value,
                    "IdSalida" => $entrada->id,
                    "CodigoSalida" => $datos["CodigoSalida"],
                    "Cantidad" => $datos["Cantidad"][$key]
                ]);

                $mat = material::find($value);
                $mat->update(["stock" => $mat->stock - $datos["Cantidad"][$key]]);
            }

            DB::commit();
            return redirect()->route('salidas.index')->with('status', '1');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('salidas.index')->with('status', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalle(Request $request)
    {
        $id = $request->input("id");

        $salida = salida::findOrFail($id);

        $materiales = [];
        if ($id != null) {
            $materiales = material::select("materiales.*", "detalle_salida.*", "categorias.nombre as nombrecategoria", "medidas.nombre as nombremedida")
                ->join("detalle_salida", "materiales.id", "=", "detalle_salida.IdMaterial")
                ->join('categorias', 'materiales.categoria', '=', 'categorias.id')
                ->join('medidas', 'materiales.medida', '=', 'medidas.id')
                ->where("detalle_salida.IdSalida", $id)
                ->get();
        }


        //Retornar a la vista el objeto que se va a editar
        return view('salida.detalle', compact('materiales', 'id', 'salida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Buscar el registro a editar
        $salidas = salida::findOrFail($id);

        request()->validate([

            'CodigoSalida' => ['required', $salidas->CodigoSalida != $request->CodigoSalida ? 'unique:salidas,CodigoSalida' : ''],
            'Descripcion' => ['required'],
            'Responsable' => ['required']
        ]);

        //Actualizar los datos de los atributos a editar con los datos enviados desde el formulario
        $salidas->CodigoSalida = $request->CodigoSalida;
        $salidas->Descripcion = $request->Descripcion;
        $salidas->Responsable = $request->Responsable;



        //Realizar la modificación en DB
        $salidas->update();

        //Redirigir hacia el método index del controlador.
        return redirect()->route('salidas.index')->with('status', '2');
    }

    public function updateState(Request $request)
    {
        $salidas = salida::find($request->id);
        if ($salidas == null) {
            //messagge
            return redirect("/salidas/index");
        }
        //actualizacion de estado
        $salidas->update(['Estado' => $request->estado, 'Comentario' => $request->comentario]);

        $materialesSalida = detalle_salida::where('IdSalida', $request->id)->get();

        foreach ($materialesSalida as $key => $value) {
            $materiales = material::find($value->IdMaterial);
            $materiales->update(["stock" => $materiales->stock + $value->Cantidad]);
        }
        
        return "ok";
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function listar()
    {

        $salidas = DB::table('salidas')
            ->select('salidas.*', 'users.name as Responsable', 'proyectosdeobras.nombre as Obra')
            ->join('users', 'users.id', '=', 'salidas.Responsable')
            ->join('proyectosdeobras', 'proyectosdeobras.id', '=', 'salidas.Obra')
            ->orderBy('users.name', 'asc')
            ->get();


        return Datatables::of($salidas)

            ->addColumn('acciones', function ($salidas) {
                $btnEstado = "";
                if ($salidas->Estado == 4) {
                    $btnEstado = '<button type="button" onclick="CambiarEstadoSalidas(' . $salidas->id . ')"class="btn btn-sm btn-outline-danger" ><i class="fas  fa-times fa-md fa-fw"></i>Anular</button>';
                }
                return $btnEstado . ' <a class="btn btn-sm btn-outline-primary" href="/salidas/detalle?id=' . $salidas->id . '"><i class="fas fa-eye fa-md fa-fw"></i>Ver Detalle</a>';
            })



            ->editColumn("Estado", function ($salidas) {
                return $salidas->Estado == 4 ? "Activa" : "Anulada";
            })


            ->rawColumns(['acciones'])
            ->make(true);
    }
}
