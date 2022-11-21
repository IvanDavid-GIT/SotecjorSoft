

<?php $__env->startSection('contenido'); ?>
<div class="row">
  <div class="col">
    <div class="text-center">
      <FONT SIZE=5 style="color:#0B5466"><i class="fas fa-angle-double-down fa-fw"></i>Materiales</font>
    </div>
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr style="background: #0B5466;">
          <th class="table-th text-white text-center"> Código Entrada</th>
          <th class="table-th text-white text-center"> Categoría</th>
          <th class="table-th text-white text-center"> Nombre</th>
          <th class="table-th text-white text-center"> Cantidad</th>
          <th class="table-th text-white text-center"> Medida</th>
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
<button type="button" data-toggle="modal" data-target="#ModalComentarioE" class="btn btn-primary"><i class="far fa-eye fa-md fa-fw"></i>Ver motivo de anulación</button>
  <a class="btn btn-secundary" href="<?php echo e(route('entradas.index')); ?>"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
</div>

<div class="modal" id="ModalComentarioE" name="ModalComentarioE" aria-labelledby="ModalComentarioE" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <FONT SIZE=5 style="color:#0B5466">Motivo de anulación</font>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <textarea type="text" class="form-control" name="Comentario" readonly><?php echo e($entrada->Comentario); ?></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/entrada/detalle.blade.php ENDPATH**/ ?>