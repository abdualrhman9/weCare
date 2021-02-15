

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center h4">
                        Skills List
                    </div>
                    <div class="card-body">
                        <ul>
                            <?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li>
                                    <a href="nav-link">
                                        <h2><?php echo e($skill->name); ?></h2>
                                        <img src="<?php echo e(asset('storage/skills_img/'.$skill->image)); ?>" alt="avatar" width="20%" height="20%" srcset="">
                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li> No Skills At The Moment :  <a href="<?php echo e(route('home')); ?>">return</a></li>
                                
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\laravel\we-crae\weCare\resources\views/skill/index.blade.php ENDPATH**/ ?>