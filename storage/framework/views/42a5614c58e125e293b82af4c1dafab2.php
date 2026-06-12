

<?php $__env->startSection('title', 'Manage Events'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0" style="color:var(--text-primary)">All Events</h5>
    <a href="<?php echo e(route('admin.events.create')); ?>" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle me-1"></i>Create Event
    </a>
</div>

<?php if($events->isEmpty()): ?>
    <div style="background:var(--accent-light);border:1px solid var(--accent-border);border-radius:8px;padding:14px 18px;font-size:14px;color:var(--accent);">
        No events found. <a href="<?php echo e(route('admin.events.create')); ?>" style="color:var(--accent);font-weight:600;">Create one now.</a>
    </div>
<?php else: ?>
    <div class="card border-0" style="background:var(--bg-card);border:1px solid var(--table-border) !important;">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr style="background:var(--table-head)">
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">#</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Event Name</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Date</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Venue</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Required</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="background:var(--bg-card);border-color:var(--table-border)">
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;"><?php echo e($loop->iteration); ?></td>
                        <td style="color:var(--text-primary);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;font-weight:500;"><?php echo e($event->event_name); ?></td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;"><?php echo e($event->event_date->format('d M Y')); ?></td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;"><?php echo e($event->venue); ?></td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;"><?php echo e($event->required_volunteers); ?></td>
                        <td style="border-color:var(--table-border);background:var(--bg-card);">
                            <a href="<?php echo e(route('admin.events.volunteers', $event)); ?>" class="btn btn-info btn-sm" title="Volunteers"><i class="bi bi-people"></i></a>
                            <a href="<?php echo e(route('admin.events.edit', $event)); ?>" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form action="<?php echo e(route('admin.events.destroy', $event)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this event?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\event-volunteer-manager\resources\views/admin/events/index.blade.php ENDPATH**/ ?>