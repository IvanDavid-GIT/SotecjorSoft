

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="resources\css\estilos.css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenido'); ?>

<div>
  <FONT SIZE=6 style="color:#5078A1">Materiales</font>
  <br/>
  <br/>
    <a href="<?php echo e(route('material.create')); ?>" title="Crear" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
        <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="5" y1="12" x2="19" y2="12"></line>
      </svg>
      Registrar</a>
    <form action="<?php echo e(route('material.index')); ?>" method="get">
</div>
<div class="row">
  <div class="col-xl-6"> 

    <form action="<?php echo e(route('material.index')); ?>" method="get">
      <div class="form-row">


      </div>
    </form>
  </div>
</div>
<table class="table table-bordered table-striped " id="materials">
  <thead class="text-white" style="background: #304961">
    <th> Id </th>
    <th class="table-th text-white text-center"> Nombre</th>
    <th class="table-th text-white text-center"> Categoria</th>
    <th class="table-th text-white text-center"> Estado</th>
    <th class="table-th text-white text-center"> Acciones</th>

  </thead>
  <tbody>
    <?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- <tr class="<?php if($material->Estado == '1'): ?> table-danger <?php endif; ?>"> -->
    <td>
      <?php echo e($material->id); ?>

    </td>
    <td>
      <h6 class="text-center"><?php echo e($material->nombre); ?>

      </h6>
    </td>
    <td>
      <h6 class="text-center"><?php echo e($material->categoria); ?></h6>
    </td>
    <td>
      <h6 class="text-center">
        <!-- ESTADO -->
        <label class="switch">
          <?php if($material->Estado == 1): ?>
          <button type="button" class="btn btn-sm btn-success">Activo</button>
          <?php else: ?>
          <button type="button" class="btn btn-sm btn-danger">Inactivo</button>
          <?php endif; ?>
        </label>
        <!-- HASTA AQUI   -->
      </h6>
    </td>
    <!-- CAMBIOS -->
    <!-- HASTA AQUI   -->

    <td>
      <form action="<?php echo e(route('material.destroy', $material->id)); ?>" method="POST" class="text-center">
        <a href="<?php echo e(route('material.edit', $material->id)); ?>" class="btn btn-outline-primary" title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
            <path d="M12 20h9"></path>
            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
          </svg>
          Editar</a>
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
            <line x1="10" y1="11" x2="10" y2="17"></line>
            <line x1="14" y1="11" x2="14" y2="17"></line>
          </svg>
          Eliminar
        </button>
      </form>
    </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
  $('#materials').DataTable({"lengthMenu": [[5,10,50, -1], [5,10,50, "Todos"]],"language": 
                {
                    "lengthMenu": "Mostrar _MENU_ Registros por Pagina",
                    "zeroRecords": "No se encontro ningun archivo",
                    "info": "Mostrando _PAGE_ de _PAGES_ paginas",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(Filtrado de _MAX_ registros Totales)",
                    "search": "Buscar",
                    "paginate":
                    {
                        "next": "siguiente",
                        "previous": "Anterior"
                    }
                    
                    
                }});
</script>
<!-- cambio -->

<!-- aqui -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjot\sotecjo\resources\views/materiales/index.blade.php ENDPATH**/ ?>