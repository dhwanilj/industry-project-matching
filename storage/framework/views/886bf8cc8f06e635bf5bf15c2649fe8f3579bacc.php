<?php $__env->startSection('title'); ?>
    Student Justification
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <h1>Student Details</h1>
    
    <p> Student name: <?php echo e($student->fname); ?> <?php echo e($student->lname); ?>

    <p> Project: <?php echo e($student->projectTitle); ?>

    <p> Justification: <?php echo e($student->justification); ?></p><hr>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment/resources/views/student_detail_project.blade.php ENDPATH**/ ?>