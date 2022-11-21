

<?php $__env->startSection('contenido'); ?>
<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Editar material</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="<?php echo e(route('material.update',$materiales->id)); ?>" method="POST" style="text-align:center">
    <?php echo csrf_field(); ?>
    <div class="card-body">
        <div class="row">
            <div class=" col-6">
                <span style="color:red">*</span>
                <label>Nombre</label>
                <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="nombre" value="<?php echo e($materiales->nombre); ?>" maxlength="20" onkeyup="soloLetras(this)">
                <?php echo $errors->first('nombre','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class=" col-6">
                <span style="color:red">*</span>
                <label>Categoría</label>
                <select name="categoria" class="form-control <?php $__errorArgs = ['categoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="">

                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($categoria->estado != 0): ?>
                    <option <?php if($materiales->categoria == $categoria->id ): ?> selected <?php endif; ?> value="<?php echo e($categoria->id); ?>" <?php echo e(old('categoria') == $categoria->id ? 'selected' : ''); ?>><?php echo e($categoria->nombre); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class=" col-6">
                <span style="color:red">*</span>
                <label>Medida</label>
                <select name="medida" class="form-control <?php $__errorArgs = ['medida'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="">

                    <?php $__currentLoopData = $medidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($medida->estado != 0): ?>
                    <option <?php if($materiales->medida == $medida->id ): ?> selected <?php endif; ?> value="<?php echo e($medida->id); ?>" <?php echo e(old('medida') == $medida->id ? 'selected' : ''); ?>><?php echo e($medida->nombre); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
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
unset($__errorArgs, $__bag); ?> " name="stockMin" id="stockMin" value="<?php echo e($materiales->stockMin); ?>" onKeyPress="if(this.value.length==11) return false;">
                <?php echo $errors->first('stockMin','<large class="text-danger">:message</large><br>'); ?>

            </div>


            <div class="col-12">
                <span style="color:red">*</span>
                <label>Descripción</label>
                <textarea type="text" class="form-control <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="descripcion" maxlength="200"><?php echo e($materiales->descripcion); ?></textarea>
                <?php echo $errors->first('descripcion','<large class="text-danger">:message</large><br>'); ?>

            </div>
        </div>
    </div>
    <div class="center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Editar</button>
        <a class="btn btn-secundary" href="<?php echo e(route('material.index')); ?>"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/materiales/edit.blade.php ENDPATH**/ ?>