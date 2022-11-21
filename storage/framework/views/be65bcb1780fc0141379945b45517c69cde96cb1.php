

<?php $__env->startSection('contenido'); ?>

<div>
    <h1>Categorias<a href="<?php echo e(route('categoria.create')); ?>" title="Crear" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
Agregar</a></h1>
</div>
<div class="row">
                  <div class="col-xl-6">

                    <form action="<?php echo e(route('categoria.index')); ?>" method="get">
                      <div class="form-row">
                      	
                        <div class="col-sm-4 my-1">
                          <input type="search" class="form-control" name="texto" value="<?php echo e($texto); ?>">
                        </div>

                        <div class="col-auto my-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                          <input type="submit"class="btn btn-primary" value="buscar">
                        </div>
                        
                      </div>
                    </form>
                  </div>
                </div>
<table class="table table-bordered table-striped">
    <thead class="text-white" style="background: #3B3F5C;">
        <th>Id</th>
        <th>Nombre</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <?php echo e($categoria->id); ?>

            </td>
            <td>
                <?php echo e($categoria->nombre); ?>

            </td>
            <td>
                <form action="<?php echo e(route('categoria.destroy', $categoria->id)); ?>" method="POST">
                    <a href="<?php echo e(route('categoria.edit', $categoria->id)); ?>" class="btn btn-outline-primary" title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                     Editar</a>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar" style=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
              Eliminar
            </button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/categorias/index.blade.php ENDPATH**/ ?>