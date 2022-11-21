@extends('layout')

@section('contenido')
<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Editar proyecto de obra</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="{{ route('proyectosdeobras.update',$proyectosdeobras->id) }}" method="POST" style="text-align:center">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $proyectosdeobras->nombre }}" maxlength="50" onkeyup="soloLetras(this)">
                {!! $errors->first('nombre','<large class="text-danger">:message</large><br>') !!}
            </div>

            <div class="col-4">
                <span style="color:red">*</span>
                <label>Lugar</label>
                <input type="text" class="form-control @error('lugar') is-invalid @enderror" name="lugar" value="{{ $proyectosdeobras->lugar }}" maxlength="40" onkeyup="soloLetras(this)">
                {!! $errors->first('lugar','<large class="text-danger">:message</large><br>') !!}
            </div>

            <div class="col-4">
                <span style="color:red">*</span>
                <label>Responsable</label>
                <input type="text" class="form-control @error('Responsable') is-invalid @enderror" name="Responsable" value="{{ $proyectosdeobras->Responsable }}" maxlength="50" onkeyup="soloLetras(this)">
                {!! $errors->first('Responsable','<large class="text-danger">:message</large><br>') !!}
            </div>

            <div class="col-12">
                <label>Observación</label>
                <textarea type="text" class="form-control " name="Observacion" maxlength="200">{{{ $proyectosdeobras->Observacion }}}</textarea>
                
            </div>

            <input type="text" class="form-control @error('estado') is-invalid @enderror " name="estado" value="5" hidden>
        </div>
    </div>
    <div class="center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Editar</button>
        <a class="btn btn-secundary" href="{{route('proyectosdeobras.index')}}"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
    </div>
</form>
@endsection