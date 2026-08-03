<div class="mb-3">
    <label>Nama</label>
    <input type="text"
           name="name"
           class="form-control"
           value="<?php echo e(old('name', $user->name ?? '')); ?>">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email"
           name="email"
           class="form-control"
           value="<?php echo e(old('email', $user->email ?? '')); ?>">
</div>

<div class="mb-3">
    <label>Password</label>
    <input type="password"
           name="password"
           class="form-control"
           placeholder="Kosongkan jika tidak ingin mengubah password">
</div>

<div class="mb-3">
    <label>Role</label>

    <select name="role_id" class="form-control">

        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role->id); ?>"
                <?php if(old('role_id', $user->role_id ?? '') == $role->id): echo 'selected'; endif; ?>>
                <?php echo e($role->name); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
</div>

<button type="submit" class="btn btn-success">Simpan</button>
<a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary">Kembali</a><?php /**PATH C:\laragon\www\APK_POS1-main\resources\views/users/_form.blade.php ENDPATH**/ ?>