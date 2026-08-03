<?php $__env->startSection('title', 'Halaman Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 bg-white p-4 rounded shadow-sm">
        
        <h2 class="mb-3">Halaman Produk</h2>

        <div class="mb-3">
            <a href="<?php echo e(route('admin.produk.create')); ?>" class="btn btn-primary">create</a>
        </div>

        <form action="<?php echo e(route('admin.produk.index')); ?>" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search nama produk" value="<?php echo e(request('search')); ?>">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jval</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration + ($produk->firstItem() - 1)); ?></td>
                            
                            <td><?php echo e($item->user->name ?? 'N/A'); ?></td>
                            
                            <td>
                                <?php if($item->foto): ?>
                                    <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" width="100" class="img-thumbnail">
                                <?php else: ?>
                                    <span class="text-muted">Tidak Ada Foto</span>
                                <?php endif; ?>
                            </td>
                            
                            <td><?php echo e($item->nama); ?></td>
                            
                            <td>Rp. <?php echo e(number_format($item->harga_beli, 0, ',', '.')); ?></td>
                            
                            <td>Rp. <?php echo e(number_format($item->harga_jual, 0, ',', '.')); ?></td>
                            
                            <td><?php echo e($item->stok); ?></td>
                            
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?php echo e(route('admin.produk.edit', $item->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="<?php echo e(route('admin.produk.destroy', $item->id)); ?>" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">Data produk belum ada.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <?php echo e($produk->links()); ?>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS1-main\resources\views/produk/index.blade.php ENDPATH**/ ?>