<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria; //Incluir el modelo en el contralador
use Illuminate\Support\Facades\DB;
use Exception;
use DataTables;

use Phalcon\Flash\Direct; //libreria de mensajes

class categoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactivo');
    }




    //metodo principal
    public function index()
    {

        return view("categoria.index");
    }


    //metodo de crear
    public function create()
    {
        return view('categoria.create');
    }

    //metodo de guardar
    public function store(Request $request)
    {
        request()->validate([

            'nombre' => ['required', 'unique:categorias,nombre'],
        ]);



        categoria::create($request->all()); //Registrar en la base de datos
        return redirect()->route('categoria.index')->with('status', '1');
    }


    //metodo de editar
    public function edit($id)
    {
        $categoria = categoria::find($id);
        if ($categoria == null) {
            return redirect("/categoria");
        }
        return view("categoria.edit", compact("categoria"));
    }


    //metodo de Actualizacion
    public function update(Request $request, $id)
    {

        //Buscar el registro a editar
        $categorias = categoria::findOrFail($id);

        request()->validate([

            'nombre' => ['required', $categorias->nombre != $request->nombre ? 'unique:categorias,nombre' : ''],

        ]);

        //Actualizar los datos de los atributos a editar con los datos enviados desde el formulario
        $categorias->nombre = $request->nombre;
        $categorias->estado = $request->estado;



        //Realizar la modificación en DB
        $categorias->update();

        //Redirigir hacia el método index del controlador.
        return redirect()->route('categoria.index')->with('status', '2');
    }



    //metodo de cambio de estado
    public function updateState($id, $estado)
    {
        $categoria = categoria::find($id);
        if ($categoria == null) {
            //messagge
            return redirect("/categoria/index");
        }
        //actualizacion de estado
        $categoria->update(['estado' => $estado]);
        //messagge
        return redirect("/categoria/index")->with('status', '3');
    }


    public function destroy($id)
    {

        //Buscar el registro a eliminar.
        $categoria = categoria::findOrFail($id);

        //Eliminar el registro
        $categoria->delete();

        //Redireccionar hacia la vista con el listado
        return redirect("/categoria/index");
    }


    public function listar(Request $request)
    {

        $categoria = categoria::all();


        return Datatables::of($categoria)

            ->addColumn('acciones', function ($categoria) {
                $btnEstado = "";
                if ($categoria->estado == 1) {
                    $btnEstado = '<form name="frmEstado" id="frmEstado' . $categoria->id . '" action="/categoria/cambiar/estado/' . $categoria->id . '/2" method="GET" >
                <button type="button" onclick="CambiarEstado(' . $categoria->id . ')"class="btn btn-sm btn-outline-danger" ><i class="fas  fa-times fa-md fa-fw"></i>Inactivar</button>
                </form>';
                } else if ($categoria->estado == 2) {
                    $btnEstado = '<form name="frmEstado" id="frmEstado' . $categoria->id . '" action="/categoria/cambiar/estado/' . $categoria->id . '/1" method="GET" >
                <button type="button" onclick="CambiarEstado(' . $categoria->id . ')"class="btn btn-sm btn-outline-success" ><i class="fas fa-check fa-md fa-fw"></i>Activar</button>
                </form>';
                }

                return $btnEstado . ' <a class="btn btn-sm btn-primary" href="/categoria/edit/' . $categoria->id . '"><i class="fas fa-edit fa-md fa-fw"></i>Editar</a>';
            })



            ->editColumn("estado", function ($categoria) {
                return $categoria->estado == 1 ? "Activo" : "Inactivo";
            })


            ->rawColumns(['acciones'])
            ->make(true);
    }
}
