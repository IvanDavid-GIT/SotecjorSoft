<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class MaterialesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $materiales = DB::table('materiales')
            ->select(
                'categorias.nombre as categoria',
                'medidas.nombre as medida',
                'materiales.nombre as material',
                'materiales.stock as stockActual',
                'materiales.stockMin as stockMin'
            )
            ->join('categorias', 'materiales.categoria', '=', 'categorias.id')
            ->join('medidas', 'materiales.medida', '=', 'medidas.id')
            ->get();

        $collection = collect($materiales);

        return $collection;
    }
    public function headings(): array
    {
        return ["Categoría", "Medida", "Material", "Stock Actual", "Stock Mínimo"];
    }
}
