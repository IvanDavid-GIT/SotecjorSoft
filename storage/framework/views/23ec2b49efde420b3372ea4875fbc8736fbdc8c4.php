

<?php $__env->startSection('contenido'); ?>
<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Editar proyecto de obra</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="<?php echo e(route('proyectosdeobras.update',$proyectosdeobras->id)); ?>" method="POST" style="text-align:center">
    <?php echo csrf_field(); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Nombre</label>
                <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nombre" value="<?php echo e($proyectosdeobras->nombre); ?>" maxlength="50" onkeyup="soloLetras(this)">
                <?php echo $errors->first('nombre','<large class="text-danger">:message</large><br>'); ?>

            </div>

            <div class="col-4">
                <span style="color:red">*</span>
                <label>Lugar</label>
                <input type="text" class="form-control <?php $__errorArgs = ['lugar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lugar" value="<?php echo e($proyectosdeobras->lugar); ?>" maxlength="40" onkeyup="soloLetras(this)">
                <?php echo $errors->first('lugar','<large class="text-danger">:message</large><br>'); ?>

            </div>

            <div class="col-4">
                <span style="color:red">*</span>
                <label>Responsable</label>
                <input type="text" class="form-control <?php $__errorArgs = ['Responsable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Responsable" value="<?php echo e($proyectosdeobras->Responsable); ?>" maxlength="50" onkeyup="soloLetras(this)">
                <?php echo $errors->first('Responsable','<large class="text-danger">:message</large><br>'); ?>

            </div>

            <div class="col-12">
                <label>Observación</label>
                <textarea type="text" class="form-control " name="Observacion" maxlength="200"><?php echo e($proyectosdeobras->Observacion); ?></textarea>
                
            </div>

            <input type="text" class="form-control <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="estado" value="5" hidden>
        </div>
    </div>
    <div class="center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Editar</button>
        <a class="btn btn-secundary" href="<?php echo e(route('proyectosdeobras.index')); ?>"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/proyectosdeobras/edit.blade.php ENDPATH**/ ?>