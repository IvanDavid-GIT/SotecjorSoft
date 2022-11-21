 

<?php $__env->startSection('contenido'); ?>
<h1>Actualizar datos del Material</h1>
        <div class="row" >
            <div class="col-md-12" >
                <form action="<?php echo e(route('material.edit',$materiales->id)); ?>" method="POST" style="margin-left: 220px">
                <?php echo csrf_field(); ?>
                <input type="text" name="nombre" value="<?php echo e($materiales->nombre); ?>">
                <input type="text" name="IdCategoria" value="<?php echo e($materiales->IdCategoria); ?>">
                <input type="text" name="Estado" value="<?php echo e($materiales->Estado); ?>">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjot\sotecjo\resources\views/materiales/edit.blade.php ENDPATH**/ ?>