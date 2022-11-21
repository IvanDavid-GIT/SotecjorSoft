

<?php $__env->startSection('contenido'); ?>
<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Registrar material</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="<?php echo e(route('material.store')); ?>" method="POST" style="text-align:center">
    <?php echo csrf_field(); ?>
    <div class="card-body">
        <div class="row">
            <div class=" col-6">
                <span style="color:red">*</span>
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="nombre" value="<?php echo e(old('nombre')); ?>" maxlength="20" onkeyup="soloLetras(this)">
                <?php echo $errors->first('nombre','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-6">
                <span style="color:red">*</span>
                <label>Categoría</label>
                <select name="categoria" class="form-control <?php $__errorArgs = ['categoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="">
                    <option value="">Seleccione Categoría</option>
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($categoria->estado != 0): ?>
                    <option value="<?php echo e($categoria->id); ?>" <?php echo e(old('categoria') == $categoria->id ? 'selected' : ''); ?>><?php echo e($categoria->nombre); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('categoria','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-6">
                <span style="color:red">*</span>
                <label>Medida</label>
                <select name="medida" class="form-control <?php $__errorArgs = ['medida'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="">
                    <option value="">Seleccione Medida</option>
                    <?php $__currentLoopData = $medidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($medida->estado != 0): ?>
                    <option value="<?php echo e($medida->id); ?>" <?php echo e(old('medida') == $medida->id ? 'selected' : ''); ?>><?php echo e($medida->nombre); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('medida','<large class="text-danger">:message</large><br>'); ?>

            </div>

            <div class=" col-6">
                <span style="color:red">*</span>
                <label for="stockMin">Stock Mínimo</label>
                <input type="number" class="form-control <?php $__errorArgs = ['stockMin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="stockMin" id="stockMin" onKeyPress="if(this.value.length==11) return false;">
                <?php echo $errors->first('stockMin','<large class="text-danger">:message</large><br>'); ?>

            </div>


            <br />
            <br />
            <br />
            <br />
            <br />

            <div class="col-12">
                <span style="color:red">*</span>
                <label for="descripcion">Descripción</label>
                <textarea type="text" class="form-control <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="descripcion" maxlength="200"><?php echo e(old('descripcion')); ?></textarea>
                <?php echo $errors->first('descripcion','<large class="text-danger">:message</large><br>'); ?>

            </div>



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
    <div class="center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Registrar</button>
        <a class="btn btn-secundary" href="<?php echo e(route('material.index')); ?>"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/materiales/create.blade.php ENDPATH**/ ?>