

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenido'); ?>
<br />
<div class="text-center">

  <FONT SIZE=5 style="color:#0B5466">Reportes</font>

</div>
<div class="text-center">
  <FONT SIZE=2 style="color:red">*</font>
  <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<br>

<form method="POST" action="fechaEntradas/export">
  <?php echo csrf_field(); ?>

  <div class="card-body">
    <div class="row">
      <div class="col-4">
        <span style="color:red">*</span>
        <label for="FechaInicio">Fecha Inicio</label>
        <input type="date" id="FechaInicio" name="FechaInicio" class="form-control "></input>

        <?php echo $errors->first('FechaInicio','<large class="text-danger">:message</large><br>'); ?>

      </div>

      <div class="col-4">
        <span style="color:red">*</span>
        <label for="FechaFin">Fecha Fin</label>
        <input type="date" id="FechaFin" name="FechaFin" class="form-control "></input>

        <?php echo $errors->first('FechaFin','<large class="text-danger">:message</large><br>'); ?>

      </div>

      <div class="col-4">
        <span style="color:red">*</span>
        <label>Tipo de reporte</label>
        <select name="TipoReporte" class="form-control " id="TipoReporte">
          <option value="">Seleccione el tipo de reporte</option>
          <option value="1">Entradas</option>
          <option value="2">Salidas</option>

        </select>
        <?php echo $errors->first('TipoReporte','<large class="text-danger">:message</large><br>'); ?>

      </div>

    </div>
    <br>
    <div class="text-center">
      <button type="submit" class="btn btn-success"><i class="fas fa-save fa-md fa-fw"></i>Descargar</button>
    </div>
  </div>
</form>
<div class="text-center">
      <a type="button" href="reporte/materialesReport/exportM" class="btn btn-success"><i class="fas fa-save fa-md fa-fw"></i>Descargar Stock Materiales</a>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SotecjorSoft\resources\views/reporte/index.blade.php ENDPATH**/ ?>