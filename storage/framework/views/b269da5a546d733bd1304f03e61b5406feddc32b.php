    
<?php $__env->startSection('title'); ?>
    Work Integrated Learning
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div id='centre'>
    <h1> Projects </h1>
    <table class="bordered"> 
        <tr><th>Project Title</th><th>Partner</th><th>Location</th><th>Number Of Applicants</th></tr>
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr><td><a href="<?php echo e(url("project_detail/$project->projectId")); ?>"><?php echo e($project->projectTitle); ?></a></td>  <td><?php echo e($project->partnerName); ?></td><td><?php echo e($project->partnerLocation); ?></td><td><?php echo e($project->NoOfApplication); ?></td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <br>
    <br>

    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment/resources/views/home.blade.php ENDPATH**/ ?>