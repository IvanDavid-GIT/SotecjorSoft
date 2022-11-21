<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\material; //Incluir el modelo en el contralador
use Illuminate\Support\Facades\DB;
use App\Models\categoria;
use App\Models\medida;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactivo');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = DB::table('materiales')
            ->select('materiales.stock', 'materiales.stockMin', 'materiales.nombre', 'materiales.descripcion', 'categorias.nombre as categoriaNombre', 'medidas.nombre as medidaNombre')
            ->join('categorias', 'materiales.categoria', '=', 'categorias.id')
            ->join('medidas', 'materiales.medida', '=', 'medidas.id')
            ->get();

        return view('dashboard.index', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }
}
