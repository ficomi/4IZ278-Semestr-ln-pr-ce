<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Black Books')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Black Books')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(__('Žánry')); ?><span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('kids')); ?>">Dětská literatura</a>
                                <a class="dropdown-item" href="<?php echo e(route('beletry')); ?>">Beletrie</a>
                                <a class="dropdown-item" href="<?php echo e(route('detective')); ?>">Detektivky</a>
                                <a class="dropdown-item" href="<?php echo e(route('fantasy')); ?>">Sci-fi a fantasy</a>
                                <a class="dropdown-item" href="<?php echo e(route('edu')); ?>">Populárně naučné</a>
                                <a class="dropdown-item" href="<?php echo e(route('other')); ?>">Ostatní žánry</a>
                            </div>

                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Přihlášení')); ?></a>
                        </li>
                        <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Registrace')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('shoppingcartshow')); ?>">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                <?php if(auth()->user()): ?>
                                <a class="dropdown-item" href="<?php echo e(route('orders')); ?>">
                                    <?php echo e(__('Moje objednávky')); ?>

                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('wishlistshow')); ?>">
                                    <?php echo e(__('Můj wishlist')); ?>

                                </a>
                                <?php endif; ?>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Odhlášení')); ?>

                                </a>
                                <?php if(auth()->user()->isAdmin()): ?>
                                <a class="dropdown-item" href="<?php echo e(route('adminbooks')); ?>">
                                    <?php echo e(__('Správa knih')); ?>

                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('adminorders')); ?>">
                                    <?php echo e(__('Správa objednávek')); ?>

                                </a>
                                <?php endif; ?>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php if(session('success')): ?>
            <div class="alert alert-success text-center">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
            <div class="alert alert-danger text-center">
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>
            <?php if(session('warning')): ?>
            <div class="warningFile alert alert-warning text-center">
                <?php echo e(session('warning')); ?>

            </div>
            <?php endif; ?>
            <?php if(session('status')): ?>
            <div class="warningFile alert alert-warning text-center">
                <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>
            <?php if(!empty($successMsg)): ?>
            <div class="alert alert-success text-center"> <?php echo e($successMsg); ?></div>
            <?php endif; ?>
            <?php if(!empty($errorMsg)): ?>
            <div class="alert alert-danger text-center"> <?php echo e($errorMsg); ?></div>
            <?php endif; ?>
            <?php if(!empty($warningMsg)): ?>
            <div class="warningFile alert alert-warning text-center"> <?php echo e($warningMsg); ?></div>
            <?php endif; ?>
            <?php if(!empty($statusMsg)): ?>
            <div class="warningFile alert alert-warning text-center"> <?php echo e($statusMsg); ?></div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <div class="footer mt-auto p-4">
            <div class="row justify-content-center">
                <a class="text-center" href="<?php echo e(route('privacy')); ?>"><?php echo e(__('Privacy and policy')); ?></a>
            </div>
        </div>
    </div>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\FunnyBookstore\resources\views/layouts/app.blade.php ENDPATH**/ ?>