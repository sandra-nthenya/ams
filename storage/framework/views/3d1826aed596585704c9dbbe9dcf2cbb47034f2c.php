<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-file-plus"></i> Create Exam</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Exam</li>
                        </ol>
                    </nav>
                    <?php echo $__env->make('session-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-md-5 mb-4">
                            <div class="p-3 border bg-light shadow-sm">
                                <form action="<?php echo e(route('exam.create')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="session_id" value="<?php echo e($current_school_session_id); ?>">
                                    <div>
                                        <p>Select Semester:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <select class="form-select" name="semester_id">
                                            <?php if(isset($semesters)): ?>
                                                <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($semester->id); ?>"><?php echo e($semester->semester_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div>
                                        <p class="mt-2">Select class:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <select onchange="getCourses(this);" class="form-select" name="class_id">
                                            <?php if(isset($classes)): ?>
                                                <option selected disabled>Please select a class</option>
                                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($school_class->id); ?>"><?php echo e($school_class->class_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div>
                                        <p class="mt-2">Select course:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <select class="form-select" id="course-select" name="course_id">
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <p>Exam name<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <input type="text" class="form-control" name="exam_name" placeholder="Quiz, Assignment, Mid term, Final, ..." aria-label="Quiz, Assignment, Mid term, Final, ...">
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputStarts" class="form-label">Starts<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="datetime-local" class="form-control" id="inputStarts" name="start_date" placeholder="Starts">
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputEnds" class="form-label">Ends<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="datetime-local" class="form-control" id="inputEnds" name="end_date" placeholder="Ends">
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
<script>
    function getCourses(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "<?php echo e(route('get.sections.courses.by.classId')); ?>?class_id=" + class_id 

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {

            var courseSelect = document.getElementById('course-select');
            courseSelect.options.length = 0;
            data.courses.unshift({'id': 0,'course_name': 'Please select a course'})
            data.courses.forEach(function(course, key) {
                courseSelect[key] = new Option(course.course_name, course.id);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/exams/create.blade.php ENDPATH**/ ?>