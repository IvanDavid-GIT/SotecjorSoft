@extends('layout')

@section('contenido')
<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Editar usuario</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="{{ route('usuario.update',$users->id) }}" method="POST" style="text-align:center">
    @csrf
    <div class="card-body">
        <div class="row">

            <div class="col-4">
                <span style="color:red">*</span>
                <label>Rol</label>
                <select name="id_rol" class="form-control @error('email') is-invalid @enderror" id="">

                    @foreach($rol as $roles)
                    <option @if($users->id_rol == $roles->id ) selected @endif value="{{$roles->id}}" {{ old('id_rol') == $roles->id ? 'selected' : '' }}>{{$roles->nombre}}</option>
                    @endforeach
                </select>
                {!! $errors->first('id_rol','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Nombres</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name }}">
                {!! $errors->first('name','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Apellidos</label>
                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ $users->apellidos }}">
                {!! $errors->first('apellidos','<large class="text-danger">:message</large><br>') !!}
            </div>
            <br />
            <br />
            <br />
            <br />
            <div class="col-6">
                <span style="color:red">*</span>
                <label>Correo electrónico</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}">
                {!! $errors->first('email','<large class="text-danger">:message</large><br>') !!}
            </div>

            <input type="text" class="form-control" name="password" value="{{ $users->password }}" hidden>
            <div class="col-2">
                <span style="color:red">*</span>
                <label>Tipo documento</label>
                <select name="id_tipo_documento" class="form-control @error('id_tipo_documento') is-invalid @enderror" id="">
                    @foreach($tiposdocumentos as $tipodocumento)

                    <option @if($users->id_tipo_documento == $tipodocumento->id) selected @endif value="{{$tipodocumento->id}}" {{ old('id_tipo_documento') == $tipodocumento->id ? 'selected' : '' }}>{{$tipodocumento->nombre}}</option>

                    @endforeach
                </select>
                {!! $errors->first('id_tipo_documento','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Número documento</label>
                <input type="text" class="form-control @error('numero_documento') is-invalid @enderror" name="numero_documento" value="{{ $users->numero_documento }}">
                {!! $errors->first('numero_documento','<large class="text-danger">:message</large><br>') !!}
            </div>
            <br />
            <br />
            <br />
            <br />
            <div class="col-6">
                <span style="color:red">*</span>
                <label>Teléfono</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $users->telefono }}">
                {!! $errors->first('telefono','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-6">
                <span style="color:red">*</span>
                <label>Dirección</label>
                <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ $users->direccion }}">
                {!! $errors->first('direccion','<large class="text-danger">:message</large><br>') !!}
            </div>
            <input type="text" class="form-control @error('estado') is-invalid @enderror " name="estado" value="{{ $users->estado }}" hidden>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Editar</button>
    <a class="btn btn-secundary" href="{{route('usuario.index')}}"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
</form>
@endsection