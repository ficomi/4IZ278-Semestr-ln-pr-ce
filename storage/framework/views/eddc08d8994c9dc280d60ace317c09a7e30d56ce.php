<?php $__env->startSection('content'); ?>
<h2 class="text-center"><?php echo e(__('Potvrzení objednávky')); ?></h2>
<hr />
<div class="row justify-content-center">
    <div class="row">
        <div class="col-md-12">
            <ul>
                <li>
                    <h4><?php echo e(__('Ulice a č.p.: ')); ?><?php echo e($order->street); ?></h4>
                </li>
                <li>
                    <h4><?php echo e(__('PSČ: ')); ?><?php echo e($order->postal_code); ?></h4>
                </li>
                <li>
                    <h4><?php echo e(__('Město: ')); ?><?php echo e($order->city); ?></h4>
                </li>
                <li>
                    <h4><?php echo e(__('Země: ')); ?><?php echo e($order->country); ?></h4>
                </li>
                <li>
                    <h4><?php echo e(__('Telefonní číslo: ')); ?><?php echo e($order->phone_number); ?></h4>
                </li>
                <?php if(auth()->user()->isAdmin()): ?>
                <li>
                    <h4><?php echo e(__('Uživatel: ')); ?><?php echo e($order->user->email); ?></h4>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover text-center table-radius">
                <thead>
                    <tr>
                        <th><?php echo e(__('Autor')); ?></th>
                        <th><?php echo e(__('Název produktu')); ?></th>
                        <th><?php echo e(__('Počet koupených knih')); ?></th>
                        <th><?php echo e(__('Cena v Kč')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $cartBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center align-baseline"> <?php echo e($book->author); ?> </td>
                        <td class="text-center align-baseline"> <?php echo e($book->name); ?> </td>
                        <td class="text-center align-baseline"> <?php echo e($book->pivot->count); ?> </td>
                        <td class="text-center align-baseline"> <?php echo e($book->price * $book->pivot->count); ?> </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <br />
            <h3 class="float-right"><?php echo e(__('Celková cena objednávky: ') . $order->price . __(' Kč')); ?></h3>
        </div>
    </div>
</div>
<hr />
<div class="container">
    <div class="row">
        <div class="col-md-6"><a class="btn btn-danger btn-sm float-left"
                href="javascript:history.back()"><?php echo e(__('Zpět')); ?></a></div>
        <div class="col-md-6">
            <form method="POST" action="<?php echo e(route('orderstore')); ?>" aria-label="<?php echo e(__('Doručení a platba')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-primary float-right">
                    <?php echo e(__('Objednat')); ?>

                </button>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\blog\resources\views/orderConfirm.blade.php ENDPATH**/ ?>