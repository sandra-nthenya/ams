<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Bespoke Schools')); ?></title>

    <link rel="shortcut icon" href="<?php echo e(asset('favicon_io/favicon.ico')); ?>">
    <link rel="shortcut icon" sizes="16x16" href="<?php echo e(asset('favicon_io/favicon-16x16.png')); ?>">
    <link rel="shortcut icon" sizes="32x32" href="<?php echo e(asset('favicon_io/favicon-32x32.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('favicon_io/apple-touch-icon.png')); ?>">
    <link rel="icon" href="<?php echo e(asset('favicon_io/android-chrome-192x192.png')); ?>" sizes="192x192">
    <link rel="icon" href="<?php echo e(asset('favicon_io/android-chrome-512x512.png')); ?>" sizes="512x512">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('js/app.js')); ?>" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white border-btm-e6">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <i class="bi bi-house"> Bespoke Schools </i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <?php if(auth()->guard()->check()): ?>
                    <?php
                    $latest_school_session = \App\Models\SchoolSession::latest()->first();
                    $current_school_session_name = null;
                    if($latest_school_session){
                    $current_school_session_name = $latest_school_session->session_name;
                    }
                    ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if(session()->has('browse_session_name') && session('browse_session_name') !==
                            $current_school_session_name): ?>
                            <a class="nav-link text-danger disabled" href="#" tabindex="-1" aria-disabled="true"><i
                                    class="bi bi-exclamation-diamond-fill me-2"></i> Browsing as Academic Session
                                <?php echo e(session('browse_session_name')); ?></a>
                            <?php elseif(\App\Models\SchoolSession::latest()->count() > 0): ?>
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Current Academic
                                Session <?php echo e($current_school_session_name); ?></a>
                            <?php else: ?>
                            <a class="nav-link text-danger disabled" href="#" tabindex="-1" aria-disabled="true"><i
                                    class="bi bi-exclamation-diamond-fill me-2"></i> Create an Academic Session.</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <?php endif; ?>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="badge bg-light text-dark"><?php echo e(ucfirst(Auth::user()->role)); ?></span>
                                <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('password.edit')); ?>">
                                    <i class="bi bi-key me-2"></i> Change Password
                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="bi bi-door-open me-2"></i> <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>


</body>

</html><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/layouts/app.blade.php ENDPATH**/ ?>