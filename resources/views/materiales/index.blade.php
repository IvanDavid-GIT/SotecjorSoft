@extends('layout')

@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection


@section('contenido')
<br>
<div class="text-center" style="margin-left: 250px;">

  <FONT SIZE=5 style="color:#0B5466">Materiales</font>

  <a href="{{ route('medidas.index') }}" title="CrearMedida" class="float-right btn btn-outline-info">
    <i class="fas fa-weight-hanging fa-lg fa-fw"></i>Medidas</a>

  <a href="{{ route('material.create') }}" title="Crear" class="float-right btn btn-outline-primary"><i class="fas fa-plus fa-md fa-fw"></i>Registrar</a>
</div>
<div class="text-center">
  @if (session('status'))
  @if (session('status') =='1')
  <div class="alert alert-success" id="DivRegistro">
    ¡Registro Exitoso!
  </div>
  @elseif (session('status') =='2')
  <div class="alert alert-success" id="DivModificar">
    ¡Modificación Exitosa!
  </div>
  @elseif (session('status') =='3')
  <div class="alert alert-success" id="DivEstado">
    ¡Cambio Exitoso!
  </div>

  @else
  <div class="alert alert-danger">{{session('status')}}
  </div>
  @endif
  @endif
</div>

<div class="row">
  <div class="col-xl-6">
  </div>
</div>
<div class="table-responsive">
  <table class="table table-bordered table-striped " id="materials">
    <thead class="text-white" style="background:#0B5466">
      <th class="table-th text-white text-center"> Categoria</th>
      <th class="table-th text-white text-center"> Nombre</th>
      <th class="table-th text-white text-center"> Stock</th>
      <th class="table-th text-white text-center"> Medida</th>
      <th class="table-th text-white text-center"> Stock Mínimo</th>
      <th class="table-th text-white text-center"> Descripción</th>
      <th class="table-th text-white text-center"> Estado</th>
      <th class="table-th text-white text-center"> Acciones</th>

    </thead>
  </table>
</div>



@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
  $('#materials').DataTable({
    reponsive: true,
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: '/material/listar',
    columns: [{
        data: 'categoriaNombre',
        name: 'categoriaNombre'
      },
      {
        data: 'nombre',
        name: 'nombre'
      },
      {
        data: 'stock',
        name: 'stock'
      },
      {
        data: 'medidaNombre',
        name: 'medidaNombre'
      },
      {
        data: 'stockMin',
        name: 'stockMin'
      },
      {
        data: 'descripcion',
        name: 'descripcion'
      },
      {
        data: 'estado',
        name: 'estado'
      },
      {
        data: 'acciones',
        name: 'acciones',
        orderable: false,
        searchable: false
      }



    ],
    "lengthMenu": [
      [5, 10, 50, -1],
      [5, 10, 50, "Todos"]
    ],
    "language": {
      "lengthMenu": "Mostrar _MENU_ Registros por Pagina",
      "zeroRecords": "No se encontro ningun archivo",
      "info": "Mostrando _PAGE_ de _PAGES_ paginas",
      "infoEmpty": "No records available",
      "infoFiltered": "(Filtrado de _MAX_ registros Totales)",
      "search": "Buscar",
      "paginate": {
        "next": "siguiente",
        "previous": "Anterior"
      }


    }
  });
</script>
<!-- cambio -->

<!-- aqui -->
@endsection