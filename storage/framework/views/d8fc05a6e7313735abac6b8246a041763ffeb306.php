 

<?php $__env->startSection('contenido'); ?>
<br/>
<FONT SIZE=5 style="color:#0B5466" class="center">Editar entrada</font>
<form action="<?php echo e(route('entradas.update',$entradas->id)); ?>" method="POST" style="text-align:center">
<?php echo csrf_field(); ?>
    <div class="card-body" >
        <div class="row" >
            <div class=" col-4">
            <label >Código Entrada</label>
            <input type="text" class="form-control" name="CodigoEntrada" value="<?php echo e($entradas->CodigoEntrada); ?>">
            <?php echo $errors->first('CodigoEntrada','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class=" col-4">
            <label >Fecha</label>
            <input type="text" class="form-control" name="FechaCreacion" value="<?php echo e($entradas->FechaCreacion); ?>" readonly>
            <?php echo $errors->first('FechaCreación','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class=" col-4">
            <label>Responsable</label>
                <select name="Responsable" class="form-control" id="">
                
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <option <?php if($entradas->Responsable  == $user->id ): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>" <?php echo e(old('Responsable') == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-12">
            <label >Descripcion</label>
            <textarea type="text" class="form-control" name="Descripcion"><?php echo e($entradas->Descripcion); ?></textarea>
            <?php echo $errors->first('Descripcion','<large class="text-danger">:message</large><br>'); ?>

            </div>
        </div>
    </div>
<div align="center">
<button type="submit" class="btn btn-primary">Editar</button>
<a class="btn btn-success" href="<?php echo e(route('entradas.index')); ?>">Volver</a>
</div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/detalle_entrada/edit.blade.php ENDPATH**/ ?>