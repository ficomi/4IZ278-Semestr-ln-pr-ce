<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="text-center"><?php echo e(__('Úprava knihy')); ?></h2>
    <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('adminbookedit', $book->id)); ?>" aria-label="<?php echo e(__('Úprava knihy')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid p-2 rounded mx-auto d-block" width="360px" height="auto" src="<?php echo e(Storage::url($book->image)); ?>">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row justify-content-center">
                    <label for="image" class="col-md-4 col-form-label text-md-right font-weight-bold"><?php echo e(__('Nová titulní obrázek')); ?></label>

                    <div class="col-md-6">
                        <input id="image" type="file" name="image" class="form-control-file<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>">
                        <?php if($errors->has('image')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('image')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Informace o knize')); ?></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Název knihy')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e($book->name); ?>"
                                    autofocus required>
                                <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Autor')); ?></label>

                            <div class="col-md-6">
                                <input id="author" type="text" name="author" class="form-control<?php echo e($errors->has('author') ? ' is-invalid' : ''); ?>"
                                    value="<?php echo e($book->author); ?>">
                                <?php if($errors->has('author')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('author')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Žánr')); ?></label>

                            <div class="col-md-6">
                                <input id="genre" type="text" name="genre" class="form-control<?php echo e($errors->has('genre') ? ' is-invalid' : ''); ?>" value="<?php echo e($book->genre); ?>">
                                <?php if($errors->has('genre')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('genre')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Cena v Kč')); ?></label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" name="price" class="form-control<?php echo e($errors->has('price') ? ' is-invalid' : ''); ?>"
                                    value="<?php echo e($book->price); ?>" required>
                                <?php if($errors->has('price')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('price')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="language" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Jazyk')); ?></label>

                            <div class="col-md-6">
                                <input id="language" type="text" name="language" class="form-control<?php echo e($errors->has('language') ? ' is-invalid' : ''); ?>"
                                    value="<?php echo e($book->language); ?>">
                                <?php if($errors->has('language')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('language')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="published_in" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Rok vydání')); ?></label>

                            <div class="col-md-6">
                                <input id="published_in" type="number" step="1" min="0" name="published_in"
                                    class="form-control<?php echo e($errors->has('published_in') ? ' is-invalid' : ''); ?>" value="<?php echo e($book->published_in); ?>">
                                <?php if($errors->has('published_in')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('published_in')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success float-right"><?php echo e(__('Upravit knihu')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\blog\resources\views/bookEdit.blade.php ENDPATH**/ ?>