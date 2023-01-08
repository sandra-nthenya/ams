<?php if(session('status')): ?>
    <p class="text-success">
        <i class="bi bi-exclamation-diamond-fill me-2"></i> <?php echo e(session('status')); ?>

    </p>
<?php endif; ?>
<?php if(session('error')): ?>
    <p class="text-danger">
        <i class="bi bi-exclamation-diamond-fill me-2"></i> <?php echo e(session('error')); ?>

    </p>
<?php endif; ?>

<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p class="text-danger">
            <i class="bi bi-exclamation-diamond-fill me-2"></i>
            <?php echo e($error); ?>

        </p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/session-messages.blade.php ENDPATH**/ ?>