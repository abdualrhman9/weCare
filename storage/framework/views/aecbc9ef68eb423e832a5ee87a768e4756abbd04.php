<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>
                <div class="card-body">
                    <div class="row">
                        <a href="<?php echo e(route('skill.create')); ?>" class="btn btn-dark mr-2"> Create Skill </a>
                        <a href="<?php echo e(route('skill.index')); ?>" class="btn btn-dark "> Skills List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\laravel\we-crae\weCare\resources\views/home.blade.php ENDPATH**/ ?>