<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger -->
    <h1>Hello Fro Test Component</h1>
    <p><?php echo e($mytitle); ?></p>
    <p> <?php echo e($message); ?> </p>
    <p><?php echo e($note); ?></p>
    <ul>
        <?php $__currentLoopData = $todo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($action); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php echo e($content); ?>

    <?php echo e($slot); ?>

</div><?php /**PATH I:\laravel\we-crae\weCare\resources\views/components/test-component.blade.php ENDPATH**/ ?>