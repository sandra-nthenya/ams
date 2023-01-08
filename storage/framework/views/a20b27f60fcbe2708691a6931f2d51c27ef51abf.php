<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-diagram-3"></i> Classes</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Classes</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <?php if(isset($school_classes)): ?>
                            <?php $__currentLoopData = $school_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $total_sections = 0;
                            ?>
                                <div class="col-12">
                                    <div class="card my-3">
                                        <div class="card-header bg-transparent">
                                            <ul class="nav nav-tabs card-header-tabs">
                                                <li class="nav-item">
                                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#class<?php echo e($school_class->id); ?>" role="tab" aria-current="true"><i class="bi bi-diagram-3"></i> <?php echo e($school_class->class_name); ?></button>
                                                </li>
                                                <li class="nav-item">
                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#class<?php echo e($school_class->id); ?>-syllabus" role="tab" aria-current="false"><i class="bi bi-journal-text"></i> Syllabus</button>
                                                </li>
                                                <li class="nav-item">
                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#class<?php echo e($school_class->id); ?>-courses" role="tab" aria-current="false"><i class="bi bi-journal-medical"></i> Courses</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body text-dark">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="class<?php echo e($school_class->id); ?>" role="tabpanel">
                                                    <div class="accordion" id="accordionClass<?php echo e($school_class->id); ?>">
                                                        <?php if(isset($school_sections)): ?>
                                                            <?php $__currentLoopData = $school_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($school_section->class_id == $school_class->id): ?>
                                                                    <?php
                                                                        $total_sections++;
                                                                    ?>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="headingClass<?php echo e($school_class->id); ?>Section<?php echo e($school_section->id); ?>">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionClass<?php echo e($school_class->id); ?>Section<?php echo e($school_section->id); ?>" aria-expanded="false" aria-controls="accordionClass<?php echo e($school_class->id); ?>Section<?php echo e($school_section->id); ?>">
                                                                            <?php echo e($school_section->section_name); ?>

                                                                        </button>
                                                                        </h2>
                                                                        <div id="accordionClass<?php echo e($school_class->id); ?>Section<?php echo e($school_section->id); ?>" class="accordion-collapse collapse" aria-labelledby="headingClass<?php echo e($school_class->id); ?>Section<?php echo e($school_section->id); ?>" data-bs-parent="#accordionClass<?php echo e($school_class->id); ?>">
                                                                            <div class="accordion-body">
                                                                                <p class="lead d-flex justify-content-between">
                                                                                    <span>Room No: <?php echo e($school_section->room_no); ?></span>
                                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit sections')): ?>
                                                                                    <span><a href="<?php echo e(route('section.edit', ['id' => $school_section->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Edit</a></span>
                                                                                    <?php endif; ?>
                                                                                </p>
                                                                                <div class="list-group">
                                                                                    <a href="<?php echo e(route('student.list.show', ['class_id' => $school_class->id, 'section_id' => $school_section->id, 'section_name' => $school_section->section_name])); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                                                        View Students
                                                                                    </a>
                                                                                    <a href="<?php echo e(route('section.routine.show', ['class_id' => $school_class->id, 'section_id' => $school_section->id])); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                                                        View Routine
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="class<?php echo e($school_class->id); ?>-syllabus" role="tabpanel">
                                                    <?php if(isset($school_class->syllabi)): ?>
                                                    <table class="table table-borderless">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Syllabus Name</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__currentLoopData = $school_class->syllabi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $syllabus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                            <td><?php echo e($syllabus->syllabus_name); ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <a href="<?php echo e(asset('storage/'.$syllabus->syllabus_file_path)); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-download"></i> Download</a>
                                                                </div>
                                                            </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="tab-pane fade" id="class<?php echo e($school_class->id); ?>-courses" role="tabpanel">
                                                    <?php if(isset($school_class->courses)): ?>
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">Course Name</th>
                                                                <th scope="col">Type</th>
                                                                <th scope="col">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $__currentLoopData = $school_class->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($course->course_name); ?></td>
                                                                <td><?php echo e($course->course_type); ?></td>
                                                                <td>
                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit courses')): ?>
                                                                    <a href="<?php echo e(route('course.edit', ['id' => $course->id])); ?>" class="btn btn-sm btn-outline-primary" role="button"><i class="bi bi-pencil"></i> Edit</a>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-transparent d-flex justify-content-between">
                                            <?php if(isset($total_sections)): ?>
                                                <span>Total Sections: <?php echo e($total_sections); ?></span>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit classes')): ?>
                                            <span><a href="<?php echo e(route('class.edit', ['id' => $school_class->id])); ?>" class="btn btn-sm btn-outline-primary" role="button"><i class="bi bi-pencil"></i> Edit Class</a></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/classes/index.blade.php ENDPATH**/ ?>