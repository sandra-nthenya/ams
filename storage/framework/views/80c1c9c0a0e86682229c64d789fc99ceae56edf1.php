<div class="col-xs-1 col-sm-1 col-md-1 col-lg-2 col-xl-2 col-xxl-2 border-rt-e6 px-0">
    <div class="d-flex flex-column align-items-center align-items-sm-start ">
                <ul class="nav flex-column pt-2 w-100">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('home')? 'active' : ''); ?>" href="<?php echo e(url('home')); ?>"><i class="ms-auto bi bi-grid"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline"><?php echo e(__('Dashboard')); ?></span></a>
                    </li>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view classes')): ?>
                    <li class="nav-item">
                        <?php
                            if (session()->has('browse_session_id')){
                                $classCount = \App\Models\SchoolClass::where('session_id', session('browse_session_id'))->count();
                            } else {
                                $latest_session = \App\Models\SchoolSession::latest()->first();
                                if($latest_session) {
                                    $classCount = \App\Models\SchoolClass::where('session_id', $latest_session->id)->count();
                                } else {
                                    $classCount = 0;
                                }
                            }
                        ?>
                        <a class="nav-link d-flex <?php echo e(request()->is('classes')? 'active' : ''); ?>" href="<?php echo e(url('classes')); ?>"><i class="bi bi-diagram-3"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Classes</span> <span class="ms-auto d-inline d-sm-none d-md-none d-xl-inline"><?php echo e($classCount); ?></span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role != "student"): ?>
                    <li class="nav-item">
                        <a type="button" href="#student-submenu" data-bs-toggle="collapse" class="d-flex nav-link <?php echo e(request()->is('students*')? 'active' : ''); ?>"><i class="bi bi-person-lines-fill"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Students</span>
                            <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                        </a>
                        <ul class="nav collapse <?php echo e(request()->is('students*')? 'show' : 'hide'); ?> bg-white" id="student-submenu">
                            <li class="nav-item w-100" <?php echo e(request()->routeIs('student.list.show')? 'style="font-weight:bold;"' : ''); ?>><a class="nav-link" href="<?php echo e(route('student.list.show')); ?>"><i class="bi bi-person-video2 me-2"></i> View Students</a></li>
                            <?php if(!session()->has('browse_session_id') && Auth::user()->role == "admin"): ?>
                            <li class="nav-item w-100" <?php echo e(request()->routeIs('student.create.show')? 'style="font-weight:bold;"' : ''); ?>><a class="nav-link" href="<?php echo e(route('student.create.show')); ?>"><i class="bi bi-person-plus me-2"></i> Add Student</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a type="button" href="#teacher-submenu" data-bs-toggle="collapse" class="d-flex nav-link <?php echo e(request()->is('teachers*')? 'active' : ''); ?>"><i class="bi bi-person-lines-fill"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Teachers</span>
                            <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                        </a>
                        <ul class="nav collapse <?php echo e(request()->is('teachers*')? 'show' : 'hide'); ?> bg-white" id="teacher-submenu">
                            <li class="nav-item w-100" <?php echo e(request()->routeIs('teacher.list.show')? 'style="font-weight:bold;"' : ''); ?>><a class="nav-link" href="<?php echo e(route('teacher.list.show')); ?>"><i class="bi bi-person-video2 me-2"></i> View Teachers</a></li>
                            <?php if(!session()->has('browse_session_id') && Auth::user()->role == "admin"): ?>
                            <li class="nav-item w-100" <?php echo e(request()->routeIs('teacher.create.show')? 'style="font-weight:bold;"' : ''); ?>><a class="nav-link" href="<?php echo e(route('teacher.create.show')); ?>"><i class="bi bi-person-plus me-2"></i> Add Teacher</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role == "teacher"): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('courses/teacher*') || request()->is('courses/assignments*'))? 'active' : ''); ?>" href="<?php echo e(route('course.teacher.list.show', ['teacher_id' => Auth::user()->id])); ?>"><i class="bi bi-journal-medical"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">My Courses</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role == "student"): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('student.attendance.show')? 'active' : ''); ?>" href="<?php echo e(route('student.attendance.show', ['id' => Auth::user()->id])); ?>"><i class="bi bi-calendar2-week"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Attendance</span></a>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('course.student.list.show')? 'active' : ''); ?>" href="<?php echo e(route('course.student.list.show', ['student_id' => Auth::user()->id])); ?>"><i class="bi bi-journal-medical"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Courses</span></a>
                    </li>
                    
                    <li class="nav-item border-bottom">
                        <?php
                            if (session()->has('browse_session_id')){
                                $class_info = \App\Models\Promotion::where('session_id', session('browse_session_id'))->where('student_id', Auth::user()->id)->first();
                            } else {
                                $latest_session = \App\Models\SchoolSession::latest()->first();
                                if($latest_session) {
                                    $class_info = \App\Models\Promotion::where('session_id', $latest_session->id)->where('student_id', Auth::user()->id)->first();
                                } else {
                                    $class_info = [];
                                }
                            }
                        ?>
                        <a class="nav-link" href="<?php echo e(route('section.routine.show', [
                            'class_id'  => $class_info->class_id,
                            'section_id'=> $class_info->section_id
                        ])); ?>"><i class="bi bi-calendar4-range"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Routine</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role != "student"): ?>
                    <li class="nav-item border-bottom">
                        <a type="button" href="#exam-grade-submenu" data-bs-toggle="collapse" class="d-flex nav-link <?php echo e(request()->is('exams*')? 'active' : ''); ?>"><i class="bi bi-file-text"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Exams / Grades</span>
                            <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                        </a>
                        <ul class="nav collapse <?php echo e(request()->is('exams*')? 'show' : 'hide'); ?> bg-white" id="exam-grade-submenu">
                            <li class="nav-item w-100" <?php echo e(request()->routeIs('exam.list.show')? 'style="font-weight:bold;"' : ''); ?>><a class="nav-link" href="<?php echo e(route('exam.list.show')); ?>"><i class="bi bi-file-text me-2"></i> View Exams</a></li>
                            <?php if(Auth::user()->role == "admin" || Auth::user()->role == "teacher"): ?>
                            <li class="nav-item w-100" <?php echo e(request()->routeIs('exam.create.show')? 'style="font-weight:bold;"' : ''); ?>><a class="nav-link" href="<?php echo e(route('exam.create.show')); ?>"><i class="bi bi-file-plus me-2"></i> Create Exams</a></li>
                            <?php endif; ?>
                            <?php if(Auth::user()->role == "admin"): ?>
                            <li class="nav-item w-100" <?php echo e(request()->routeIs('exam.grade.system.create')? 'style="font-weight:bold;"' : ''); ?>><a class="nav-link" href="<?php echo e(route('exam.grade.system.create')); ?>"><i class="bi bi-file-plus me-2"></i> Add Grade Systems</a></li>
                            <?php endif; ?>
                            <li class="nav-item w-100" <?php echo e(request()->routeIs('exam.grade.system.index')? 'style="font-weight:bold;"' : ''); ?>><a class="nav-link" href="<?php echo e(route('exam.grade.system.index')); ?>"><i class="bi bi-file-ruled me-2"></i> View Grade Systems</a></li>
                        </ul>
                    </li>
                    
                    <?php endif; ?>
                    <?php if(Auth::user()->role == "admin"): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('notice*')? 'active' : ''); ?>" href="<?php echo e(route('notice.create')); ?>"><i class="bi bi-megaphone"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Notice</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('calendar-event*')? 'active' : ''); ?>" href="<?php echo e(route('events.show')); ?>"><i class="bi bi-calendar-event"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Event</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('syllabus*')? 'active' : ''); ?>" href="<?php echo e(route('class.syllabus.create')); ?>"><i class="bi bi-journal-text"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Syllabus</span></a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link <?php echo e(request()->is('routine*')? 'active' : ''); ?>" href="<?php echo e(route('section.routine.create')); ?>"><i class="bi bi-calendar4-range"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Routine</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role == "admin"): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('academics*')? 'active' : ''); ?>" href="<?php echo e(url('academics/settings')); ?>"><i class="bi bi-tools"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Academic</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(!session()->has('browse_session_id') && Auth::user()->role == "admin"): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('promotions*')? 'active' : ''); ?>" href="<?php echo e(url('promotions/index')); ?>"><i class="bi bi-sort-numeric-up-alt"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Promotion</span></a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" aria-disabled="true"><i class="bi bi-currency-exchange"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Payment</span></a>
                    </li>
                    <?php if(Auth::user()->role == "admin"): ?>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" aria-disabled="true"><i class="bi bi-person-lines-fill"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Staff</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" aria-disabled="true"><i class="bi bi-journals"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Library</span></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/layouts/left-menu.blade.php ENDPATH**/ ?>