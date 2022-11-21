 

<?php $__env->startSection('contenido'); ?>
<br/>
<div class="text-center">
<FONT SIZE=5 style="color:#0B5466" >Editar salida</font>
</div>
<form action="<?php echo e(route('salidas.update',$salidas->id)); ?>" method="POST" style="text-align:center">
<?php echo csrf_field(); ?>
    <div class="card-body" >
        <div class="row" >
            <div class=" col-4">
            <label >Código Salida</label>
            <input type="text" class="form-control" name="CodigoSalida" value="<?php echo e($salidas->CodigoSalida); ?>">
            <?php echo $errors->first('CodigoSalida','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class=" col-4">
            <label >Fecha</label>
            <input type="text" class="form-control" name="FechaSalida" value="<?php echo e($salidas->FechaSalida); ?>" readonly>
            <?php echo $errors->first('FechaSalida','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class=" col-4">
            <label>Responsable</label>
                <select name="Responsable" class="form-control" id="">
                
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <option <?php if($salidas->Responsable  == $user->id ): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>" <?php echo e(old('Responsable') == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-12">
            <label >Descripcion</label>
            <textarea type="text" class="form-control" name="Descripcion"><?php echo e($salidas->Descripcion); ?></textarea>
            <?php echo $errors->first('Descripcion','<large class="text-danger">:message</large><br>'); ?>

            </div>
        </div>
    </div>
<div class="center">
<button type="submit" class="btn btn-primary">Editar</button>
<a class="btn btn-success" href="<?php echo e(route('salidas.index')); ?>">Volver</a>
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/salida/edit.blade.php ENDPATH**/ ?>