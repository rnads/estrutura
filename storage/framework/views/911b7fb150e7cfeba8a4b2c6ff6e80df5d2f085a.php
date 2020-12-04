<?php $__env->startSection('title'); ?>
    <?php echo e($form['type'] == 'create' ? 'ACL - CRIAR' : 'ACL - EDITAR'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="card shadow-lg">
      <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <h2 class="h5 m-0">
          <?php if( $form['type'] == 'create' ): ?>
            <?php echo e(__('acl::view.new_group')); ?>

          <?php else: ?>
            <?php echo e(__('acl::view.editing_group', ['group' => $group->name])); ?>

          <?php endif; ?>
        </h2>
      </div>
      <div class="card-body">

        <?php echo $__env->make('acl::_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e($form['action']); ?>" method="post">
          <?php echo csrf_field(); ?> <?php echo method_field( $form['method'] ); ?>
          <div class="form-row">
            <div class="form-group col-12 col-md-8 col-lg-6">
              <label><?php echo e(__('acl::view.name')); ?></label>
              <input type="text" name="name" value="<?php echo e(old('name') ?? $group->name ?? ''); ?>"
                     class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>">
              <?php if( $errors->has('name') ): ?>
                <small class="invalid-feedback" role="alert"><strong><?php echo e($errors->first('name')); ?></strong></small>
              <?php endif; ?>
            </div>
            <div class="form-group col-12">
              <label><?php echo e(__('acl::view.description')); ?></label>
              <input type="text" name="description" value="<?php echo e(old('description') ?? $group->description ?? ''); ?>"
                     class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>">
              <?php if( $errors->has('description') ): ?>
                <small class="invalid-feedback" role="alert"><strong><?php echo e($errors->first('description')); ?></strong>
                </small>
              <?php endif; ?>
            </div>
          </div>

          <h3 class="h4 my-3 border-bottom"><?php echo e(__('acl::view.group_permissions')); ?></h3>

          <?php $__currentLoopData = $resourcesPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <fieldset class="border px-3 pb-2 mb-4 shadow">
              <legend class="border bg-light h5 py-1 font-weight-bold">
                <div class="custom-control custom-checkbox ml-3">
                  <input type="checkbox" id="customCheck<?php echo e($resource); ?>" data-title="<?php echo e($resource); ?>"
                         class="custom-control-input toggle-box" onclick="selectAll(event)">
                  <label class="custom-control-label" for="customCheck<?php echo e($resource); ?>">
                    <?php echo e($resource); ?>

                  </label>
                </div>
              </legend>
              <div class="row">
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-12 col-md-6 col-lg-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="permissions[<?php echo e($permission->id); ?>]" value="<?php echo e($permission->id); ?>"
                             id="customCheck<?php echo e($permission->id); ?>" class="custom-control-input <?php echo e($resource); ?>"
                        <?php echo e(old("permissions[{$permission->id}]") ? 'checked' :
                        isset($group) && $group->permissions->where('id', $permission->id)->count() > 0 ? 'checked' : ''); ?>>
                      <label class="custom-control-label" for="customCheck<?php echo e($permission->id); ?>">
                        <?php echo e($permission->name); ?>

                      </label>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </fieldset>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <div class="row mt-5">
            <div class="col-12 text-right">
              <a href="<?php echo e(route(aclPrefixRoutName() . 'index')); ?>" class="btn btn-outline-secondary">
                <?php echo e(__('acl::view.cancel')); ?>

              </a>&nbsp;&nbsp;&nbsp;
              <button type="submit"
                      class="btn <?php echo e($form['type'] == 'create' ? 'btn-outline-primary' : 'btn-outline-warning'); ?>">
                <?php echo e(__('acl::view.save')); ?>

              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function () {
      Array.from(document.getElementsByClassName('toggle-box')).forEach(function (toggle) {
        var all = true;
        Array.from(document.getElementsByClassName(toggle.dataset.title)).forEach(function (permission) {
          if (!permission.checked) {
            all = false;
          }
        });
        if (all) {
          toggle.checked = true;
        }
      });
    };

    function selectAll(event) {
      var toggle = event.target;
      Array.from(document.getElementsByClassName(toggle.dataset.title)).forEach(function (permission) {
        if (toggle.checked) {
          permission.checked = true;
        } else {
          permission.checked = false;
        }
      });
    };
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Renan A\Documents\Developer\estrutura\resources\views/vendor/acl/form.blade.php ENDPATH**/ ?>