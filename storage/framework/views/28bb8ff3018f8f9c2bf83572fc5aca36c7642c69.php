<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/fullcalendar5.9.0.min.css')); ?>">
<script src="<?php echo e(asset('js/fullcalendar5.9.0.main.min.js')); ?>"></script>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-calendar2-week"></i> View Attendance
                    </h1>

                    <h5><i class="bi bi-person"></i> Student Name: <?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?></h5>
                    <div class="row mt-3">
                        <div class="col bg-white p-3 border shadow-sm">
                            <div id="attendanceCalendar"></div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col bg-white border shadow-sm p-3">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Context</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if($attendance->status == "on"): ?>
                                                    <span class="badge bg-success">PRESENT</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">ABSENT</span>
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td><?php echo e($attendance->created_at); ?></td>
                                            <td><?php echo e(($attendance->section == null)?$attendance->course->course_name:$attendance->section->section_name); ?></td>
                                        </tr>
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
<?php
$events = array();
if(count($attendances) > 0){
    foreach ($attendances as $attendance){
        if($attendance->status == "on"){
            $events[] = ['title'=> "Present", 'start' => $attendance->created_at, 'color'=>'green'];
        } else {
            $events[] = ['title'=> "Absent", 'start' => $attendance->created_at, 'color'=>'red'];
        }
    }
}
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('attendanceCalendar');
    var attEvents = <?php echo json_encode($events, 15, 512) ?>;
                            
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 350,
        events: attEvents,
    });
    calendar.render();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/attendances/attendance.blade.php ENDPATH**/ ?>