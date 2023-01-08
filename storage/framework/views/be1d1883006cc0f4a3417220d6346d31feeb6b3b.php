<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Teacher List
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Teacher List</li>
                        </ol>
                    </nav>
                    <div class="mb-4 p-3 bg-white border shadow-sm">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php if(isset($teacher->photo)): ?>
                                            <img src="<?php echo e(asset('/storage'.$teacher->photo)); ?>" class="rounded" alt="Profile picture" height="30" width="30">
                                        <?php else: ?>
                                            <i class="bi bi-person-square"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($teacher->first_name); ?></td>
                                    <td><?php echo e($teacher->last_name); ?></td>
                                    <td><?php echo e($teacher->email); ?></td>
                                    <td><?php echo e($teacher->phone); ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(url('teachers/view/profile/'.$teacher->id)); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Profile</a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit users')): ?>
                                            <a href="<?php echo e(route('teacher.edit.show', ['id' => $teacher->id])); ?>" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pen"></i> Edit</a>
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
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/teachers/list.blade.php ENDPATH**/ ?>