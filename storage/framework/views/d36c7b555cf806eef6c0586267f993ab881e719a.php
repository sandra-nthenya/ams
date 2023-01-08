<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-file-text"></i> View Grading Systems
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Grading Systems</li>
                        </ol>
                    </nav>
                    <div class="mb-4 p-3 bg-white border shadow-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">System Name</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($gradingSystems)): ?>
                                    <?php $__currentLoopData = $gradingSystems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gradingSystem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($gradingSystem->system_name); ?></td>
                                        <td><?php echo e($gradingSystem->schoolClass->class_name); ?></td>
                                        <td><?php echo e($gradingSystem->semester->semester_name); ?></td>
                                        <td><?php echo e($gradingSystem->created_at); ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="<?php echo e(route('exam.grade.system.rule.create', ['grading_system_id' => $gradingSystem->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-plus"></i> Add Rule</a>
                                                <a href="<?php echo e(route('exam.grade.system.rule.show', ['grading_system_id' => $gradingSystem->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View Rules</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/exams/grade/view.blade.php ENDPATH**/ ?>