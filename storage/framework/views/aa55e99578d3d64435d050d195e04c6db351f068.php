<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-file-text"></i> Exams
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Exam</li>
                        </ol>
                    </nav>
                    <h6>Filter list by:</h6>
                    <div class="mb-4 mt-4">
                        <form action="<?php echo e(route('exam.list.show')); ?>" method="GET">
                            <div class="row">
                                <div class="col-3">
                                    <select class="form-select" aria-label="Class" name="class_id">
                                        <?php if(isset($classes)): ?>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($school_class->id); ?>"><?php echo e($school_class->class_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-select" aria-label="Status" name="semester_id">
                                        <?php if(isset($semesters)): ?>
                                            <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($semester->id); ?>"><?php echo e($semester->semester_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Load List</button>
                                </div>
                            </div>
                        </form>
                        <div class="bg-white mt-4 p-3 border shadow-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Starts</th>
                                        <th scope="col">Ends</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(Auth::user()->role == "admin"): ?>
                                        <tr>
                                            <td><?php echo e($exam->exam_name); ?></td>
                                            <td><?php echo e($exam->course->course_name); ?></td>
                                            <td><?php echo e($exam->created_at); ?></td>
                                            <td><?php echo e($exam->start_date); ?></td>
                                            <td><?php echo e($exam->end_date); ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('exam.rule.create', ['exam_id' => $exam->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-plus"></i> Add Rule</a>
                                                    <a href="<?php echo e(route('exam.rule.show', ['exam_id' => $exam->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View Rule</a>
                                                    
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <?php elseif(Auth::user()->role == "teacher"): ?>
                                            <?php $__currentLoopData = $teacher_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($exam->course->id != $teacher_course->course_id): ?>
                                                    <?php continue; ?>
                                                <?php else: ?>
                                                <tr>
                                                    <td><?php echo e($exam->exam_name); ?></td>
                                                    <td><?php echo e($exam->course->course_name); ?></td>
                                                    <td><?php echo e($exam->created_at); ?></td>
                                                    <td><?php echo e($exam->start_date); ?></td>
                                                    <td><?php echo e($exam->end_date); ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="<?php echo e(route('exam.rule.create', ['exam_id' => $exam->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-plus"></i> Add Rule</a>
                                                            <a href="<?php echo e(route('exam.rule.show', ['exam_id' => $exam->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View Rule</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/exams/index.blade.php ENDPATH**/ ?>