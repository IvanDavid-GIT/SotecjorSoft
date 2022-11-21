

<?php $__env->startSection('contenido'); ?>

<div class="row sales layaut-top-spacing">
    <form action="<?php echo e(route('reporte.index')); ?>" method="get">
        <div class="col-sm-12">
            <div class="widget">

                <div class="widget-content">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <div class="row">

                                <div class="col-sm-12">
                                    <h6>Elige el tipo Reporte</h6>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option value="0">Materiales</option>
                                            <option value="1">Categorias</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 ml-2">
                                    <h6>Fecha desde</h6>
                                    <div class="form-group">
                                        <input type="date" wire:model="dateFrom" class="form-control flatpickr" placeholder="Clik para elegir">
                                    </div>
                                </div>
                                <div class="col-sm-12 ml-2">
                                    <h6>Fecha Hasta</h6>
                                    <div class="form-group">
                                        <input type="date" wire:model="dateTo" class="form-control
                                    flatpickr" placeholder="Clik para elegir">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button wire:click="$refresh" class="btn btn-dark  btn-primary">
                                        Consultar
                                    </button>

                                    <a class="btn btn-dark " target="_blank">Generar PDF</a>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-100 col-md-100">
                            <!--TABLA-->
                            <div class="table-responsive">
                                <table class="table table-bordered table striped mt-1">
                                    <thead class="text-white" style="background: #3B3F5C;">
                                        <tr>
                                            <th class="table-th text-white text-center">ID</th>
                                            <th class="table-th text-white text-center">NOMBRE</th>
                                            <th class="table-th text-white text-center">CATEGORIA</th>
                                            <th class="table-th text-white text-center">ESTADO</th>
                                            <th class="table-th text-white text-center">FECHA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($data) <1): ?> <tr>
                                            <td colspan="5">
                                                <h5>Sin resultados</h5>
                                            </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center">
                                                    <h6><?php echo e($d->id); ?></h6>
                                                </td>
                                                <td class="text-center">
                                                    <h6><?php echo e($d->nombre); ?></h6>
                                                </td>
                                                <td class="text-center">
                                                    <h6><?php echo e($d->categoria); ?></h6>
                                                </td>
                                                <td class="text-center">
                                                    <h6><?php echo e($d->Estado); ?></h6>
                                                </td>
                                                <td class="text-center">
                                                    <h6>
                                                        <?php echo e(\Carbon\Carbon::parse($d->created_at)->format('d-m-y')); ?>

                                                    </h6>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/reportes/index.blade.php ENDPATH**/ ?>