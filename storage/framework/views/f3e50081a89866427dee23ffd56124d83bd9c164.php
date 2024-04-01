<?php $__env->startSection('title'); ?>
    Application Form
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div id='centre'>
    <h1> Student Application Form</h1>
    <form method="post" class='input' action="<?php echo e(url("student_apply_action/$project->projectId")); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="projectId" value="<?php echo e($project->projectId); ?>">
        <input type="hidden" name="NoOfApplication" value="<?php echo e($project->NoOfApplication); ?>">
        <h1>Project: <?php echo e($project->projectTitle); ?></h1>
        <h4>Partner: <?php echo e($project->partnerName); ?></h4>
        <p>
        <label>First name* </label><br>
        <input type="text" name="fname" value='<?php echo e(Session::get('fname')); ?>' required pattern="[A-Za-z]{3,}" minlength='3' title='minimum 3 characters'>
        </p>
        <p>
        <label>Last name* </label><br>
        <input type="text" name="lname" value='<?php echo e(Session::get('lname')); ?>' required pattern="[A-Za-z]{3,}" minlength='3' title='minimum 3 characters'>
        </p>
        <p>
        <label>Justification* </label><br>
        <textarea type="text" name="justification" rows='5' columns='100' required></textarea>
        </p>
        <p>
        <label>Preference* </label><br>
        <select name="preference" required>
            <option value=''>Choose one</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        </p>
        <input type="submit" value="Apply" ><br>
        <?php if($errors->any()): ?>
            <?php echo e($errors->first()); ?>

        <?php endif; ?>
    </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment/resources/views/student_apply_form.blade.php ENDPATH**/ ?>