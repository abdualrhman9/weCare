<div class="">
    <h1>Test View</h1>
    <?php if (isset($component)) { $__componentOriginalfbfebd70677490a505cae8b2482ccc52c5aaba3f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TestComponent::class, ['mytitle' => 'Very Cool Title','message' => $message]); ?>
<?php $component->withName('test-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('content'); ?>  
        <p > Hello Fro Named Slot </p>
     <?php $__env->endSlot(); ?>
        <h3>Additional Content</h3>
     <?php if (isset($__componentOriginalfbfebd70677490a505cae8b2482ccc52c5aaba3f)): ?>
<?php $component = $__componentOriginalfbfebd70677490a505cae8b2482ccc52c5aaba3f; ?>
<?php unset($__componentOriginalfbfebd70677490a505cae8b2482ccc52c5aaba3f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
</div><?php /**PATH I:\laravel\we-crae\weCare\resources\views/test.blade.php ENDPATH**/ ?>