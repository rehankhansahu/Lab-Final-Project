

<?php $__env->startSection('title', 'All Certificates'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Issued Certificates</h5>
    <a href="<?php echo e(route('admin.certificates.index')); ?>" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<?php if($certificates->isEmpty()): ?>
    <div class="alert alert-info">No certificates have been issued yet.</div>
<?php else: ?>
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Volunteer</th>
                        <th>Event</th>
                        <th>Issue Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($cert->volunteer->name); ?></td>
                        <td><?php echo e($cert->event->event_name); ?></td>
                        <td><?php echo e($cert->issue_date->format('d M Y')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\event-volunteer-manager\resources\views/admin/certificates/all.blade.php ENDPATH**/ ?>