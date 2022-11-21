@extends('layout')

@section('contenido')
<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Registrar medida</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="{{ route('medidas.store') }}" method="POST" style="text-align:center">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <span style="color:red">*</span>
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{old('nombre')}}" maxlength="20" onkeyup="soloLetras(this)">
                {!! $errors->first('nombre','<large class="text-danger">:message</large><br>') !!}
            </div>
            <input type="text" class="form-control @error('estado') is-invalid @enderror " name="estado" value="1" hidden>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Registrar</button>
    <a class="btn btn-secundary" href="{{route('medidas.index')}}"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
</form>
@endsection