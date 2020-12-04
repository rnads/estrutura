<?php $__env->startSection('title'); ?>
<?php echo e($form['type'] == 'edit' ? 'EDITAR USUÁRIO' : 'NOVO USUÁRIO'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0  text-primary"><?php echo e($form['type'] == 'edit' ? 'Editar Usuário' : 'Novo Usuário'); ?></h3>
        </div>
        <div class="card-body">
            <form
        action="<?php echo e($form['action']); ?>" method="<?php echo e($form['method']); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field($form['method']); ?>
                <div class="row">

                    <div class="col-12 col-md-6">
                        <label class="badge badge-primary">Nome</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                            value="<?php echo e(isset($user) ? $user->name : old('name')); ?>" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="col-12 col-md-6">
                        <label class="badge badge-primary">E-mail</label>
                        <input type="email" id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="email" value="<?php echo e(isset($user) ? $user->email : old('email')); ?>" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="col-12 col-md-6">
                        <label class="badge badge-primary">Status</label>
                        <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="status" required>
                            <option value="">Escolha</option>
                            <option value="1"
                                <?php echo e(old('status') ? old('status') == 1 ? 'selected' : '' : ''); ?>

                                <?php echo e(isset($user) ? $user->status == 1 ? 'selected' : '' : ''); ?>>
                                Ativo
                            </option>
                            <option value="0"
                            <?php echo e(old('status') ? old('status') == 0 ? 'selected' : '' : ''); ?>

                            <?php echo e(isset($user) ? $user->status == 0 ? 'selected' : '' : ''); ?>>
                            Inativo</option>
                        </select>
                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="col-12 col-md-6">
                        <label class="badge badge-primary">Permissão</label>
                        <select class="form-control <?php $__errorArgs = ['group_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="group_id">
                            <option value="">Escolha</option>
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($group->id); ?>"
                                <?php echo e(old('group_id') ? old('group_id') == $group->id ? 'selected' : '' : ''); ?>

                                <?php echo e(isset($user) ? $user->group_id == $group->id ? 'selected' : '' : ''); ?>>
                                <?php echo e($group->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['group_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-6 text-left">
                        <a href="<?php echo e(Route('admin.usuarios.index')); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> <?php echo e(isset($user) ? 'Salvar' : 'Criar'); ?></button>
                    </div>
                    <div class="col-6 text-right">
                        <a href="#" class="btn btn-warning">Senha Padrão</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<br>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Renan A\Documents\Developer\estrutura\resources\views/admin/users/create.blade.php ENDPATH**/ ?>