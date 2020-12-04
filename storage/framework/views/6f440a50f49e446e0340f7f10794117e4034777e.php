<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(Route('admin.index')); ?>">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3"><?php echo e(config('app.name')); ?></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?php echo e(Route::currentRouteName() == 'admin.index' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('admin.index')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a>
    </li>

    <hr class="sidebar-divider">



    
    

    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.listar')): ?>
    <li class="nav-item <?php echo e(Route::currentRouteName() == 'admin.usuarios.index' ? 'active' : ''); ?>">
        <a class="nav-link collapsed" href="<?php echo e(route('admin.usuarios.index')); ?>">
            <i class="fas fa-users"></i>
            <span>Usuários do Sistema</span>
        </a>
    </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('acl.ver')): ?>
    <li class="nav-item <?php echo e(Route::currentRouteName() == 'admin.acl.index' ? 'active' : ''); ?>">
        <a class="nav-link collapsed" href="<?php echo e(route('admin.acl.index')); ?>">
            <i class="fas fa-shield-alt"></i>
            <span>Permissões Do Sistema</span>
        </a>
    </li>
    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<?php /**PATH C:\Users\Renan A\Documents\Developer\estrutura\resources\views/layouts/admin/menu.blade.php ENDPATH**/ ?>