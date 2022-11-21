@extends('layout')

@section('contenido')
<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Editar material</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="{{ route('material.update',$materiales->id) }}" method="POST" style="text-align:center">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class=" col-6">
                <span style="color:red">*</span>
                <label>Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror " name="nombre" value="{{ $materiales->nombre }}" maxlength="20" onkeyup="soloLetras(this)">
                {!! $errors->first('nombre','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class=" col-6">
                <span style="color:red">*</span>
                <label>Categoría</label>
                <select name="categoria" class="form-control @error('categoria') is-invalid @enderror " id="">

                    @foreach($categorias as $categoria)
                    @if ($categoria->estado != 0)
                    <option @if($materiales->categoria == $categoria->id ) selected @endif value="{{$categoria->id}}" {{old('categoria') == $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class=" col-6">
                <span style="color:red">*</span>
                <label>Medida</label>
                <select name="medida" class="form-control @error('medida') is-invalid @enderror " id="">

                    @foreach($medidas as $medida)
                    @if ($medida->estado != 0)
                    <option @if($materiales->medida == $medida->id ) selected @endif value="{{$medida->id}}" {{ old('medida') == $medida->id ? 'selected' : '' }}>{{$medida->nombre}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class=" col-6">
                <span style="color:red">*</span>
                <label for="stockMin">Stock Mínimo</label>
                <input type="number" class="form-control @error('stockMin') is-invalid @enderror " name="stockMin" id="stockMin" value="{{ $materiales->stockMin }}" onKeyPress="if(this.value.length==11) return false;">
                {!! $errors->first('stockMin','<large class="text-danger">:message</large><br>') !!}
            </div>


            <div class="col-12">
                <span style="color:red">*</span>
                <label>Descripción</label>
                <textarea type="text" class="form-control @error('descripcion') is-invalid @enderror " name="descripcion" maxlength="200">{{{ $materiales->descripcion }}}</textarea>
                {!! $errors->first('descripcion','<large class="text-danger">:message</large><br>') !!}
            </div>
        </div>
    </div>
    <div class="center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Editar</button>
        <a class="btn btn-secundary" href="{{route('material.index')}}"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
    </div>
</form>
@endsection