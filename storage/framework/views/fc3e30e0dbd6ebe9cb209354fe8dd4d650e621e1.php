<?php $__env->startSection('content'); ?>
<h2 class="text-center"><?php echo e(__('Detail objednávky - ') . $order->id); ?></h2>
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
                    <h4><?php echo e(__('Telefoní číslo: ')); ?><?php echo e($order->phone_number); ?></h4>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover text-center table-radius">
                <thead class="thead-dark">
                    <tr>
                        <th><?php echo e(__('Autor')); ?></th>
                        <th><?php echo e(__('Název produktu')); ?></th>
                        <th><?php echo e(__('Počet koupených knih')); ?></th>
                        <th><?php echo e(__('Cena')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <h3 class="float-right"><?php echo e(__('Celková cena objednávky: ') . $order->price); ?></h3>
        </div>
    </div>
</div>
<hr />
<div class="col-md-4">
    <a class="btn btn-danger btn-sm float-right" <?php if(auth()->user()->isAdmin()): ?> href="<?php echo e(route('adminorders')); ?>" <?php else: ?> href="<?php echo e(route('orders')); ?>"
        <?php endif; ?>><?php echo e(__('Zpět na seznam objednávek')); ?></a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/orderDetail.blade.php ENDPATH**/ ?>