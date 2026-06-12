

<?php $__env->startSection('title', 'My Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<h5 class="mb-1">Welcome, <?php echo e($volunteer->name); ?>!</h5>
<p style="color:var(--text-muted)" class="mb-4">Here's your volunteer activity overview.</p>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3">
            <div style="font-size:28px;font-weight:800;color:var(--accent)"><?php echo e($totalApplications); ?></div>
            <div style="font-size:12px;color:var(--text-muted);margin-top:4px;">Total Applications</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3">
            <div style="font-size:28px;font-weight:800;color:#22c55e"><?php echo e($approvedApplications); ?></div>
            <div style="font-size:12px;color:var(--text-muted);margin-top:4px;">Approved</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3">
            <div style="font-size:28px;font-weight:800;color:#eab308"><?php echo e($pendingApplications); ?></div>
            <div style="font-size:12px;color:var(--text-muted);margin-top:4px;">Pending</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3">
            <div style="font-size:28px;font-weight:800;color:#0891b2"><?php echo e($totalCertificates); ?></div>
            <div style="font-size:12px;color:var(--text-muted);margin-top:4px;">Certificates</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card border-0">
            <div class="card-body">
                <h6 style="color:var(--text-primary);font-weight:600;margin-bottom:14px;">My Info</h6>
                <div style="border:1px solid var(--table-border);border-radius:8px;overflow:hidden;">
                    <div style="display:flex;padding:10px 14px;background-color:var(--bg-card);border-bottom:1px solid var(--table-border);">
                        <span style="width:38%;font-size:13px;color:var(--text-muted);">Name</span>
                        <span style="font-size:13px;color:var(--text-primary);"><?php echo e($volunteer->name); ?></span>
                    </div>
                    <div style="display:flex;padding:10px 14px;background-color:var(--bg-card);border-bottom:1px solid var(--table-border);">
                        <span style="width:38%;font-size:13px;color:var(--text-muted);">Email</span>
                        <span style="font-size:13px;color:var(--text-primary);"><?php echo e($volunteer->email); ?></span>
                    </div>
                    <div style="display:flex;padding:10px 14px;background-color:var(--bg-card);border-bottom:1px solid var(--table-border);">
                        <span style="width:38%;font-size:13px;color:var(--text-muted);">Phone</span>
                        <span style="font-size:13px;color:var(--text-primary);"><?php echo e($volunteer->phone); ?></span>
                    </div>
                    <div style="display:flex;padding:10px 14px;background-color:var(--bg-card);">
                        <span style="width:38%;font-size:13px;color:var(--text-muted);">Department</span>
                        <span style="font-size:13px;color:var(--text-primary);"><?php echo e($volunteer->department); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0">
            <div class="card-body">
                <h6 style="color:var(--text-primary);font-weight:600;margin-bottom:14px;">Quick Links</h6>
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('volunteer.events')); ?>" class="btn btn-outline-primary btn-sm text-start">
                        <i class="bi bi-calendar-event me-2"></i>Browse Available Events
                    </a>
                    <a href="<?php echo e(route('volunteer.applications')); ?>" class="btn btn-outline-secondary btn-sm text-start">
                        <i class="bi bi-clipboard me-2"></i>View My Applications
                    </a>
                    <a href="<?php echo e(route('volunteer.certificates')); ?>" class="btn btn-outline-success btn-sm text-start">
                        <i class="bi bi-award me-2"></i>My Certificates
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.volunteer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\event-volunteer-manager\resources\views/volunteer/dashboard.blade.php ENDPATH**/ ?>