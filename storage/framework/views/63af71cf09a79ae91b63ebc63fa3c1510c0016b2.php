<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Student List
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student List</li>
                        </ol>
                    </nav>
                    <?php echo $__env->make('session-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h6>Filter list by:</h6>
                    <div class="mb-4 mt-4">
                        <form class="row" action="<?php echo e(route('student.list.show')); ?>" method="GET">
                            <div class="col">
                                <select onchange="getSections(this);" class="form-select" aria-label="Class" name="class_id" required>
                                    <?php if(isset($school_classes)): ?>
                                        <option selected disabled>Please select a class</option>
                                        <?php $__currentLoopData = $school_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school_class->id); ?>" <?php echo e(($school_class->id == request()->query('class_id'))?'selected="selected"':''); ?>><?php echo e($school_class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" id="section-select" aria-label="Section" name="section_id" required>
                                    <option value="<?php echo e(request()->query('section_id')); ?>"><?php echo e(request()->query('section_name')); ?></option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Load List</button>
                            </div>
                        </form>
                        <?php $__currentLoopData = $studentList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                                <p class="mt-3"><b>Section:</b> <?php echo e($student->section->section_name); ?></p>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white border shadow-sm p-3 mt-4">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Card Number</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $studentList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($student->id_card_number); ?></th>
                                        <td>
                                            <?php if(isset($student->student->photo)): ?>
                                                <img src="<?php echo e(asset('/storage'.$student->student->photo)); ?>" class="rounded" alt="Profile picture" height="30" width="30">
                                            <?php else: ?>
                                                <i class="bi bi-person-square"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($student->student->first_name); ?></td>
                                        <td><?php echo e($student->student->last_name); ?></td>
                                        <td><?php echo e($student->student->email); ?></td>
                                        <td><?php echo e($student->student->phone); ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="<?php echo e(route('student.attendance.show', ['id' => $student->student->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Attendance</a>
                                                <a href="<?php echo e(url('students/view/profile/'.$student->student->id)); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Profile</a>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit users')): ?>
                                                <a href="<?php echo e(route('student.edit.show', ['id' => $student->student->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pen"></i> Edit</a>
                                                <?php endif; ?>
                                                
                                            </div>
                                        </td>
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
<script>
    function getSections(obj) {
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
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/students/list.blade.php ENDPATH**/ ?>