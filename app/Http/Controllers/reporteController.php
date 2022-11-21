<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ReportesExport;
use App\Exports\MaterialesExport;
use Maatwebsite\Excel\Facades\Excel;

class reporteController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index()
    {
        return view("reporte.index");
    }

    // public function MaterialByDate(){
    //     $reportType =reporte::all();
    //     $from =reporte::all();
    //     if($reportType->reportType == 0){
    //         $from = Carbon::parse(Carbon::now())->format('y-m-d') . '00:00:00';
    //     }
    //     return;
    // }





    public function export(Request $request)
    {
        request()->validate([

            'FechaInicio' => ['required'],
            'FechaFin' => ['required'],
            'TipoReporte' => ['required'],

        ]);

        if ($request->TipoReporte == 1) {
            return Excel::download(new ReportesExport($request->FechaInicio, $request->FechaFin, $request->TipoReporte), 'ReporteEntradasSotecjor.xlsx');
        } else {
            return Excel::download(new ReportesExport($request->FechaInicio, $request->FechaFin, $request->TipoReporte), 'ReporteSalidasSotecjor.xlsx');
        }
    }

    public function exportM()
    {
        return Excel::download(new MaterialesExport(), 'ReporteMaterialesSotecjor.xlsx');
    }
}
