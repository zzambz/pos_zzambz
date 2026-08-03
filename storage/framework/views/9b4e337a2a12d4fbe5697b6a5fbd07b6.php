<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">

    
    <?php if(session('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('errors')); ?>


            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    <?php endif; ?>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>


            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    <?php endif; ?>

<h1 class="fw-bold mb-3">
    Halaman Penjualan
</h1>

<a href="<?php echo e(route('admin.penjualan.create')); ?>"
   class="btn btn-primary mb-3">
    Create
</a>

    </div>

    
    <form action="<?php echo e(route('admin.penjualan.index')); ?>"
          method="GET"
          class="mb-4">

        <div class="input-group">

            <input
                type="text"
                name="search"
                value="<?php echo e(request()->search); ?>"
                class="form-control"
                placeholder="Search penjualan"
            >

            <button class="btn btn-outline-secondary"
                    type="submit">
                Search
            </button>

        </div>

    </form>

    
    <div class="table-responsive">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal Transaksi</th>
                    <th>Kasir</th>
                    <th>Total Pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th width="170">Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        
                        <td>
                            <?php echo e($sales->firstItem() + $loop->index); ?>

                        </td>

                        
                        <td>
                            <?php echo e($sale->created_at->translatedFormat('d-m-Y H:i:s')); ?>

                        </td>

                        
                        <td>
                            <?php echo e($sale->user->name); ?>

                        </td>

                        
                        <td>
                            Rp.<?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>

                        </td>

                        
                        <td>
                            <?php echo e($sale->metode_pembayaran); ?>

                        </td>

                        
                        <td>
                            <?php echo e(strtoupper($sale->status)); ?>

                        </td>

                        
<td>
    <div class="d-flex gap-1">

        
        <a href="<?php echo e(route('admin.penjualan.show', $sale->id)); ?>"
           class="btn btn-primary btn-sm">
            Detail
        </a>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $sale)): ?>

        
        <a href="<?php echo e(route('admin.penjualan.edit', $sale)); ?>"
           class="btn btn-warning btn-sm">
            Edit
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>

        
        <form action="<?php echo e(route('admin.penjualan.destroy', $sale->id)); ?>"
              method="POST"
              onsubmit="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">

            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>

            <button type="submit"
                    class="btn btn-danger btn-sm">
               hapus
            </button>

        </form>
<?php endif; ?>
    </div>
</td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="7" class="text-center">
                            Data Tidak Ditemukan
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

    
    <div class="mt-3">
        <?php echo e($sales->links()); ?>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS1-main\resources\views/penjualan/index.blade.php ENDPATH**/ ?>