<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(auth()->user()->isAdmin()): ?> <h2><?php echo e(__('Všechny objednávky')); ?></h2> <?php else: ?> <h2><?php echo e(__('Moje objednávky')); ?></h2> <?php endif; ?>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <?php if(count($orders)<1): ?> <div class="jumbotron row justify-content-center">
                <h3 class="center-text"><?php echo e(__('Nemáte žádné objednávky')); ?></h3>
        </div>
        <?php else: ?>
        <table class="table table-striped table-bordered table-hover text-center table-radius">
            <tbody>
                <thead>
                    <tr>
                        <th><?php echo e(__('Číslo objednávky')); ?></th>
                        <th><?php echo e(__('Datum vytvoření')); ?></th>
                        <th><?php echo e(__('Cena objednávky')); ?></th>
                        <th><?php echo e(__('Stav objednávky')); ?></th>
                        <th></th>
                        <?php if(auth()->user()->isAdmin()): ?>
                        <th><?php echo e(__('Uživatel')); ?></th>
                        <th></th>
                        <th></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center align-baseline"><?php echo e($order->id); ?></td>
                    <td class="text-center align-baseline"><?php echo e($order->created_at); ?></td>
                    <td class="text-center align-baseline"><?php echo e($order->price . __(' Kč')); ?></td>
                    <td class="text-center align-baseline"><?php echo e($order->status); ?></td>
                    <td class="text-center align-baseline"><a class="btn btn-sm btn-info"
                            href="<?php echo e(route('ordershow', $order->id)); ?>"><?php echo e(__('Detail objednávky')); ?></a>
                    </td>
                    <?php if(auth()->user()->isAdmin()): ?>
                    <td><?php echo e($order->user->email); ?></td>
                    <td>
                        <?php if($order->status == 'Doručeno'): ?>
                        <?php echo e(__('Objednávka je doručená.')); ?>

                        <?php else: ?>
                        <form method="POST" action="<?php echo e(route('adminorderstatus', $order->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-info">
                                <?php if($order->status == 'Objednáno'): ?>
                                <?php echo e(__('Nastavit na "Na cestě"')); ?>

                                <?php else: ?>
                                <?php echo e(__('Nastavit na "Doručena"')); ?>

                                <?php endif; ?>
                            </button>
                        </form>
                        <?php endif; ?>
                    </td>
                    <td class="text-center align-baseline">
                        <form method="POST" action="<?php echo e(route('adminorderdelete', $order->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Opravdu smazat?');"><?php echo e(__('Smazat objednávku')); ?></button>
                        </form>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\blog\resources\views/orders.blade.php ENDPATH**/ ?>