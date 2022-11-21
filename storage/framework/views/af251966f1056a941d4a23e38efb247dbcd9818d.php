 

<?php $__env->startSection('contenido'); ?>
<div class="content" >
    <div class="container-fluid" >
        <div class="row" >
            <div class="col-md-12" >
                <form action="<?php echo e(route('categoria.store')); ?>" method="POST" style="margin-left: 220px">
                <?php echo csrf_field(); ?>
                    <div class="card" >
                        <div class="card-body" >
                            <div class="row" >
                                <label>Nombre</label>
                                    <div class="col-sm-10" >
                                    <input type="text" class="form-control" name="nombre">
                                    </div>
                             </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto" >
                             <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/categorias/create.blade.php ENDPATH**/ ?>