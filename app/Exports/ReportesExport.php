<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $FInicio;
    private $FFin;

    public function __construct($FInicio, $FFin, $TipoReporte)
    {
        $this->FInicio = $FInicio;
        $this->FFin = $FFin;
        $this->TipoReporte = $TipoReporte;
    }


    public function collection()
    {
        if ($this->TipoReporte == 1) {

            $entrada = DB::table('materiales')
                ->select(
                    'entradas.CodigoEntrada as entrada',
                    'categorias.nombre as categoria',
                    'medidas.nombre as medida',
                    'materiales.nombre as material',
                    'detalle_entrada.cantidad',
                    DB::raw('CONCAT(users.name, " ", users.apellidos) AS responsable'),
                    'estados.nombre as estadoEntrada',
                    'entradas.FechaCreacion'
                )
                ->join('categorias', 'materiales.categoria', '=', 'categorias.id')
                ->join('medidas', 'materiales.medida', '=', 'medidas.id')
                ->join('detalle_entrada', 'materiales.id', '=', 'detalle_entrada.IdMaterial')
                ->join('entradas', 'detalle_entrada.IdEntrada', '=', 'entradas.id')
                ->join('estados', 'entradas.estado', '=', 'estados.id')
                ->join('users', 'entradas.Responsable', '=', 'users.id')
                ->whereBetween('entradas.FechaCreacion', [$this->FInicio, $this->FFin])
                ->get();

            $collection = collect($entrada);
        }else{
            $salida = DB::table('materiales')
                ->select(
                    'salidas.CodigoSalida as salida',
                    'categorias.nombre as categoria',
                    'medidas.nombre as medida',
                    'materiales.nombre as material',
                    'detalle_salida.cantidad',
                    'proyectosdeobras.nombre as obra',
                    DB::raw('CONCAT(users.name, " ", users.apellidos) AS responsable'),
                    'estados.nombre as estadoSalida',
                    'salidas.FechaSalida'
                )
                ->join('categorias', 'materiales.categoria', '=', 'categorias.id')
                ->join('medidas', 'materiales.medida', '=', 'medidas.id')
                ->join('detalle_salida', 'materiales.id', '=', 'detalle_salida.IdMaterial')
                ->join('salidas', 'detalle_salida.IdSalida', '=', 'salidas.id')
                ->join('proyectosdeobras', 'salidas.Obra', '=', 'proyectosdeobras.id')
                ->join('estados', 'salidas.estado', '=', 'estados.id')
                ->join('users', 'salidas.Responsable', '=', 'users.id')
                ->whereBetween('salidas.FechaSalida', [$this->FInicio, $this->FFin])
                ->get();

            $collection = collect($salida);
        }

        return $collection;
    }

    public function headings(): array
    {
        if ($this->TipoReporte == 1) {
            return ["Código Entrada", "Categoría", "Medida", "Material", "Cantidad Entrada", "Responsable", "Estado Entrada", "Fecha Creación"];
        }else{
            return ["Código Salida", "Categoría", "Medida", "Material", "Cantidad Salida", "Proyecto de Obra","Responsable", "Estado Salida", "Fecha Creación"];
        }
       
    }
}
