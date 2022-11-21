<?php

namespace App\Http\Controllers;

use App\Models\tipodocumento;
use App\Models\roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DataTables;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('inactivo');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposdocumentos = tipodocumento::all();
        $rol = roles::all();
        return view('users.create', compact('tiposdocumentos', 'rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();

        request()->validate([

            'name' => ['required'],
            'apellidos' => ['required'],
            'id_rol' => ['required',],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'id_tipo_documento' => ['required'],
            'numero_documento' => ['required', 'unique:users,numero_documento'],
            'telefono' => ['required'],
            'direccion' => ['required', 'max:255'],
        ]);

        $users->fill([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'id_rol' => $request->id_rol,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_tipo_documento' => $request->id_tipo_documento,
            'numero_documento' => $request->numero_documento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'estado' => $request->estado,
        ])->save();


        return redirect()->route('usuario.index')->with('status', '1');
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
        $users = User::findOrFail($id);

        $rol = DB::table('roles')
            ->select('roles.*')
            ->get();

        $tiposdocumentos = DB::table('tipodocumentos')
            ->select('tipodocumentos.*')
            ->get();

        return view('users.edit', compact('users', 'rol', 'tiposdocumentos'));
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
        $rol = roles::all();
        $users = User::findOrFail($id);

        request()->validate([

            'name' => ['required'],
            'apellidos' => ['required'],
            'id_rol' => ['required',],
            'email' => ['required', 'email', $users->email != $request->email ? 'unique:users,email' : ''],
            'password' => ['required', 'min:8'],
            'id_tipo_documento' => ['required'],
            'numero_documento' => ['required', $users->numero_documento != $request->numero_documento ? 'unique:users,numero_documento' : ''],
            'telefono' => ['required'],
            'direccion' => ['required', 'max:255'],
        ]);

        $users->id_rol = $request->id_rol;
        $users->name = $request->name;
        $users->apellidos = $request->apellidos;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->id_tipo_documento = $request->id_tipo_documento;
        $users->numero_documento = $request->numero_documento;
        $users->telefono = $request->telefono;
        $users->direccion = $request->direccion;
        $users->estado = $request->estado;




        $users->update();
        return redirect()->route('usuario.index', compact('rol'))->with('status', '2');
    }


    public function updateState($id, $estado)
    {
        $user = User::find($id);
        if ($user == null) {
            //messagge
            return redirect("/usuario/index");
        }
        //actualizacion de estado
        $user->update(['estado' => $estado]);
        //messagge
        return redirect("/usuario/index")->with('status', '3');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('usuario.index');
    }



    public function listar()
    {

        $user = DB::table('users')
            ->select('users.*', 'tipodocumentos.nombre as nombretipodocumento', 'roles.nombre as nombrerol')
            ->join('tipodocumentos', 'tipodocumentos.id', '=', 'users.id_tipo_documento')
            ->join('roles', 'roles.id', '=', 'users.id_rol')
            ->orderBy('users.name', 'asc')
            ->get();


        return Datatables::of($user)

            ->addColumn('acciones', function ($user) {
                $btnEstado = "";
                if ($user->estado == 1) {
                    $btnEstado = '<form name="frmEstado" id="frmEstado' . $user->id . '" action="/usuario/cambiar/estado/' . $user->id . '/2" method="GET" >
                <button type="button" onclick="CambiarEstado(' . $user->id . ')"class="btn btn-sm btn-outline-danger" ><i class="fas  fa-times fa-md fa-fw"></i>Inactivar</button>
                </form>';
                } else if ($user->estado == 2) {
                    $btnEstado = '<form name="frmEstado" id="frmEstado' . $user->id . '" action="/usuario/cambiar/estado/' . $user->id . '/1" method="GET" >
                <button type="button" onclick="CambiarEstado(' . $user->id . ')"class="btn btn-sm btn-outline-success" ><i class="fas  fa-check fa-md fa-fw"></i>Activar</button>
                </form>';
                }

                return $btnEstado . ' <a class="btn btn-sm btn-outline-primary" href="/usuario/edit/' . $user->id . '"> <i class="fas  fa-edit fa-md fa-fw"></i>Editar</a>';
            })



            ->editColumn("estado", function ($user) {
                return $user->estado == 1 ? "Activo" : "Inactivo";
            })


            ->rawColumns(['acciones'])
            ->make(true);
    }
}
