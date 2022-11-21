

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="resources\css\estilos.css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenido'); ?>
<br />
<div class="text-center" style="margin-left: 115px;">

  <FONT SIZE=5 style="color:#0B5466">Categorías</font>


  <a href="<?php echo e(route('categoria.create')); ?>" title="Crear" class="float-right btn btn-outline-primary"><i class="fas fa-plus fa-md fa-fw"></i>Registrar</a>

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
  <table class="table table-bordered table-striped " id="categorias">
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
<script>
  $('#categorias').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/categoria/listar',
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\SotecjorSoft\resources\views/categoria/index.blade.php ENDPATH**/ ?>