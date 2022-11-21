

<?php $__env->startSection('contenido'); ?>

<br />
<div class="text-center">
    <FONT SIZE=5 style="color:#0B5466">Registrar usuario</font>
</div>
<div class="text-center">
    <FONT SIZE=2 style="color:red">*</font>
    <FONT SIZE=2 style="color:#0B5466">Campos requeridos</font>
</div>
<form action="<?php echo e(route('usuario.store')); ?>" method="POST" style="text-align:center">
    <?php echo csrf_field(); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Rol</span>
                <select name="id_rol" class="form-control <?php $__errorArgs = ['id_rol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="">
                    <option value="">Seleccione el rol</option>
                    <?php $__currentLoopData = $rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($roles->estado != 2): ?>
                    <option value="<?php echo e($roles->id); ?>" <?php echo e(old('id_rol') == $roles->id ? 'selected' : ''); ?>><?php echo e($roles->nombre); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('id_rol','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Nombres</span>
                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" placeholder="Ingrese los nombres" value="<?php echo e(old('name')); ?>" maxlength="30" onkeyup="soloLetras(this)">
                <?php echo $errors->first('name','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Apellidos</span>
                <input type="text" class="form-control <?php $__errorArgs = ['apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="apellidos" placeholder="Ingrese los apellidos" value="<?php echo e(old('apellidos')); ?>" maxlength="40" onkeyup="soloLetras(this)">
                <?php echo $errors->first('apellidos','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Correo electrónico</span>
                <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" placeholder="Ingrese el correo electronico" value="<?php echo e(old('email')); ?>" maxlength="40">
                <?php echo $errors->first('email','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Contraseña</span>
                <div class="input-group">
                    <input id="txtPassword" type="Password" name="password" placeholder="Mínimo 8 caracteres" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" maxlength="20">
                    <div class="input-group-append">
                        <span><button id="show_password" class="btn btn" type="button" onclick="mostrarPassword()" style="background: rgb(42 63 84)"><span class="fa fa-eye-slash icon" style="color:white"></span> </button></span>
                    </div>
                </div>
                <?php echo $errors->first('password','<large class="text-danger">:message</large><br>'); ?>


            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Tipo documento</span>
                <select name="id_tipo_documento" class="form-control <?php $__errorArgs = ['id_tipo_documento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="">
                    <option value="">Seleccione tipo de documento</option>
                    <?php $__currentLoopData = $tiposdocumentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipodocumento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tipodocumento->id); ?>" <?php echo e(old('id_tipo_documento') == $tipodocumento->id ? 'selected' : ''); ?>><?php echo e($tipodocumento->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo $errors->first('id_tipo_documento','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Número documento</span>
                <input type="text" class="form-control <?php $__errorArgs = ['numero_documento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="numero_documento" placeholder="Ingrese el número de documento" value="<?php echo e(old('numero_documento')); ?>" maxlength="20" onkeyup="soloNumeros(this)">
                <?php echo $errors->first('numero_documento','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Teléfono</span>
                <input type="text" class="form-control <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="telefono" placeholder="Ingrese el teléfono" value="<?php echo e(old('telefono')); ?>" maxlength="12" onkeyup="soloNumeros(this)">
                <?php echo $errors->first('telefono','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <div class="col-4">
                <span style="color:red">*</span>
                <span>Dirección</span>
                <input type="text" class="form-control <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="direccion" placeholder="Ingrese la dirección" value="<?php echo e(old('direccion')); ?>" maxlength="100">
                <?php echo $errors->first('direccion','<large class="text-danger">:message</large><br>'); ?>

            </div>
            <input type="text" class="form-control <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="estado" value="1" hidden>
            <div class="col-sm-10">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-md fa-fw"></i>Registrar</button>
    <a class="btn btn-secundary" href="<?php echo e(route('usuario.index')); ?>"><i class="fas fa-hand-point-left fa-md fa-fw"></i>Volver</a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Git Sotecjor\sotecjo\resources\views/users/create.blade.php ENDPATH**/ ?>