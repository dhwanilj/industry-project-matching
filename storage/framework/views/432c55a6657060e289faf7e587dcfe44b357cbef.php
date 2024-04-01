<!DOCTYPE html>
<html>
<head>
  <title> <?php echo $__env->yieldContent('title'); ?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
  
</head>

<body>
  <nav>
    <ul>
      <li><img src="<?php echo e(url('images/griffithuni.jpg')); ?>" height='40' width='150'></li>
      <li><a href="<?php echo e(url('advertise_project')); ?>" >Advertise Project</a></li>
      <li><a href="<?php echo e(url('project_assignment_page')); ?>" >Project Assignment</a></li>
      <li><a href="<?php echo e(url('list_students')); ?>">List of Students</a></li>
      <li><a href="<?php echo e(url('top_partners')); ?>">Top 3 Industry Partners</a></li>
      <li><a href="<?php echo e(url('documentation')); ?>">Documentation</a></li>
      <li><a href="<?php echo e(url("/")); ?>" id='link'>Home</a></li>
    </ul>
  </nav>
    <?php echo $__env->yieldContent('content'); ?>
    <div class=footer>© 2022 Work Integrated Learning</div>

</body>
</html><?php /**PATH /var/www/html/webAppDev/assignment1/resources/views/layouts/master.blade.php ENDPATH**/ ?>