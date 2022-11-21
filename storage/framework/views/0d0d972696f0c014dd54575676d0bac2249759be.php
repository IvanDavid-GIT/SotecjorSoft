

<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenido'); ?>
<br>
<div class="text-center" style="margin-left: 250px;">

  <FONT SIZE=5 style="color:#0B5466">Medidas</font>


  <a href="<?php echo e(route('medidas.create')); ?>" title="Crear" class="float-right btn btn-outline-primary"><i class="fas fa-plus fa-md fa-fw"></i>Registrar</a>

  <a href="<?php echo e(route('material.index')); ?>" title="volverMateriales" class="float-right btn btn-outline-info">
    <i class="fas fa-archive fa-lg fa-fw"></i> Materiales</a>
</div>

<div class="text-center">
  <?php if(session('status')): ?>
  <?php if(session('status') =='1'): ?>
  <div class="alert alert-success" id="DivRegistro">
    ¡Registro Exitoso!
  </div>
  <?php elseif(session('status') =='2'): ?>
  <div class="alert alert-success" id="DivModificar">
    ¡Modificación Exitosa!
  </div>
  <?php elseif(session('status') =='3'): ?>
  <div class="alert alert-success" id="DivEstado">
    ¡Cambio Exitoso!
  </div>

  <?php else: ?>
  <div class="alert alert-danger"><?php echo e(session('status')); ?>

  </div>
  <?php endif; ?>
  <?php endif; ?>
</div>



<div class="row">
  <div class="col-xl-6">
  </div>
</div>
<div class="table-responsive">
  <table class="table table-bordered table-striped " id="medidas">
    <thead class="text-white" style="background: #0B5466">
      <th class="table-th text-center"> Nombre</th>
      <th class="table-th text-center"> Estado</th>
      <th class="table-th text-center"> Acciones</th>

    </thead>

  </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://kit.fontawesome.com/e047a58b48.js" crossorigin="anonymous"></script>
<script>
  $('#medidas').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/medidas/listar',
    columns: [{
        data: 'nombre',
        name: 'nombre'
      },
      {
        data: 'estado',
        name: 'estado'
      },
      {
        data: 'acciones',
        name: 'acciones',
        orderable: false,
        searchable: false
      }



    ],
    "lengthMenu": [
      [5, 10, 50, -1],
      [5, 10, 50, "Todos"]
    ],
    "language": {
      "lengthMenu": "Mostrar _MENU_ Registros por Pagina",
      "zeroRecords": "No se encontro ningun archivo",
      "info": "Mostrando _PAGE_ de _PAGES_ paginas",
      "infoEmpty": "No records available",
      "infoFiltered": "(Filtrado de _MAX_ registros Totales)",
      "search": "Buscar",
      "paginate": {
        "next": "siguiente",
        "previous": "Anterior"
      }


    }
  });
</script>
<!-- cambio -->

<!-- aqui -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SotecjorSoft\resources\views/materiales/medidas/index.blade.php ENDPATH**/ ?>