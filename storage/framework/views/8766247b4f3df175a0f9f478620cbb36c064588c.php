<?php $__env->startSection('title'); ?>
    Project Detail
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> \
    <div id='centre'>
    <h1>Project Details</h1>
    <p>Project Title: <?php echo e($project->projectTitle); ?><p>
    <p>Project Field: <?php echo e($project->projectField); ?></p>
    <p>Project Description: <?php echo e($project->projectDetails); ?></p>
    <p>No of Students Required: <?php echo e($project->NoOfStudents); ?></p>
    <p>Industry Partner: <?php echo e($project->partnerName); ?></p>
    <p>Location: <?php echo e($project->partnerLocation); ?></p>

    <h3>Applicants</h3>
    <table class="bordered">
    
        <tr><th>Student Name</th><th>Preference</th></tr>
    <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form method='post'>
            <input type='hidden' name='projectId' value= '<?php echo e($applicant->projectId); ?>'>
            <tr><td><a href="<?php echo e(url("student_detail_project/$applicant->projectId/$applicant->studentId")); ?>"><?php echo e($applicant->fname); ?> <?php echo e($applicant->lname); ?></a></td><td><?php echo e($applicant->preference); ?></td></tr>
        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <h2><a href="<?php echo e(url("student_apply/$project->projectId")); ?>">Apply</a></h2>
    <h2><a href="<?php echo e(url("delete_project/$project->projectId")); ?>">Delete Project</a></h2>
    <h2><a href="<?php echo e(url("edit_project/$project->projectId")); ?>">Edit Project</a></h2>
    </div>
    
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment/resources/views/project_detail.blade.php ENDPATH**/ ?>