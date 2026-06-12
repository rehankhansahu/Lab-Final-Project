

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<h5 class="mb-4">Dashboard Overview</h5>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="text-primary fs-2 fw-bold"><?php echo e($totalVolunteers); ?></div>
            <div class="text-muted small mt-1">Total Volunteers</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="text-success fs-2 fw-bold"><?php echo e($totalEvents); ?></div>
            <div class="text-muted small mt-1">Total Events</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="text-warning fs-2 fw-bold"><?php echo e($pendingApplications); ?></div>
            <div class="text-muted small mt-1">Pending Applications</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="text-info fs-2 fw-bold"><?php echo e($totalCertificates); ?></div>
            <div class="text-muted small mt-1">Certificates Issued</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Quick Actions</h6>
                <div class="d-grid gap-2 mt-3">
                    <a href="<?php echo e(route('admin.events.create')); ?>" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>Create New Event
                    </a>
                    <a href="<?php echo e(route('admin.applications.index')); ?>" class="btn btn-outline-warning btn-sm">
                        <i class="bi bi-clipboard-check me-1"></i>Review Applications
                    </a>
                    <a href="<?php echo e(route('admin.certificates.index')); ?>" class="btn btn-outline-info btn-sm">
                        <i class="bi bi-award me-1"></i>Generate Certificates
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\event-volunteer-manager\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>