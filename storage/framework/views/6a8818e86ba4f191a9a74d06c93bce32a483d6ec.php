

<?php $__env->startSection('contenido'); ?>
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Registrar entrada</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="<?php echo e(route('entradas.store')); ?>" method="POST" style="text-align:center">
    <?php echo csrf_field(); ?>
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
                <input type="text" class="form-control <?php $__errorArgs = ['CodigoEntrada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="CodigoEntrada" value="<?php echo $CH ?>" maxlength="10" readonly>
                <?php echo $errors->first('CodigoEntrada','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class=" col-4">
                <span style="color:red">*</span>
                <label for="FechaCreacion">Fecha de creación</label>
                <input type="text" class="form-control <?php $__errorArgs = ['FechaCreacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="FechaCreacion" value="<?php echo date("Y-m-d"); ?>" readonly>
                <?php echo $errors->first('FechaCreacion','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Responsable</label>
                <select name="Responsable" class="form-control <?php $__errorArgs = ['Responsable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="">
                    <option value="">Seleccione responsable</option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->estado != 2): ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e(old('Responsable') == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('Responsable','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-12">
                <span style="color:red">*</span>
                <label for="Descripcion">Descripción</label>
                <textarea class="form-control <?php $__errorArgs = ['Descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="Descripcion" maxlength="200"><?php echo e(old('Descripcion')); ?></textarea>
                <?php echo $errors->first('Descripcion','<large class="text-danger">:message</large><br>'); ?>

            </div>


            <input type="text" class="form-control <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="estado" value="4" hidden>
        </div>

        <div class="row">
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Material</label>
                <select name="IdMaterial" class="form-control <?php $__errorArgs = ['IdMaterial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="IdMaterial" onchange="colocar_medida()">
                    <option value="">Seleccione material</option>
                    <?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($material->Estado != 2): ?>
                    <option medida="<?php echo e($material->medidaNombre); ?>" value="<?php echo e($material->id); ?>" <?php echo e(old('IdMaterial') == $material->id ? 'selected' : ''); ?>><?php echo e($material->nombre); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('IdMaterial','<large class="text-danger">:message</large><br>'); ?>

            </div>

            <div class=" col-4">
                <span style="color:red">*</span>
                <label for="Cantidad">Cantidad</label>
                <input type="number" class="form-control <?php $__errorArgs = ['Cantidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="Cantidad" id="Cantidad" onKeyPress="if(this.value.length==11) return false;">
                <?php echo $errors->first('Cantidad','<large class="text-danger">:message</large><br>'); ?>

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
        <a class="btn btn-secundary" href="<?php echo e(route('entradas.index')); ?>"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
    </div>
</form>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/entrada/create.blade.php ENDPATH**/ ?>