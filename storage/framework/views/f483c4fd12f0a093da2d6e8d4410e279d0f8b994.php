<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-file-plus"></i> Create Grading System</h1>
                    <?php echo $__env->make('session-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-md-5 mb-4">
                            <div class="p-3 border shadow-sm bg-light">
                                <form action="<?php echo e(route('exam.grade.system.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="session_id" value="<?php echo e($current_school_session_id); ?>">
                                    <div>
                                        <p class="mt-2">Select class:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <select class="form-select" name="class_id" required>
                                            <?php if(isset($school_classes)): ?>
                                                <?php $__currentLoopData = $school_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($school_class->id); ?>"><?php echo e($school_class->class_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div>
                                        <p class="mt-2">Select semester:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <select class="form-select" aria-label=".form-select-sm" name="semester_id" required>
                                            <?php if(isset($semesters)): ?>
                                                <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($semester->id); ?>" <?php echo e(($semester->id === request()->query('semester_id'))?'selected':''); ?>><?php echo e($semester->semester_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <p>Grading System name<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <input type="text" class="form-control" placeholder="Grading System 1" aria-label="Grading System 1" name="system_name" required>
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/exams/grade/create.blade.php ENDPATH**/ ?>