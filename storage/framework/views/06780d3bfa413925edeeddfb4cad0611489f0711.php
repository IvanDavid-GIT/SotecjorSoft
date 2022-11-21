

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="resources\css\estilos.css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenido'); ?>

<div>
<br/>
  <div align="center">
  <FONT SIZE=5 style="color:#0B5466">Entradas</font>
  </div>
  <br/>
  <br/>
    <a href="<?php echo e(route('entradas.create')); ?>" title="Crear" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
        <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="5" y1="12" x2="19" y2="12"></line>
      </svg>
      Registrar</a>
</div>
<div class="row">
  <div class="col-xl-6"> 
  </div>
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped " id="entradas">
  <thead class="text-white" style="background:#0B5466">
    <th class="table-th text-white text-center"> Código Entrada </th>
    <th class="table-th text-white text-center"> Fecha creación</th>
    <th class="table-th text-white text-center"> Descripción</th>
    <th class="table-th text-white text-center"> Responable</th>
    <th class="table-th text-white text-center"> Estado</th>
    <th class="table-th text-white text-center"> Acciones</th>

  </thead>
</table>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
  $('#entradas').DataTable({reponsive: true,
                            autoWidth: false,
                            processing: true,
                            serverSide: true,
                            ajax: '/entradas/listar',
                            columns: [
                            {data: 'CodigoEntrada', name: 'CodigoEntrada'},
                            {data: 'FechaCreacion', name: 'FechaCreacion'},
                            {data: 'Descripcion', name: 'Descripcion'},
                            {data: 'Responsable', name: 'Responsable'},
                            {data: 'Estado', name: 'Estado'},
                            {data: 'acciones', name: 'acciones', orderable: false, searchable: false}
            

            
        ],
                    "lengthMenu": [[5,10,50, -1], [5,10,50, "Todos"]],"language": 
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/detalle_entrada/index.blade.php ENDPATH**/ ?>