<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\material; //Incluir el modelo en el contralador
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\categoria;
use App\Models\medida;
use DataTables;


class materialController extends Controller
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


        //Listar 
        //$materiales = material::all();
        return view('materiales.index'); //Retornar a la vista el array 
    }

    public function obtenerCantidad($id)
    {
        $cantidad = DB::table('materiales')
            ->select('materiales.stock')
            ->where('materiales.id', $id)
            ->get();


        return $cantidad;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Mostrar la vista para editar
    {
        $categorias = categoria::all();
        $medidas = medida::all();
        return view('materiales.create', compact('categorias', 'medidas'));
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

            'nombre' => ['required', 'unique:materiales,nombre'],
            'categoria' => ['required'],
            'medida' => ['required'],
            'descripcion' => ['required'],
            'stockMin' => ['required']
        ]);

        material::create($request->all()); //Registrar en la base de datos
        return redirect()->route('material.index')->with('status', '1');;
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
        //Buscar el registro a editar
        $materiales = material::findOrFail($id);

        $categorias = DB::table('categorias')
            ->select('categorias.*')
            ->get();

        $medidas = DB::table('medidas')
            ->select('medidas.*')
            ->get();


        //Retornar a la vista el objeto que se va a editar
        return view('materiales.edit', compact('materiales', 'categorias', 'medidas'));
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
        $materiales = material::findOrFail($id);

        request()->validate([

            'nombre' => ['required', $materiales->nombre != $request->nombre ? 'unique:materiales,nombre' : ''],
            'categoria' => ['required'],
            'medida' => ['required'],
            'descripcion' => ['required'],
            'stockMin' => ['required']
        ]);

        //Actualizar los datos de los atributos a editar con los datos enviados desde el formulario
        $materiales->nombre = $request->nombre;
        $materiales->categoria = $request->categoria;
        $materiales->medida = $request->medida;
        $materiales->descripcion = $request->descripcion;
        $materiales->stockMin = $request->stockMin;



        //Realizar la modificación en DB
        $materiales->update();

        //Redirigir hacia el método index del controlador.
        return redirect()->route('material.index')->with('status', '2');;
    }

    public function updateState($id, $Estado)
    {
        $material = material::find($id);
        if ($material == null) {
            //messagge
            return redirect("/material/index");
        }
        //actualizacion de estado
        $material->update(['Estado' => $Estado]);
        //messagge
        return redirect("/material/index")->with('status', '3');
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
        $materiales = material::findOrFail($id);

        //Eliminar el registro
        $materiales->delete();

        //Redireccionar hacia la vista con el listado
        return redirect()->route('material.index');
    }

    public function listar(Request $request)
    {

        $material = DB::table('materiales')
            ->select('materiales.*', 'categorias.nombre as categoriaNombre', 'medidas.nombre as medidaNombre')
            ->join('categorias', 'materiales.categoria', '=', 'categorias.id')
            ->join('medidas', 'materiales.medida', '=', 'medidas.id')
            ->orderBy('materiales.nombre', 'asc')
            ->get();


        return Datatables::of($material)

            ->addColumn('acciones', function ($material) {
                $btnEstado = "";
                if ($material->Estado == 1) {
                    $btnEstado = '<form name="frmEstado" id="frmEstado' . $material->id . '" action="/material/cambiar/estado/' . $material->id . '/2" method="GET" >
                <button type="button" onclick="CambiarEstado(' . $material->id . ')"class="btn btn-sm btn-outline-danger" ><i class="fas  fa-times fa-md fa-fw"></i>Inactivar</button>
                </form>';
                } else if ($material->Estado == 2) {
                    $btnEstado = '<form name="frmEstado" id="frmEstado' . $material->id . '" action="/material/cambiar/estado/' . $material->id . '/1" method="GET" >
                <button type="button" onclick="CambiarEstado(' . $material->id . ')"class="btn btn-sm btn-outline-success" ><i class="fas  fa-check fa-md fa-fw"></i>Activar</button>
                </form>';
                }

                return $btnEstado . ' <a class="btn btn-sm btn-outline-primary" href="/material/edit/' . $material->id . '"> <i class="fas  fa-edit fa-md fa-fw"></i>Editar</a>';
            })



            ->editColumn("estado", function ($material) {
                return $material->Estado == 1 ? "Activo" : "Inactivo";
            })


            ->rawColumns(['acciones'])
            ->make(true);
    }
}
