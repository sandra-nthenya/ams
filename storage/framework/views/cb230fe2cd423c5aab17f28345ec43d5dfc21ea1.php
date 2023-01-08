<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-3">
                <div class="col ps-4">
                    <!-- <h1 class="display-6 mb-3"><i class="ms-auto bi bi-grid"></i> <?php echo e(__('Dashboard')); ?></h1> -->
                    <div class="row dashboard">
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Total
                                                Students</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill"><?php echo e($studentCount); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Total
                                                Teachers</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill"><?php echo e($teacherCount); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-diagram-3 me-3"></i> Total Classes
                                            </div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill"><?php echo e($classCount); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php if($studentCount > 0): ?>
                    <div class="mt-3 d-flex align-items-center">
                        <div class="col-3">
                            <span class="ps-2 me-2">Students %</span>
                            <span class="badge rounded-pill border" style="background-color: #0678c8;">Male</span>
                            <span class="badge rounded-pill border" style="background-color: #49a4fe;">Female</span>
                        </div>
                        <?php
                        $maleStudentPercentage = round(($maleStudentsBySession/$studentCount), 2) * 100;
                        $maleStudentPercentageStyle = "style='background-color: #0678c8; width:
                        $maleStudentPercentage%'";

                        $femaleStudentPercentage = round((($studentCount - $maleStudentsBySession)/$studentCount), 2) *
                        100;
                        $femaleStudentPercentageStyle = "style='background-color: #49a4fe; width:
                        $femaleStudentPercentage%'";
                        ?>
                        <div class="col-9 progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                <?php echo $maleStudentPercentageStyle; ?> aria-valuenow="<?php echo e($maleStudentPercentage); ?>"
                                aria-valuemin="0" aria-valuemax="100"><?php echo e($maleStudentPercentage); ?>%</div>
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                <?php echo $femaleStudentPercentageStyle; ?> aria-valuenow="<?php echo e($femaleStudentPercentage); ?>"
                                aria-valuemin="0" aria-valuemax="100"><?php echo e($femaleStudentPercentage); ?>%</div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="card mb-3">
                                <div class="card-header bg-transparent"><i class="bi bi-calendar-event me-2"></i> Events
                                </div>
                                <div class="card-body text-dark">
                                    <?php echo $__env->make('components.events.event-calendar', ['editable' => 'false', 'selectable' =>
                                    'false'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-3">
                                <div class="card-header bg-transparent d-flex justify-content-between"><span><i
                                            class="bi bi-megaphone me-2"></i> Notices</span> <?php echo e($notices->links()); ?>

                                </div>
                                <div class="card-body p-0 text-dark">
                                    <div>
                                        <?php if(isset($notices)): ?>
                                        <div class="accordion accordion-flush" id="noticeAccordion">
                                            <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading<?php echo e($notice->id); ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapse<?php echo e($notice->id); ?>"
                                                        aria-expanded=<?php echo e(($loop->first)?"true":"false"); ?>

                                                        aria-controls="flush-collapse<?php echo e($notice->id); ?>">
                                                        Published at: <?php echo e($notice->created_at); ?>

                                                    </button>
                                                </h2>
                                                <div id="flush-collapse<?php echo e($notice->id); ?>"
                                                    class="accordion-collapse collapse <?php echo e(($loop->first)?"show":"hide"); ?>"
                                                    aria-labelledby="flush-heading<?php echo e($notice->id); ?>"
                                                    data-bs-parent="#noticeAccordion">
                                                    <div class="accordion-body overflow-auto">
                                                        <?php echo Purify::clean($notice->notice); ?></div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php if(count($notices) < 1): ?> <div class="p-3">No notices
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/home.blade.php ENDPATH**/ ?>