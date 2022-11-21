 

<?php $__env->startSection('contenido'); ?>
<br/>
<FONT SIZE=5 style="color:#0B5466" class="center">Registrar entrada</font>
<form action="<?php echo e(route('entradas.store')); ?>" method="POST" style="text-align:center">
<?php echo csrf_field(); ?>
    <div class="card-body" >
        <div class="row" >
            <div class=" col-4">
        <label for="CodigoEntrada" >Código entrada</label>
            <input type="text" class="form-control <?php $__errorArgs = ['CodigoEntrada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="CodigoEntrada" value="<?php echo e(old('CodigoEntrada')); ?>">
                <?php echo $errors->first('CodigoEntrada','<large class="text-danger">:message</large><br>'); ?> 
            </div>
            <div class=" col-4">
        <label for="FechaCreacion" >Fecha de creación</label>
            <input type="text" class="form-control <?php $__errorArgs = ['FechaCreacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="FechaCreacion" value="<?php echo date("Y-m-d");?>" readonly>
                <?php echo $errors->first('FechaCreacion','<large class="text-danger">:message</large><br>'); ?> 
            </div>
            <div class="col-4">
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
                    <option value="<?php echo e($user->id); ?>" <?php echo e(old('Responsable') == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('Responsable','<large class="text-danger">:message</large><br>'); ?> 
            </div>
            <div class="col-12">
            <label for="Descripcion" >Descripción</label>
            <textarea class="form-control <?php $__errorArgs = ['Descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="Descripcion" ><?php echo e(old('Descripcion')); ?></textarea>
                <?php echo $errors->first('Descripcion','<large class="text-danger">:message</large><br>'); ?> 
                </div>
                

                <input type="text" class="form-control <?php $__errorArgs = ['Estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="Estado" value="1" hidden> 
        </div>

        <div class="row"> 
        <div class="col-4">
            <label>Material</label>
                <select name="IdMaterial" class="form-control <?php $__errorArgs = ['IdMaterial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="IdMaterial">
                    <option value="">Seleccione material</option>
                    <?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($material->id); ?>" <?php echo e(old('IdMaterial') == $material->id ? 'selected' : ''); ?>><?php echo e($material->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('IdMaterial','<large class="text-danger">:message</large><br>'); ?> 
            </div>

            <div class=" col-4">
        <label for="Cantidad" >Cantidad</label>
            <input type="number" class="form-control <?php $__errorArgs = ['Cantidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="Cantidad" value="0" id="Cantidad">
                <?php echo $errors->first('Cantidad','<large class="text-danger">:message</large><br>'); ?> 
            </div>
            
            <div class=" col-4">
            <button onclick="agregar_material()" type="button" class="btn btn-info float-center">Agregar</button>
            </div>
        </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped " id="entradas">
            <thead class="text-white" style="background:#0B5466">
                <th class="table-th text-white text-center"> Material </th>
                <th class="table-th text-white text-center"> Cantidad</th>
                <th class="table-th text-white text-center"> Acciones</th>
            </thead>

            <tbody id="tblMateriales">

            </tbody>
        </table>

    </div>
                


        
    </div>
<div class="center">
<button type="submit" class="btn btn-primary">Registrar</button>
<a class="btn btn-success" href="<?php echo e(route('entradas.index')); ?>">Volver</a>
</div>
</form>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

<script>
    function agregar_material() {
        let material = $("#IdMaterial option:selected").val();
        let material_text = $("#IdMaterial option:selected").text();
        let cantidad = $("#Cantidad").val();

        if (cantidad > 0) {
            
            $("#tblMateriales").append(`
                <tr id="tr-${material}">
                <td>
                    <input type="hidden" name="IdMaterial[]" value="${material}" />
                    <input type="hidden" name="Cantidad[]" value="${cantidad}" />
                    ${material_text}
                </td>
                <td>${cantidad}</td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="eliminar_material(${material})">X</button>
                </td>
                </tr>
            `)


        } else {
            alert("Se debe ingregsar una cantidad");
        }
        
    }

    function eliminar_material(id) {
        $("#tr-"+id).remove();
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/detalle_entrada/create.blade.php ENDPATH**/ ?>