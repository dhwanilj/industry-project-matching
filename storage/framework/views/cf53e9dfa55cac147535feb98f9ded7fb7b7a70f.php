<?php $__env->startSection('title'); ?>
    Students List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div id='centre'>
    <h1>List of Students</h1>
    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(url("student_detail/$student->studentId")); ?>" ><?php echo e($student->fname); ?> <?php echo e($student->lname); ?></a><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment1/resources/views/list_students.blade.php ENDPATH**/ ?>