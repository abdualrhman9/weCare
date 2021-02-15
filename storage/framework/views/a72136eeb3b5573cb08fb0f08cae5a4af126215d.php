
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <legend> Add New Skill </legend>
                <form action="<?php echo e(route('skill.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="section">Section</label>
                        <select name="section_id" id="section" class="form-control">
                            <option selected disabled>select section </option>
                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="steps">Steps</label>
                        <textarea name="steps" id="steps" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Skill">
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\laravel\we-crae\weCare\resources\views/skill/create.blade.php ENDPATH**/ ?>