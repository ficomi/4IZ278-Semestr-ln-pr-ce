<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e(__('Nákupní košík')); ?></h1>
    <hr />
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php if(count($books)<1): ?> <div class="jumbotron text-center">
                <h3><?php echo e(__('Ve vašem košíku nic není')); ?></h3>
        </div>
        <?php else: ?>
        <form method="POST" action="<?php echo e(route('updatecount')); ?>">
            <?php echo csrf_field(); ?>
            <table class="table table-striped table-bordered table-hover text-center table-radius">
                <thead class="thead-info">
                    <tr>
                        <th><?php echo e(__('Autor')); ?></th>
                        <th><?php echo e(__('Název produktu')); ?></th>
                        <th><?php echo e(__('Cena jednoho kusu v Kč')); ?></th>
                        <th><?php echo e(__('Počet knih')); ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center align-baseline"> <?php echo e($book->author); ?> </td>
                        <td class="text-center align-baseline"> <?php echo e($book->name); ?> </td>
                        <td class="text-center align-baseline"> <?php echo e($book->price); ?> </td>
                        <td class="text-center align-baseline xdtd"> <input type="number"
                                class="form-control <?php if ($errors->has('count'.$book->id)) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('count'.$book->id); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                name="count<?php echo e($book->id); ?>" value="<?php echo e($book->pivot->count); ?>" />
                            <?php if ($errors->has('count'.$book->id)) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('count'.$book->id); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> </td>
                        <td class="text-center align-baseline"><a class="btn btn-danger"
                                href="<?php echo e(route('shoppingcartdelete', $book->id)); ?>" onclick="event.preventDefault();
                        document.getElementById('delete<?php echo e($book->id); ?>').submit();"><?php echo e(__('Odebrat z košíku')); ?></a> </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="col-md-6 float-right">
                <button type="submit"
                    class="btn btn-lg btn-success float-right"><?php echo e(__('Pokračovat k objednávce')); ?></button>
            </div>
        </form>
        <?php endif; ?>
    </div>
</div>
</div>
<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form id="delete<?php echo e($book->id); ?>" method="POST" action="<?php echo e(route('shoppingcartdelete', $book->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('delete'); ?>
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\FunnyBookstore\resources\views/shoppingcart.blade.php ENDPATH**/ ?>