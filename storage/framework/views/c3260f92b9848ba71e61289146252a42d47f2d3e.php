<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-start">
        <?php echo $__env->make('layouts.left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Add Teacher
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
                        </ol>
                    </nav>

                    <?php echo $__env->make('session-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="mb-4">
                        <form class="row g-3" action="<?php echo e(route('school.teacher.create')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">First Name<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="First Name" required value="<?php echo e(old('first_name')); ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="inputLastName" class="form-label">Last Name<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Last Name" required value="<?php echo e(old('last_name')); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required value="<?php echo e(old('email')); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword" class="form-label">Password<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="password" class="form-control" id="inputPassword" name="password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="formFile" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                                <div id="previewPhoto"></div>
                                <input type="hidden" id="photoHiddenInput" name="photo" value="">
                            </div>
                            <div class="col-md-12">
                                <label for="inputAddress" class="form-label">Address<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="634 Main St" required value="<?php echo e(old('address')); ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="inputAddress2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartment, studio, or floor" value="<?php echo e(old('address2')); ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">City<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputCity" name="city" placeholder="Dhaka..." required value="<?php echo e(old('city')); ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputZip" class="form-label">Zip<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputZip" name="zip" required value="<?php echo e(old('zip')); ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputPhone" class="form-label">Phone<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+880 01......" required value="<?php echo e(old('phone')); ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputGender" class="form-label">Gender<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <select id="inputGender" class="form-select" name="gender" required>
                                    <option value="Male" <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?>>Male</option>
                                    <option value="Female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>>Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputNationality" class="form-label">Nationality<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="e.g. Bangladeshi, German, ..." required value="<?php echo e(old('nationality')); ?>">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i> Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<?php echo $__env->make('components.photos.photo-input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\Compressed\Unified\Unifiedtransform-master\resources\views/teachers/add.blade.php ENDPATH**/ ?>