<?php $__env->startSection('title'); ?>
USUÁRIOS
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="card shadow-lg">
    <div class="card-header">
        <div class="row">
            <div class="col-12 col-md-10">
                <h4 class="m-0  text-primary">Usuários</h4>
            </div>
            <div class="col-12 col-md-2 text-right">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.criar')): ?>
                <a href="<?php echo e(Route('admin.usuarios.create')); ?>" class="btn btn-primary w-50">Criar</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="DataTable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td class="text-center"><?php echo $user->statusIcon; ?></td>
                        <td class="text-center">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.resetar_senha')): ?>
                            <a href="<?php echo e(route('admin.usuarios.show', $user->id)); ?>" class="btn btn-outline-info" title="RESETAR SENHA DO USUÁRIO PARA PADRÃO DO SISTEMA">
                                <i class="fas fa-key"></i>
                            </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.editar')): ?>
                            <a href="<?php echo e(route('admin.usuarios.edit', $user->id)); ?>" class="btn btn-outline-warning">
                                <i class="far fa-edit"></i>
                            </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.deletar')): ?>
                            <a href="#" class="btn btn-outline-danger modal-excluir" data-toggle="modal"
                                data-target="#modal-excluir" data-description="<?php echo e($user->name); ?>"
                                data-action="<?php echo e(route('admin.usuarios.destroy', ['usuario' => $user->id])); ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $__env->make('layouts.admin.modal-excluir', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('vendor/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/delete.js')); ?>"></script>
<script src="<?php echo e(asset('js/DataTable.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Renan A\Documents\Developer\estrutura\resources\views/admin/users/index.blade.php ENDPATH**/ ?>