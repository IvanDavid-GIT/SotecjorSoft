<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proyectodeobra; //Incluir el modelo en el contralador
use App\Models\User;
use Illuminate\Support\Facades\DB;
use DataTables;


class proyectodeobraController extends Controller
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
        $proyectosdeobras = proyectodeobra::all();
        return view("proyectosdeobras.index", compact('proyectosdeobras'));
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
        return view('proyectosdeobras.create');
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

            'nombre' => ['required', 'unique:proyectosdeobras,nombre'],
            'lugar' => ['required'],
            'Responsable' => ['required']
        ]);



        proyectodeobra::create($request->all()); //Registrar en la base de datos
        return redirect()->route('proyectosdeobras.index')->with('status', '1');
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

        $proyectosdeobras = proyectodeobra::find($id);
        if ($proyectosdeobras == null) {
            return redirect("/proyectosdeobras");
        }
        return view("proyectosdeobras.edit", compact('proyectosdeobras'));
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
        $proyectosdeobras = proyectodeobra::findOrFail($id);

        request()->validate([

            'nombre' => ['required', $proyectosdeobras->nombre != $request->nombre ? 'unique:proyectosdeobras,nombre' : ''],
            'lugar' => ['required'],
            'Responsable' => ['required']

        ]);

        //Actualizar los datos de los atributos a editar con los datos enviados desde el formulario
        $proyectosdeobras->nombre = $request->nombre;
        $proyectosdeobras->lugar = $request->lugar;
        $proyectosdeobras->Observacion = $request->Observacion;
        $proyectosdeobras->Responsable = $request->Responsable;
        $proyectosdeobras->estado = $request->estado;



        //Realizar la modificación en DB
        $proyectosdeobras->update();

        //Redirigir hacia el método index del controlador.
        return redirect()->route('proyectosdeobras.index')->with('status', '2');
    }

    public function updateState($id, $estado)
    {
        $proyectosdeobras = proyectodeobra::find($id);
        if ($proyectosdeobras == null) {
            //messagge
            return redirect("/proyectosdeobras/index");
        }
        //actualizacion de estado
        $proyectosdeobras->update(['estado' => $estado]);
        //messagge
        return redirect("/proyectosdeobras/index")->with('status', '3');
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
        $proyectosdeobras = proyectodeobra::findOrFail($id);

        //Eliminar el registro
        $proyectosdeobras->delete();

        //Redireccionar hacia la vista con el listado
        return redirect("/proyectosdeobras/index");
    }

    public function listar()
    {

        $proyectosdeobras = proyectodeobra::all();


        return Datatables::of($proyectosdeobras)

            ->addColumn('acciones', function ($proyectosdeobras) {
                $btnEstado = "";
                if ($proyectosdeobras->estado == 5) {
                    $btnEstado = '<form name="frmEstado" id="frmEstado' . $proyectosdeobras->id . '" action="/proyectosdeobras/cambiar/estado/' . $proyectosdeobras->id . '/6" method="GET" >
                <button type="button" onclick="CambiarEstado(' . $proyectosdeobras->id . ')"class="btn btn-sm btn-outline-danger" ><i class="fas fa-store-alt-slash fa-md fa-fw"></i>Cerrar</button>
                </form>';
                    return $btnEstado . ' <a class="btn btn-sm btn-outline-primary" href="/proyectosdeobras/edit/' . $proyectosdeobras->id . '"> <i class="fas fa-edit fa-md fa-fw"></i>Editar</a>';
                }
            })



            ->editColumn("estado", function ($proyectosdeobras) {
                return $proyectosdeobras->estado == 5 ? "Abierto" : "Cerrado";
            })


            ->rawColumns(['acciones'])
            ->make(true);
    }
}
