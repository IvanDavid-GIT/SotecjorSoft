

<?php $__env->startSection('contenido'); ?>
<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Editar usuario</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="<?php echo e(route('usuario.update',$users->id)); ?>" method="POST" style="text-align:center">
    <?php echo csrf_field(); ?>
    <div class="card-body">
        <div class="row">

            <div class="col-4">
                <span style="color:red">*</span>
                <label>Rol</label>
                <select name="id_rol" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="">

                    <?php $__currentLoopData = $rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($users->id_rol == $roles->id ): ?> selected <?php endif; ?> value="<?php echo e($roles->id); ?>" <?php echo e(old('id_rol') == $roles->id ? 'selected' : ''); ?>><?php echo e($roles->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('id_rol','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Nombres</label>
                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($users->name); ?>">
                <?php echo $errors->first('name','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Apellidos</label>
                <input type="text" class="form-control <?php $__errorArgs = ['apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="apellidos" value="<?php echo e($users->apellidos); ?>">
                <?php echo $errors->first('apellidos','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <br />
            <br />
            <br />
            <br />
            <div class="col-6">
                <span style="color:red">*</span>
                <label>Correo electrónico</label>
                <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($users->email); ?>">
                <?php echo $errors->first('email','<large class="text-danger">:message</large><br>'); ?>

            </div>

            <input type="text" class="form-control" name="password" value="<?php echo e($users->password); ?>" hidden>
            <div class="col-2">
                <span style="color:red">*</span>
                <label>Tipo documento</label>
                <select name="id_tipo_documento" class="form-control <?php $__errorArgs = ['id_tipo_documento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="">
                    <?php $__currentLoopData = $tiposdocumentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipodocumento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option <?php if($users->id_tipo_documento == $tipodocumento->id): ?> selected <?php endif; ?> value="<?php echo e($tipodocumento->id); ?>" <?php echo e(old('id_tipo_documento') == $tipodocumento->id ? 'selected' : ''); ?>><?php echo e($tipodocumento->nombre); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('id_tipo_documento','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <label>Número documento</label>
                <input type="text" class="form-control <?php $__errorArgs = ['numero_documento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="numero_documento" value="<?php echo e($users->numero_documento); ?>">
                <?php echo $errors->first('numero_documento','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <br />
            <br />
            <br />
            <br />
            <div class="col-6">
                <span style="color:red">*</span>
                <label>Teléfono</label>
                <input type="text" class="form-control <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="telefono" value="<?php echo e($users->telefono); ?>">
                <?php echo $errors->first('telefono','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-6">
                <span style="color:red">*</span>
                <label>Dirección</label>
                <input type="text" class="form-control <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="direccion" value="<?php echo e($users->direccion); ?>">
                <?php echo $errors->first('direccion','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <input type="text" class="form-control <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="estado" value="<?php echo e($users->estado); ?>" hidden>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Editar</button>
    <a class="btn btn-secundary" href="<?php echo e(route('usuario.index')); ?>"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/users/edit.blade.php ENDPATH**/ ?>