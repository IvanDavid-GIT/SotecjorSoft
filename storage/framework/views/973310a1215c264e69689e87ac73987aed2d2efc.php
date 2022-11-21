

<?php $__env->startSection('contenido'); ?>
<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Registrar medida</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="<?php echo e(route('medidas.store')); ?>" method="POST" style="text-align:center">
    <?php echo csrf_field(); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <span style="color:red">*</span>
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nombre" value="<?php echo e(old('nombre')); ?>" maxlength="20" onkeyup="soloLetras(this)">
                <?php echo $errors->first('nombre','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <input type="text" class="form-control <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="estado" value="1" hidden>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Registrar</button>
    <a class="btn btn-secundary" href="<?php echo e(route('medidas.index')); ?>"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/materiales/medidas/create.blade.php ENDPATH**/ ?>