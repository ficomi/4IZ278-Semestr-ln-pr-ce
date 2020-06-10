<?php $__env->startSection('content'); ?>
<div class="container">
    <h2><?php echo e(__('Správa knih')); ?></h2>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover text-center table-radius">
                <tbody>
                    <thead>
                        <tr>
                            <th><?php echo e(__('Autor')); ?></th>
                            <th><?php echo e(__("Název")); ?></th>
                            <th><?php echo e(__('Žánr')); ?></th>
                            <th><?php echo e(__('Cena v Kč')); ?></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center align-baseline"><?php echo e($book->author); ?></td>
                        <td class="text-center align-baseline"><?php echo e($book->name); ?></td>
                        <td class="text-center align-baseline"><?php echo e($book->genre); ?></td>
                        <td class="text-center align-baseline"><?php echo e($book->price); ?></td>
                        <td class="text-center align-baseline"><a class="btn btn-sm btn-info"
                                href="<?php echo e(route('adminbook', $book->id)); ?>"><?php echo e(__('Detailní informace knihy')); ?></a>
                        </td>
                        <td class="text-center align-baseline">
                            <form method="POST" action="<?php echo e(route('adminbookdelete', $book->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Opravdu smazat?');"><?php echo e(__('Odstranit knihu')); ?></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-7">
        <a class="btn btn-primary float-right" href="<?php echo e(route('adminbookcreate')); ?>"><?php echo e(__('Přidat novou knihu')); ?></a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\blog\resources\views/adminBooks.blade.php ENDPATH**/ ?>