@extends('layout')

@section('contenido')
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Registrar entrada</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="{{ route('entradas.store') }}" method="POST" style="text-align:center">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class=" col-4">
                <span style="color:red">*</span>

                <label for="CodigoEntrada">Código entrada</label>
                <?php
                $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $numeros = '1234567890';
                $randCaracteres = str_shuffle($caracteres);
                $randNumeros = str_shuffle($numeros);
                $carac = substr($randCaracteres, 1, 4);
                $num = substr($randNumeros, 1, 6);
                $CH = $carac . $num;
                ?>
                <input type="text" class="form-control @error('CodigoEntrada') is-invalid @enderror " name="CodigoEntrada" value="<?php echo $CH ?>" maxlength="10" readonly>
                {!! $errors->first('CodigoEntrada','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class=" col-4">
                <span style="color:red">*</span>
                <label for="FechaCreacion">Fecha de creación</label>
                <input type="text" class="form-control @error('FechaCreacion') is-invalid @enderror " name="FechaCreacion" value="<?php echo date("Y-m-d"); ?>" readonly>
                {!! $errors->first('FechaCreacion','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Responsable</label>
                <select name="Responsable" class="form-control @error('Responsable') is-invalid @enderror" id="">
                    <option value="">Seleccione responsable</option>
                    @foreach($users as $user)
                    @if ($user->estado != 2)
                    <option value="{{$user->id}}" {{ old('Responsable') == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                    @endif
                    @endforeach
                </select>
                {!! $errors->first('Responsable','<large class="text-danger">:message</large><br>') !!}
            </div>
            <div class="col-12">
                <span style="color:red">*</span>
                <label for="Descripcion">Descripción</label>
                <textarea class="form-control @error('Descripcion') is-invalid @enderror " name="Descripcion" maxlength="200">{{{old('Descripcion')}}}</textarea>
                {!! $errors->first('Descripcion','<large class="text-danger">:message</large><br>') !!}
            </div>


            <input type="text" class="form-control @error('estado') is-invalid @enderror " name="estado" value="4" hidden>
        </div>

        <div class="row">
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Material</label>
                <select name="IdMaterial" class="form-control @error('IdMaterial') is-invalid @enderror" id="IdMaterial" onchange="colocar_medida()">
                    <option value="">Seleccione material</option>
                    @foreach($materiales as $material)
                    @if ($material->Estado != 2)
                    <option medida="{{$material->medidaNombre}}" value="{{$material->id}}" {{ old('IdMaterial') == $material->id ? 'selected' : '' }}>{{$material->nombre}}</option>
                    @endif
                    @endforeach
                </select>
                {!! $errors->first('IdMaterial','<large class="text-danger">:message</large><br>') !!}
            </div>

            <div class=" col-4">
                <span style="color:red">*</span>
                <label for="Cantidad">Cantidad</label>
                <input type="number" class="form-control @error('Cantidad') is-invalid @enderror " name="Cantidad" id="Cantidad" onKeyPress="if(this.value.length==11) return false;">
                {!! $errors->first('Cantidad','<large class="text-danger">:message</large><br>') !!}
            </div>

            <div class=" col-4">
                <label for="medida">Medida</label>
                <input type="text" class="form-control" name="medida" id="medida" readonly>
            </div>

            </br>
            </br>
            </br>
            </br>
            <div class=" center col-12">
                <button onclick="agregar_material()" type="button" class="btn btn-info float-center"><i class="fas fa-plus fa-md fa-fw"></i>Agregar</button>
            </div>
        </div>
        </br>
        </br>

        <div class="table-responsive">
            <table class="table table-bordered table-striped " id="entradas">
                <thead class="text-white" style="background:#0B5466">
                    <th class="table-th text-white text-center"> Material </th>
                    <th class="table-th text-white text-center"> Cantidad</th>
                    <th class="table-th text-white text-center"> Medida</th>
                    <th class="table-th text-white text-center"> Acciones</th>
                </thead>

                <tbody id="tblMateriales">

                </tbody>
            </table>

        </div>




    </div>
    <div class="center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Registrar</button>
        <a class="btn btn-secundary" href="{{route('entradas.index')}}"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
    </div>
</form>


@endsection


@section('js')

<script>
    let materiales = [];

    function agregar_material() {
        let material = $("#IdMaterial option:selected").val();
        let material_text = $("#IdMaterial option:selected").text();
        let cantidad = $("#Cantidad").val();
        let medida = $("#medida").val();

        if (cantidad > 0 && material != "") {
            let mat = materiales.findIndex(item => item.material == material);
            if (mat == -1) {
                materiales.push({
                    material,
                    material_text,
                    cantidad,
                    medida
                })
            } else {
                materiales[mat].cantidad = parseInt(materiales[mat].cantidad) + parseInt(cantidad);
            }
            listar();

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los campos material y cantidad no pueden estar vacios!'
            })
        }

    }

    function listar() {
        $("#tblMateriales").html('')
        materiales.map(item => {
            $("#tblMateriales").append(`
                
                <tr id="tr-${item.material}">
                <td>
                    <input type="hidden" name="IdMaterial[]" value="${item.material}" />
                    <input type="hidden" name="Cantidad[]" value="${item.cantidad}" />
                    ${item.material_text}
                </td>
                <td>
                    ${item.cantidad}
                </td>
                <td>
                    ${item.medida}
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="eliminar_material(${item.material})">X</button>
                </td>
                </tr>
            `)
        })

    }

    function eliminar_material(id) {
        event.preventDefault();
        Swal.fire({
            title: "¿Desea eliminar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                let mat = materiales.findIndex(item => item.material == id);
                materiales.splice(mat, 1);
                listar();
            }



        })

    }

    function colocar_medida() {
        let medida = $("#IdMaterial option:selected").attr("medida")

        $("#medida").val(medida);
    }
</script>

@endsection