<?php $__env->startSection('content'); ?>
<div class="container">
    <form method="POST" action="<?php echo e(route('orderconfirm')); ?>" aria-label="<?php echo e(__('Doručení a platba')); ?>">
        <?php echo csrf_field(); ?>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Doručení a platba')); ?></div>
                    <div class="card-body">


                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right font-weight-bold"><?php echo e(__('Ulice a č. p.')); ?></label>

                            <div class="col-md-6">
                                <input id="street" type="text" name="street" class="form-control<?php echo e($errors->has('street') ? ' is-invalid' : ''); ?>"
                                    value="<?php echo e(old('street')); ?>" required>
                                <?php if($errors->has('street')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('street')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right font-weight-bold"><?php echo e(__('PSČ')); ?></label>

                            <div class="col-md-6">
                                <input id="postal_code" type="number" name="postal_code" class="form-control<?php echo e($errors->has('postal_code') ? ' is-invalid' : ''); ?>"
                                    value="<?php echo e(old('postal_code')); ?>" required>
                                <?php if($errors->has('postal_code')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('postal_code')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right font-weight-bold"><?php echo e(__('Město')); ?></label>

                            <div class="col-md-6">
                                <input id="city" type="text" name="city" class="form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('city')); ?>"
                                    required>
                                <?php if($errors->has('city')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('city')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right font-weight-bold"><?php echo e(__('Zěmě')); ?></label>

                            <div class="col-md-6">
                                <input id="country" type="text" name="country" class="form-control<?php echo e($errors->has('country') ? ' is-invalid' : ''); ?>"
                                    value="<?php echo e(old('country')); ?>" required>
                                <?php if($errors->has('country')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('country')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right font-weight-bold"><?php echo e(__('Telefonní číslo')); ?></label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" name="phone_number" class="form-control<?php echo e($errors->has('phone_number') ? ' is-invalid' : ''); ?>"
                                    value="<?php echo e(old('phone_number')); ?>" required>
                                <?php if($errors->has('phone_number')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-md-4 col-form-label text-md-right font-weight-bold"><?php echo e(__('Způsob platby')); ?></label>

                            <div class="col-md-6">
                                <select id="payment" class="form-control" name="payment">
                                    <option <?php echo e(old('payment') == 'Karta' ? "selected":""); ?> value="Karta"><?php echo e(__('Kartou')); ?></option>
                                    <option <?php echo e(old('payment') == 'Dobírka' ? "selected":""); ?> value="Dobírka"><?php echo e(__('Dobírkou')); ?></option>
                                </select>
                                <?php if($errors->has('payment')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('payment')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Pokračovat')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sem\blog\resources\views/orderCreate.blade.php ENDPATH**/ ?>