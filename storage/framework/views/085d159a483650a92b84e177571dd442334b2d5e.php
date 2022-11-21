

<?php $__env->startSection('contenido'); ?>
<br>
<div class="row">
  <div class="col">
    <div class="text-center">
      <FONT SIZE=5 style="color:#0B5466"><i class="fas fa-archive fa-lg fa-fw"></i>Alerta Stock Mínimo</font>
    </div>
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr style="background: #0B5466;">
          <th class="table-th text-white text-center"> Categoría</th>
          <th class="table-th text-white text-center"> Nombre</th>
          <th class="table-th text-white text-center"> Stock</th>
          <th class="table-th text-white text-center"> Medida</th>
          <th class="table-th text-white text-center"> Stock Mínimo</th>
          <th class="table-th text-white text-center"> Descripción</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($material->stock <= $material->stockMin): ?>
          <tr>
            <td><?php echo e($material->categoriaNombre); ?></td>
            <td><?php echo e($material->nombre); ?></td>
            <td><?php echo e($material->stock); ?></td>
            <td><?php echo e($material->medidaNombre); ?></td>
            <td><?php echo e($material->stockMin); ?></td>
            <td><?php echo e($material->descripcion); ?></td>
          </tr>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\SotecjorSoft\resources\views/dashboard/index.blade.php ENDPATH**/ ?>