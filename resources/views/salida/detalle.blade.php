@extends('layout')

@section('contenido')
<div class="row">
  <div class="col">
    <div class="text-center">
      <FONT SIZE=5 style="color:#0B5466"><i class="fas fa-angle-double-up fa-fw"></i>Materiales</font>
    </div>
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr style="background: #0B5466;">
          <th class="table-th text-white text-center"> Código Salida</th>
          <th class=" table-th text-white text-center"> Categoría</th>
          <th class="table-th text-white text-center"> Nombre</th>
          <th class=" table-th text-white text-center"> Cantidad</th>
          <th class="table-th text-white text-center"> Medida</th>
        </tr>
      </thead>
      <tbody>
        @foreach($materiales as $material)
        <tr>
          <td>{{$material->CodigoSalida}}</td>
          <td>{{$material->nombrecategoria}}</td>
          <td>{{$material->nombre}}</td>
          <td>{{$material->Cantidad}}</td>
          <td>{{$material->nombremedida}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  </div>
  <div class=" text-center">
    <button type="button" data-toggle="modal" data-target="#ModalComentarioS" class="btn btn-primary"><i class="far fa-eye fa-md fa-fw"></i>Ver motivo de anulación</button>
    <a class="btn btn-secundary" href="{{route('salidas.index')}}"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
  </div>


  <div class="modal" id="ModalComentarioS" name="ModalComentarioS" aria-labelledby="ModalComentarioS" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <FONT SIZE=5 style="color:#0B5466">Motivo de anulación</font>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <textarea type="text" class="form-control" name="Comentario" readonly>{{{ $salida->Comentario }}}</textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  

  

  @endsection