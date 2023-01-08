<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('js/masonry.pkgd.min.js')); ?>"></script>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-tools"></i> Academic Settings
                    </h1>

                    <?php echo $__env->make('session-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="mb-4">
                        <div class="row" data-masonry='{"percentPosition": true }'>
                            <?php if($latest_school_session_id == $current_school_session_id): ?>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Create Session</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Create one Session per academic year. Last created session will be considered as the latest academic session.</small>
                                    </p>
                                    <form action="<?php echo e(route('school.session.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="2021 - 2022" aria-label="Current Session" name="session_name" required>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Create</button>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Browse by Session</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Only use this when you want to browse data from previous Sessions.</small>
                                    </p>
                                    <form action="<?php echo e(route('school.session.browse')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <p class="mt-2">Select "Session" to browse by:</p>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm" name="session_id" required>
                                            <?php if(isset($school_sessions)): ?>
                                                <?php $__currentLoopData = $school_sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($school_session->id); ?>"><?php echo e($school_session->session_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Set</button>
                                    </form>
                                </div>
                            </div>
                            <?php if($latest_school_session_id == $current_school_session_id): ?>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Create Semester for Current Session</h6>
                                    <form action="<?php echo e(route('school.semester.create')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                    <input type="hidden" name="session_id" value="<?php echo e($current_school_session_id); ?>">
                                    <div class="mt-2">
                                        <p>Semester name<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <input type="text" class="form-control form-control-sm" placeholder="First Semester" aria-label="Semester name" name="semester_name" required>
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputStarts" class="form-label">Starts<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="date" class="form-control form-control-sm" id="inputStarts" placeholder="Starts" name="start_date" required>
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputEnds" class="form-label">Ends<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="date" class="form-control form-control-sm" id="inputEnds" placeholder="Ends" name="end_date" required>
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Create</button>
                                </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Attendance Type</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Do not change the type in the middle of a Semester.</small>
                                    </p>
                                    <form action="<?php echo e(route('school.attendance.type.update')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type" id="attendance_type_section" <?php echo e(($academic_setting->attendance_type == 'section')?'checked="checked"':null); ?> value="section">
                                            <label class="form-check-label" for="attendance_type_section">
                                                Attendance by Section
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type" id="attendance_type_course" <?php echo e(($academic_setting->attendance_type == 'course')?'checked="checked"':null); ?> value="course">
                                            <label class="form-check-label" for="attendance_type_course">
                                                Attendance by Course
                                            </label>
                                        </div>

                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Save</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Create Class</h6>
                                    <form action="<?php echo e(route('school.class.create')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="session_id" value="<?php echo e($current_school_session_id); ?>">
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-sm" name="class_name" placeholder="Class name" aria-label="Class name" required>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Create</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                <h6>Create Section</h6>
                                    <form action="<?php echo e(route('school.section.create')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="session_id" value="<?php echo e($current_school_session_id); ?>">
                                        <div class="mb-3">
                                            <input class="form-control form-control-sm" name="section_name" type="text" placeholder="Section name" required>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-sm" name="room_no" type="text" placeholder="Room No." required>
                                        </div>
                                        <div>
                                            <p>Assign section to class:</p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                <?php if(isset($school_classes)): ?>
                                                    <?php $__currentLoopData = $school_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($school_class->id); ?>"><?php echo e($school_class->class_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Save</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Create Course</h6>
                                    <form action="<?php echo e(route('school.course.create')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="session_id" value="<?php echo e($current_school_session_id); ?>">
                                        <div class="mb-1">
                                            <input type="text" class="form-control form-control-sm" name="course_name" placeholder="Course name" aria-label="Course name" required>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mt-2">Course Type:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" name="course_type" aria-label=".form-select-sm" required>
                                                <option value="Core">Core</option>
                                                <option value="General">General</option>
                                                <option value="Elective">Elective</option>
                                                <option value="Optional">Optional</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Assign to semester:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="semester_id" required>
                                                <?php if(isset($semesters)): ?>
                                                    <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($semester->id); ?>"><?php echo e($semester->semester_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Assign to class:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                <?php if(isset($school_classes)): ?>
                                                    <?php $__currentLoopData = $school_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($school_class->id); ?>"><?php echo e($school_class->class_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Create</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Assign Teacher</h6>
                                    <form action="<?php echo e(route('school.teacher.assign')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="session_id" value="<?php echo e($current_school_session_id); ?>">
                                        <div class="mb-3">
                                            <p class="mt-2">Select Teacher:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="teacher_id" required>
                                                <?php if(isset($teachers)): ?>
                                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->first_name); ?> <?php echo e($teacher->last_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Assign to semester:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="semester_id" required>
                                                <?php if(isset($semesters)): ?>
                                                    <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($semester->id); ?>"><?php echo e($semester->semester_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div>
                                            <p>Assign to class:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select onchange="getSectionsAndCourses(this);" class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                <?php if(isset($school_classes)): ?>
                                                    <option selected disabled>Please select a class</option>
                                                    <?php $__currentLoopData = $school_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($school_class->id); ?>"><?php echo e($school_class->class_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mt-2">Assign to section:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" id="section-select" aria-label=".form-select-sm" name="section_id" required>
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mt-2">Assign to course:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" id="course-select" aria-label=".form-select-sm" name="course_id" required>
                                            </select>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Save</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Allow Final Marks Submission</h6>
                                    <form action="<?php echo e(route('school.final.marks.submission.status.update')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <p class="text-danger">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Usually teachers are allowed to submit final marks just before the end of a "Semester".</small>
                                        </p>
                                        <p class="text-primary">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Disallow at the start of a "Semester".</small>
                                        </p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="marks_submission_status" id="marks_submission_status_check" <?php echo e(($academic_setting->marks_submission_status == 'on')?'checked="checked"':null); ?>>
                                            <label class="form-check-label" for="marks_submission_status_check"><?php echo e(($academic_setting->marks_submission_status == 'on')?'Allowed':'Disallowed'); ?></label>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Save</button>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<script>
    function getSectionsAndCourses(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "<?php echo e(route('get.sections.courses.by.classId')); ?>?class_id=" + class_id 

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {
            var sectionSelect = document.getElementById('section-select');
            sectionSelect.options.length = 0;
            data.sections.unshift({'id': 0,'section_name': 'Please select a section'})
            data.sections.forEach(function(section, key) {
                sectionSelect[key] = new Option(section.section_name, section.id);
            });

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/academics/settings.blade.php ENDPATH**/ ?>