<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col-md-5 ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-journal-text"></i> Create Syllabus</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Syllabus</li>
                        </ol>
                    </nav>
                    <?php echo $__env->make('session-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="p-3 border bg-light shadow-sm">
                        <form action="<?php echo e(route('syllabus.store')); ?>" method="POST"  enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="session_id" value="<?php echo e($current_school_session_id); ?>">
                            <div class="mb-3">
                                <p>Add Syllabus to class:</p>
                                <select onchange="getCourses(this);" class="form-select" name="class_id" required>
                                    <?php if(isset($school_classes)): ?>
                                        <option selected disabled>Please select a class</option>
                                        <?php $__currentLoopData = $school_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($school_class->id); ?>"><?php echo e($school_class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <p class="mb-2">Select course:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                <select class="form-select" id="course-select" name="course_id">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="syllabus-name" class="form-label">Syllabus Name</label>
                                <input type="text" class="form-control" id="syllabus-name" name="syllabus_name" placeholder="Syllabus Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="syllabus-file" class="form-label">Syllabus File</label>
                                <input type="file" name="file" class="form-control" id="syllabus-file" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" required>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Create</button>
                            </div>
                        </form>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/syllabi/create.blade.php ENDPATH**/ ?>