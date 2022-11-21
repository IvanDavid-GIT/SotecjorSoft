@extends('layout')

@section('contenido')
<br>
<div class="row">
  <div class="col">
    <div class="text-center">
      <FONT SIZE=5 style="color:#0B5466"><i class="fas fa-archive fa-lg fa-fw"></i>Alerta Stock Mínimo</font>
    </div>
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr style="background: #0B5466;">
          <th class="table-th text-white text-center"> Categoría</th>
          <th class="table-th text-white text-center"> Nombre</th>
          <th class="table-th text-white text-center"> Stock</th>
          <th class="table-th text-white text-center"> Medida</th>
          <th class="table-th text-white text-center"> Stock Mínimo</th>
          <th class="table-th text-white text-center"> Descripción</th>
        </tr>
      </thead>
      <tbody>
        @foreach($materiales as $material)
        @if($material->stock <= $material->stockMin)
          <tr>
            <td>{{$material->categoriaNombre}}</td>
            <td>{{$material->nombre}}</td>
            <td>{{$material->stock}}</td>
            <td>{{$material->medidaNombre}}</td>
            <td>{{$material->stockMin}}</td>
            <td>{{$material->descripcion}}</td>
          </tr>
          @endif
          @endforeach
      </tbody>
    </table>
  </div>

  @endsection