@extends('layout')

@section('contenido')

<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Registrar usuario</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="{{ route('usuario.store') }}" method="POST" style="text-align:center">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Rol</span>
                <select name="id_rol" class="form-control @error('id_rol') is-invalid @enderror" id="">
                    <option value="">Seleccione el rol</option>
                    @foreach($rol as $roles)
                    @if ($roles->estado != 2)
                    <option value="{{$roles->id}}" {{ old('id_rol') == $roles->id ? 'selected' : '' }}>{{$roles->nombre}}</option>
                    @endif
                    @endforeach
                </select>
                {!! $errors->first('id_rol','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Nombres</span>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ingrese los nombres" value="{{old('name')}}" maxlength="30" onkeyup="soloLetras(this)">
                {!! $errors->first('name','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Apellidos</span>
                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" placeholder="Ingrese los apellidos" value="{{old('apellidos')}}" maxlength="40" onkeyup="soloLetras(this)">
                {!! $errors->first('apellidos','<large class="text-danger">:message</large><br>') !!}
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Correo electrónico</span>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingrese el correo electronico" value="{{old('email')}}" maxlength="40">
                {!! $errors->first('email','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Contraseña</span>
                <div class="input-group">
                    <input id="txtPassword" type="Password" name="password" placeholder="Mínimo 8 caracteres" class="form-control @error('password') is-invalid @enderror" maxlength="20">
                    <div class="input-group-append">
                        <span><button id="show_password" class="btn btn" type="button" onclick="mostrarPassword()" style="background: rgb(42 63 84)"><span class="fa fa-eye-slash icon" style="color:white"></span> </button></span>
                    </div>
                </div>
                {!! $errors->first('password','<large class="text-danger">:message</large><br>') !!}

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Tipo documento</span>
                <select name="id_tipo_documento" class="form-control @error('id_tipo_documento') is-invalid @enderror" id="">
                    <option value="">Seleccione tipo de documento</option>
                    @foreach($tiposdocumentos as $tipodocumento)
                    <option value="{{$tipodocumento->id}}" {{ old('id_tipo_documento') == $tipodocumento->id ? 'selected' : '' }}>{{$tipodocumento->nombre}}</option>
                    @endforeach
                </select>
                {!! $errors->first('id_tipo_documento','<large class="text-danger">:message</large><br>') !!}
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Número documento</span>
                <input type="text" class="form-control @error('numero_documento') is-invalid @enderror" name="numero_documento" placeholder="Ingrese el número de documento" value="{{old('numero_documento')}}" maxlength="20" onkeyup="soloNumeros(this)">
                {!! $errors->first('numero_documento','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Teléfono</span>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" placeholder="Ingrese el teléfono" value="{{old('telefono')}}" maxlength="12" onkeyup="soloNumeros(this)">
                {!! $errors->first('telefono','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Dirección</span>
                <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" placeholder="Ingrese la dirección" value="{{old('direccion')}}" maxlength="100">
                {!! $errors->first('direccion','<large class="text-danger">:message</large><br>') !!}
            </div>
            <input type="text" class="form-control @error('estado') is-invalid @enderror " name="estado" value="1" hidden>
            <div class="col-sm-10">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Registrar</button>
    <a class="btn btn-secundary" href="{{route('usuario.index')}}"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
</form>
@endsection