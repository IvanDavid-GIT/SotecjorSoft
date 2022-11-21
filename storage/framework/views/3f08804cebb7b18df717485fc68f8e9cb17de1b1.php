 

<?php $__env->startSection('contenido'); ?>
<div class="row">
     <div class="col">
       <table class="table">
         <thead>
           <tr>
             <th colspan="5" class="text-center">Materiales</th>
           </tr>
           <tr>
            <th class="table-th"> Código Entrada</th>
            <th class="table-th"> Categoria</th>
            <th class="table-th"> Nombre</th>
            <th class="table-th"> Cantidad</th>
            <th class="table-th"> Medida</th>
           </tr>
         </thead>
         <tbody>
            <?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($material->CodigoEntrada); ?></td>
                  <td><?php echo e($material->nombrecategoria); ?></td>
                  <td><?php echo e($material->nombre); ?></td>
                  <td><?php echo e($material->Cantidad); ?></td>
                  <td><?php echo e($material->nombremedida); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
       </table>
     </div>
  </div>
  <div class="text-center">
  <a class="btn btn-success" href="<?php echo e(route('entradas.index')); ?>">Volver</a>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/entrada/edit.blade.php ENDPATH**/ ?>