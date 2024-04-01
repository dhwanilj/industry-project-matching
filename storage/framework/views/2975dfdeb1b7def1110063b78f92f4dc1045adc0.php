<?php $__env->startSection('title'); ?>
    Delete Project
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <h1>Delete Project</h1>

    <form method="post" action="<?php echo e(url("delete_project_action")); ?>">
        <?php echo csrf_field(); ?>
        <input type='hidden' name='projectId' value='<?php echo e($project->projectId); ?>'><br>
        Do you want to really delete this project?<br>
        <input type="submit" value="Confirm deleting project">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment/resources/views/delete_project.blade.php ENDPATH**/ ?>