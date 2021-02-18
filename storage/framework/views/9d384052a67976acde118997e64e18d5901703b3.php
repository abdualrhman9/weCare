

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        
                            <div class="col-md-5 mt-4">
                            
                                <div class="card text-center">
                                <div class="card-header">
                                    <p class="h2"><?php echo e($skill->name); ?></p>     
                                </div>
                                <div class="card-body">
                                    <img src="<?php echo e(asset('storage/skills_img/'.$skill->image)); ?>" alt="avatar" style="height:100px" srcset="" >
                                </div>
                                </div>
                            
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>No Skills</p>
                    <?php endif; ?>
                </div>

                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\laravel\we-crae\weCare\resources\views/skill/index.blade.php ENDPATH**/ ?>