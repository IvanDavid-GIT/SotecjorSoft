<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\material; //Incluir el modelo en el contralador
use App\Models\entrada;
use App\Models\detalle_entrada;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use DataTables;


class entradaController extends Controller
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

        return view('entrada.index');
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

        return view('entrada.create', compact('users', 'materiales'));
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

            'CodigoEntrada' => ['required', 'unique:entradas,CodigoEntrada'],
            'Descripcion' => ['required'],
            'Responsable' => ['required'],
        ]);

        $datos = $request->all();
        try {
            DB::beginTransaction();
            $entrada = entrada::create([
                "CodigoEntrada" => $datos["CodigoEntrada"],
                "FechaCreacion" => $datos["FechaCreacion"],
                "Descripcion" => $datos["Descripcion"],
                "Responsable" => $datos["Responsable"],
                "estado" => $datos["estado"],
            ]);

            foreach ($datos["IdMaterial"] as $key => $value) {
                detalle_entrada::create([
                    "IdMaterial" => $value,
                    "IdEntrada" => $entrada->id,
                    "CodigoEntrada" => $datos["CodigoEntrada"],
                    "Cantidad" => $datos["Cantidad"][$key]
                ]);

                $mat = material::find($value);
                $mat->update(["stock" => $mat->stock + $datos["Cantidad"][$key]]);
            }

            DB::commit();
            return redirect()->route('entradas.index')->with('status', '1');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('entradas.index')->with('status', $e->getMessage());
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

        $entrada = entrada::findOrFail($id);

        $materiales = [];
        if ($id != null) {
            $materiales = material::select("materiales.*", "detalle_entrada.*", "categorias.nombre as nombrecategoria", "medidas.nombre as nombremedida")
                ->join("detalle_entrada", "materiales.id", "=", "detalle_entrada.IdMaterial")
                ->join('categorias', 'materiales.categoria', '=', 'categorias.id')
                ->join('medidas', 'materiales.medida', '=', 'medidas.id')
                ->where("detalle_entrada.IdEntrada", $id)
                ->get();
        }


        //Retornar a la vista el objeto que se va a editar
        return view('entrada.detalle', compact('materiales', 'id','entrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function updateState(Request $request)
    {

        $entradas = entrada::find($request->id);
        if ($entradas == null) {

            return redirect("/entradas/index");
        }
        //actualizacion de estado
        $entradas->update(['estado' => $request->estado, 'Comentario' => $request->comentario]);


        $materialesEntrada = detalle_entrada::where('IdEntrada', $request->id)->get();

        foreach ($materialesEntrada as $key => $value) {
            $materiales = material::find($value->IdMaterial);
            $materiales->update(["stock" => $materiales->stock - $value->Cantidad]);
        }

        return "ok";
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function listar(Request $request)
    {



        $entradas = DB::table('entradas')
            ->select('entradas.*', 'users.name as Responsable')
            ->join('users', 'users.id', '=', 'entradas.Responsable')
            ->orderBy('users.name', 'asc')
            ->get();


        return Datatables::of($entradas)

            ->addColumn('acciones', function ($entradas) {
                $btnEstado = "";
                if ($entradas->estado == 4) {
                    $btnEstado = '<button type="button" onclick="CambiarEstadoEntradas(' . $entradas->id . ')"class="btn btn-sm btn-outline-danger" ><i class="fas  fa-times fa-md fa-fw"></i>Anular</button>';
                }
                return $btnEstado . ' <a class="btn btn-sm btn-outline-primary" href="/entradas/detalle?id=' . $entradas->id . '"><i class="fas  fa-eye fa-md fa-fw"></i>Ver Detalle</a>';
            })



            ->editColumn("estado", function ($entradas) {
                return $entradas->estado == 4 ? "Activa" : "Anulada";
            })


            ->rawColumns(['acciones'])
            ->make(true);
    }
}
