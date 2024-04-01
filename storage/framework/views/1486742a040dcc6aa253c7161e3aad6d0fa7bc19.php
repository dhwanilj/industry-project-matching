    
<?php $__env->startSection('title'); ?>
    Edit Project
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div id='centre'>
    <h1>Edit Project</h1>
    <form method="post" action="<?php echo e(url("edit_project_action")); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="projectId" value="<?php echo e($project->projectId); ?>">
        <p>
        <label>Project Title: </label>
        <input type="text" name="projectTitle" value="<?php echo e($project->projectTitle); ?>">
        </p>
        <p>
        <label>Project Field:</label>
        <select name="projectField">
            <option value="<?php echo e($project->projectField); ?>"><?php echo e($project->projectField); ?></option>
            <option value="Software Development">Software Development</option>
            <option value="Data Analytics">Data Analytics</option>
            <option value="Network and Security">Network and Security</option>
            <option value="Information Systems and Enterprise Architecture">Information Systems and Enterprise Architecture</option>
        </select> 
        </p>
        <p>
        <label>Project Description:</label>
        <input type="text" name="projectDetails" value="<?php echo e($project->projectDetails); ?>">
        </p>
        <p>
        <label>Number Of Students:</label>
        <select name="NoOfStudents">
            <option value="<?php echo e($project->NoOfStudents); ?>"><?php echo e($project->NoOfStudents); ?></option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        </p>
        <input type="submit" value="Edit Project">
    </form> 
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment/resources/views/edit_project.blade.php ENDPATH**/ ?>