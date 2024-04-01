<?php $__env->startSection('title'); ?>
    Top 3 Partners
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id='centre'>
    <h1> Top 3 Industry Partner</h1>
    <table class="bordered">
    
      <tr><th>Partner</th><th>No of Projects</th></tr>
        <?php $__currentLoopData = $top3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr><td><?php echo e($top->partnerName); ?></td><td><?php echo e($top->total); ?></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment/resources/views/top_partners.blade.php ENDPATH**/ ?>