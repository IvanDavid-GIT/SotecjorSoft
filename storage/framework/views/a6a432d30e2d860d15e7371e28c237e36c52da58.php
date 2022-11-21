 

<?php $__env->startSection('contenido'); ?>

<form action="<?php echo e(route('material.store')); ?>" method="POST" style="text-align:center">
<?php echo csrf_field(); ?>
<div class="card" >
    <div class="card-body" >
        <div class="row" >
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre">
            <label>Categoria</label>
                <select name="categoria" class="form-control" id="">
                    <option >Seleccione Categoria</option>
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <label>Estado</label>
           <input type="text" class="form-control" name="Estado">
           <div class="col-sm-10" >
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Registrar</button>
<button type="submit" class="btn btn-success" href="<?php echo e(route('material.index')); ?>">Volver</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjot\sotecjo\resources\views/materiales/create.blade.php ENDPATH**/ ?>