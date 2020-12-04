<div class="modal fade" id="aclModal<?php echo e($group->id); ?>" tabindex="-1" role="dialog"
     aria-labelledby="aclModal<?php echo e($group->id); ?>Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"
            id="aclModal<?php echo e($group->id); ?>Label"><?php echo e(__('acl::view.confirm_delete_title', ['group' => $group->name])); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <form id="form-<?php echo e($group->id); ?>" action="<?php echo e(route(aclPrefixRoutName() . 'destroy', ['id' => $group->id])); ?>"
              method="post">
          <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
          <?php if( $group->users()->count() ): ?>
            <p><?php echo e(__('acl::view.confirm_delete_msg1')); ?></p>
            <p>
              <select name="group_new_assoc" class="form-control">
                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if( $g->id != $group->id ): ?>
                    <option value="<?php echo e($g->id); ?>"><?php echo e($g->name); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </p>
          <?php else: ?>
            <p><?php echo e(__('acl::view.confirm_delete_msg2')); ?></p>
          <?php endif; ?>
          <div class="text-right">
            <button type="button" class="btn btn-outline-secondary"
                    data-dismiss="modal"><?php echo e(__('acl::view.cancel')); ?></button>
            <button type="submit" class="btn btn-outline-danger"><?php echo e(__('acl::view.delete')); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\Users\Renan A\Documents\Developer\estrutura\resources\views/vendor/acl/_confirm-modal-delete.blade.php ENDPATH**/ ?>