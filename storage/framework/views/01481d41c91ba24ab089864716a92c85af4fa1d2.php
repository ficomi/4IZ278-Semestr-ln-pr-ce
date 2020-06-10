<?php $__env->startSection('content'); ?>
<div class="container">
    <h3><?php echo e($header); ?></h3>
    <hr>
    <div class="row justify-content-left">
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card my-card m-3 xdcard">
            <div class="card-body">
                <h4 class="card-title"><?php echo e($book->name); ?></h4>
                <ul class="listnostyle">
                    <li><?php echo e(__('Autor: ') .$book->author); ?></li>
                    <li><?php echo e(__('Jazyk: ') .$book->language); ?></li>
                </ul>
                <hr>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <span class="card-text"><?php echo e($book->price . __(' Kč')); ?></span>
                        </div>
                        <div class="col-md-7">
                            <a href="<?php echo e(route('singlebook', $book->id )); ?>"
                                class="btn btn-sm btn-primary float-right"><?php echo e(__('Detail knihy')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\FunnyBookstore\resources\views/home.blade.php ENDPATH**/ ?>