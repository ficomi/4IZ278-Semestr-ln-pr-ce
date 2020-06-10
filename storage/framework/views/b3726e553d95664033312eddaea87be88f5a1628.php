<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid p-2" src="<?php echo e(Storage::url($book->image)); ?>">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center"><?php echo e($book->name); ?></h1><br />
                    <h2 class="text-center"><?php echo e($book->author); ?></h2>
                </div>
            </div>
            <hr />
            <br />
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <?php if(isset($book->genre)): ?><li><b><?php echo e(__('Žánr: ')); ?></b><?php echo e($book->genre); ?></li><?php endif; ?>
                        <?php if(isset($book->language)): ?><li><b><?php echo e(__('Jazyk: ')); ?></b><?php echo e($book->language); ?></li><?php endif; ?>
                        <?php if(isset($book->published_in)): ?><li><b><?php echo e(__('Rok vydání: ')); ?></b><?php echo e($book->published_in); ?></li><?php endif; ?>
                    </ul>


                </div>
            </div>
            <hr />
            <br />
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right">
                        <a <?php if(auth()->guard()->check()): ?> href="<?php echo e(route('bookadd', $book->id)); ?>" <?php endif; ?> <?php if(auth()->guard()->guest()): ?> href=""
                            onclick="event.preventDefault(); alert('Nejdříve se, prosím, přihlašte.');" <?php endif; ?>
                            class="btn btn-lg btn-success float-right"><?php echo e(__('Přidat do košíku')); ?></a>
                    </div>
                    <h3 class="text-center"><?php echo e($book->price); ?><?php echo e((' Kč')); ?></h3>
                </div>

            </div>
        </div>
    </div>
    <div class="row justify-content-left">

        <?php $__currentLoopData = $similairbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similairbook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card my-card m-3">
            <div class="card-body">
                <h4 class="card-title"><?php echo e($similairbook->name); ?></h4>
                <p class="card-text"><?php echo e($similairbook->author); ?></p>

            </div>
            <hr>

            <div class="card-body">
                <p class="card-text"><?php echo e($similairbook->price); ?></p>
                <a href="<?php echo e(route('singlebook', $similairbook->id )); ?>" class="btn btn-sm btn-primary float-left"><?php echo e(__('Detail knihy')); ?></a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/book.blade.php ENDPATH**/ ?>