<?php $__env->startSection('title'); ?>
    Student's Applications
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id='centre'> 
    <h1><?php echo e($student1->fname); ?> <?php echo e($student1->lname); ?>'s Applications</h1>
    <table class="bordered">
    
      <tr><th>Project</th><th>Partner</th></tr>
    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr><td> <?php echo e($student->projectTitle); ?></td><td> <?php echo e($student->partnerName); ?></td></tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment/resources/views/student_detail.blade.php ENDPATH**/ ?>