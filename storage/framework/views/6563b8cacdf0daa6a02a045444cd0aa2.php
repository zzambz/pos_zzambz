<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>


<div class="container mt-4">

    <h3 class="mb-3">Halaman Users</h3>

    
    <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary mb-3">
        Create
    </a>

    
    <form action="<?php echo e(route('admin.users.index')); ?>" method="GET" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
                class="form-control"
                placeholder="Search nama / email user"
            >
            <button class="btn btn-outline-secondary" type="submit">
                Search
            </button>
        </div>
    </form>

    
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th width="50">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php echo e($loop->iteration + ($users->firstItem() ?? 0) - 1); ?>

                    </td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <?php echo e(optional($user->role)->name ?? '-'); ?>

                    </td>
                    <td class="d-flex gap-1">
                        
                        <a href="<?php echo e(route('admin.users.edit', $user)); ?>"
                           class="btn btn-sm btn-warning">
                             Edit
                        </a>

                        
                        <form action="<?php echo e(route('admin.users.destroy', $user)); ?>"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus user ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">
                        Data user tidak ada
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    
    <div class="mt-3">
        <?php echo e($users->links()); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS1-main\resources\views/users/index.blade.php ENDPATH**/ ?>