<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    

    <link href="<?php echo e(asset('vendor/datatable/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo e(asset('css/reload.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/select2.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">


    <?php echo notifyCss(); ?>

</head>


<body id="page-top">

    <div id="wrapper">

        <?php echo $__env->make('layouts.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="container-fluid">

                    <?php echo $__env->yieldContent('content'); ?>

                </div>

            </div>
            <br>
            <?php echo $__env->make('layouts.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php echo $__env->make('layouts.admin.reload', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.admin.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('notify::messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('acl::_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    

    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>" ></script>
    <?php echo notifyJs(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html>
<?php /**PATH C:\Users\Renan A\Documents\Developer\estrutura\resources\views/layouts/admin/master.blade.php ENDPATH**/ ?>