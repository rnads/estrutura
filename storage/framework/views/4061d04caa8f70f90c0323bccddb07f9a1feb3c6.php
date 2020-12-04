<?php $__env->startSection('title'); ?>
ACL
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-10 col-lg-8">
			<div class="card shadow-lg">
				<div class="card-header d-flex flex-row align-items-center justify-content-between">
					<h2 class="h5 m-0"><?php echo e(__('acl::view.users_groups')); ?></h2>
				</div>
				<div class="card-body">
					<?php echo $__env->make('acl::_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<div class="table-responsive">
						<table class="table table-middle table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo e(__('acl::view.group')); ?></th>
									<th><?php echo e(__('acl::view.description')); ?></th>
									<th class="text-center"><?php echo e(__('Usuários')); ?></th>
									<td class="text-right">
										<a href="<?php echo e(route(aclPrefixRoutName() . 'create')); ?>"
											class="btn btn-primary btn-sm">
											<?php echo e(__('acl::view.new')); ?>

										</a>
									</td>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($group->id); ?></td>
									<td><?php echo e($group->name); ?></td>
									<td><?php echo e($group->description); ?></td>
									<td class="text-center"><?php echo e(count($group->users)); ?></td>
									<td class="text-right">
										<a href="<?php echo e(route(aclPrefixRoutName() . 'edit', ['id' => $group->id])); ?>"
											class="btn btn-outline-warning btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
											data-target="#aclModal<?php echo e($group->id); ?>">
											<i class="fas fa-trash-alt"></i>
										</button>
										<?php echo $__env->make('acl::_confirm-modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Renan A\Documents\Developer\estrutura\resources\views/vendor/acl/index.blade.php ENDPATH**/ ?>