<?php $__env->startSection('title'); ?>
    Advertise 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div  id='centre'>
    <h1>Advertise a Project</h1>
    <form method="post" action="<?php echo e(url("advertise_project_action")); ?>">
        <?php echo e(csrf_field()); ?>

        <p>
        <label>Industry Partner *</label>
        <input type="text" name="partnerName" value='<?php echo e(Session::get('partnerName')); ?>'>
        </p>
        <p>
        <label>Project Location *</label>
        <input type="text" name="partnerLocation" value='<?php echo e(Session::get('partnerLocation')); ?>'>
        </p>
        <p>
        <label>Project Title *</label>
        <input type="text" name="projectTitle">
        </p>
        <p>
        <label>Project Field *</label>
        <select name="projectField">
            <option value="">Choose one</option>
            <option value="Software Development">Software Development</option>
            <option value="Data Analytics">Data Analytics</option>
            <option value="Network and Security">Network and Security</option>
            <option value="Information Systems and Enterprise Architecture">Information Systems and Enterprise Architecture</option>
        </select>
        </p>
        <p>
        <label>Project Details *</label>
        <textarea type="text" name="projectDetails"></textarea>
        </p>
        <p>
        <label>Number Of Students *</label>
        <select name="NoOfStudents">
            <option value="">Choose one</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        </p>
        <input type="submit" name="Advertise">

        <p>* means required field</p>
        <?php if($errors->any()): ?>
            <?php echo e($errors->first()); ?>

        <?php endif; ?>
    </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment1/resources/views/advertise_project.blade.php ENDPATH**/ ?>