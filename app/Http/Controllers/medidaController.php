<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medida; //Incluir el modelo en el contralador
use Illuminate\Support\Facades\DB;
use PDF;
use DataTables;


class medidaController extends Controller
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




    public function index()
    {
        $medidas = medida::all();
        return view("materiales.medidas.index", compact('medidas'));
    }
    /*
    public function imprimir()
    {
        $materiales = \DB::table('materiales')
        ->select('materiales.*')
        ->orderBy('nombre','asc')
        ->take(10)
        ->get();
        $fecha = date('y-m-d');
        $data = compact('materiales','fecha');
        $pdf = PDF::loadView('pdf.reporte_materiales', $materiales);
        return $pdf->stream();
    }
*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Mostrar la vista para editar
    {

        return view('materiales.medidas.create');
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

            'nombre' => ['required', 'unique:medidas,nombre'],
        ]);



        medida::create($request->all()); //Registrar en la base de datos
        return redirect()->route('medidas.index')->with('status', '1');
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
    public function edit($id)
    {
        $medidas = medida::find($id);
        if ($medidas == null) {
            return redirect("/medidas");
        }
        return view("materiales.medidas.edit", compact("medidas"));
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
        $medidas = medida::findOrFail($id);

        request()->validate([

            'nombre' => ['required', $medidas->nombre != $request->nombre ? 'unique:medidas,nombre' : ''],
        ]);

        //Actualizar los datos de los atributos a editar con los datos enviados desde el formulario
        $medidas->nombre = $request->nombre;



        //Realizar la modificación en DB
        $medidas->update();

        //Redirigir hacia el método index del controlador.
        return redirect()->route('medidas.index')->with('status', '2');
    }

    public function updateState($id, $estado)
    {
        $medidas = medida::find($id);
        if ($medidas == null) {
            //messagge
            return redirect("/medidas/index");
        }
        //actualizacion de estado
        $medidas->update(['estado' => $estado]);
        //messagge
        return redirect("/medidas/index")->with('status', '3');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Buscar el registro a eliminar.
        $medidas = medida::findOrFail($id);

        //Eliminar el registro
        $medidas->delete();

        //Redireccionar hacia la vista con el listado
        return redirect("/medidas/index");
    }

    public function listar(Request $request)
    {

        $medidas = medida::all();


        return Datatables::of($medidas)

            ->addColumn('acciones', function ($medidas) {
                $btnEstado = "";
                if ($medidas->estado == 1) {
                    $btnEstado = '<form name="frmEstado" id="frmEstado' . $medidas->id . '" action="/medidas/cambiar/estado/' . $medidas->id . '/2" method="GET" >
                <button type="button" onclick="CambiarEstado(' . $medidas->id . ')"class="btn btn-sm btn-outline-danger" ><i class="fas  fa-times fa-md fa-fw"></i>Inactivar</button>
                </form>';
                } else if ($medidas->estado == 2) {
                    $btnEstado = '<form name="frmEstado" id="frmEstado' . $medidas->id . '" action="/medidas/cambiar/estado/' . $medidas->id . '/1" method="GET" >
                <button type="button" onclick="CambiarEstado(' . $medidas->id . ')"class="btn btn-sm btn-outline-success" ><i class="fas  fa-check fa-md fa-fw"></i>Activar</button>
                </form>';
                }

                return $btnEstado . ' <a class="btn btn-sm btn-outline-primary" href="/medidas/edit/' . $medidas->id . '"><i class="fas  fa-edit fa-md fa-fw"></i> Editar</a>';
            })



            ->editColumn("estado", function ($medidas) {
                return $medidas->estado == 1 ? "Activo" : "Inactivo";
            })


            ->rawColumns(['acciones'])
            ->make(true);
    }
}
