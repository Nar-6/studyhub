<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <h3 class="mx-auto text-center">
                    <a class="nav-link text-center" href="<?php echo e(route('etudiant.test')); ?>">
                        <?php echo e(__('Test')); ?>

                    </a></h3>
                <h5 class="mx-auto text-center d-flex">
                    <!-- <?php if(auth()->guard()->check()): ?> -->
                        <a class="nav-link text-center" href="<?php echo e(route('dashboard.index')); ?>">
                            <!-- <?php echo e(auth()->user()->name); ?> -->
                        </a>
                        <a class="nav-link text-center" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="<?php echo e(route('logout')); ?>">
                            Logout
                        </a>
                    <!-- <?php endif; ?> -->
                    <form class="d-none" action="<?php echo e(route('logout')); ?>" id="logout-form" method="post">
                        <?php echo csrf_field(); ?>

                    </form>
                </h5>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>

</html>
<?php /**PATH C:\Users\EliteBook 830 G8\Documents\document_sauvegarde\studyhub\resources\views/layouts/etudiant.blade.php ENDPATH**/ ?>