<?php $__env->startSection('title', 'Dashboard Analytics'); ?>

<?php $__env->startSection('content'); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* ==========================================
       THEME VARIABLES (LIGHT / DARK MODE)
    ========================================== */
    :root {
        --bg-body: #f1f5f9;
        --card-bg: #ffffff;
        --text-main: #0f172a;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --table-header-bg: #f8fafc;
        --hover-bg: #f8fafc;
        --hero-bg: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        --hero-text: #ffffff;
        --hero-date: #94a3b8;
        --shadow-sm: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
        --shadow-hover: 0 12px 30px -4px rgba(0, 0, 0, 0.08);
    }

    [data-theme="dark"] {
        --bg-body: #090d16;
        --card-bg: #111827;
        --text-main: #f8fafc;
        --text-muted: #94a3b8;
        --border-color: #1f2937;
        --table-header-bg: #1e293b;
        --hover-bg: #1e293b;
        --hero-bg: linear-gradient(135deg, #1e1b4b 0%, #0f172a 100%);
        --hero-text: #ffffff;
        --hero-date: #cbd5e1;
        --shadow-sm: 0 4px 25px -2px rgba(0, 0, 0, 0.3);
        --shadow-hover: 0 12px 35px -4px rgba(0, 0, 0, 0.5);
    }

    body {
        background-color: var(--bg-body) !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        color: var(--text-main);
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* ==========================================
       HERO BANNER & THEME TOGGLE
    ========================================== */
    .hero-banner {
        background: var(--hero-bg);
        border-radius: 24px;
        padding: 2.25rem 2.5rem;
        color: var(--hero-text);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease;
    }

    .hero-banner::after {
        content: "";
        position: absolute;
        top: -50%;
        right: -10%;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.25) 0%, rgba(0, 0, 0, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .hero-title {
        font-size: 2.2rem;
        font-weight: 800;
        letter-spacing: -0.025em;
    }

    .hero-date {
        color: var(--hero-date);
        font-size: 0.95rem;
        font-weight: 500;
    }

    .theme-toggle-btn {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff;
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .theme-toggle-btn:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: scale(1.05);
    }

    /* ==========================================
       SECTION HEADERS
    ========================================== */
    .section-header-custom {
        display: flex;
        align-items: center;
        margin: 2.25rem 0 1.25rem 0;
    }

    .section-title-custom {
        font-size: 0.8rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: var(--text-muted);
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        padding: 6px 18px;
        border-radius: 30px;
        box-shadow: var(--shadow-sm);
    }

    /* ==========================================
       STAT CARDS (GLOW & GRADIENT)
    ========================================== */
    .stat-card {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        gap: 1.25rem;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-hover);
        border-color: #6366f1;
    }

    .icon-wrapper {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        color: #ffffff;
        flex-shrink: 0;
    }

    .bg-blue-grad   { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); box-shadow: 0 8px 16px -4px rgba(59, 130, 246, 0.4); }
    .bg-green-grad  { background: linear-gradient(135deg, #10b981 0%, #047857 100%); box-shadow: 0 8px 16px -4px rgba(16, 185, 129, 0.4); }
    .bg-orange-grad { background: linear-gradient(135deg, #f59e0b 0%, #b45309 100%); box-shadow: 0 8px 16px -4px rgba(245, 158, 11, 0.4); }
    .bg-purple-grad { background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%); box-shadow: 0 8px 16px -4px rgba(139, 92, 246, 0.4); }

    .stat-title {
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--text-muted);
        letter-spacing: 0.05em;
        margin-bottom: 0.2rem;
    }

    .stat-number {
        font-size: 1.55rem;
        font-weight: 800;
        color: var(--text-main);
        margin: 0;
    }

    /* ==========================================
       TABLE CONTAINERS
    ========================================== */
    .table-container {
        background: var(--card-bg);
        border-radius: 20px;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .table-header-custom {
        padding: 1.1rem 1.5rem;
        font-size: 0.95rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-warning {
        background: rgba(245, 158, 11, 0.1);
        color: #d97706;
        border-bottom: 1px solid rgba(245, 158, 11, 0.15);
    }

    .header-danger {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border-bottom: 1px solid rgba(239, 68, 68, 0.15);
    }

    .header-dark {
        background: var(--table-header-bg);
        color: var(--text-main);
        border-bottom: 1px solid var(--border-color);
    }

    .custom-table {
        margin-bottom: 0 !important;
    }

    .custom-table thead th {
        background-color: var(--table-header-bg) !important;
        color: var(--text-muted) !important;
        font-size: 0.75rem !important;
        font-weight: 700 !important;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 0.9rem 1.5rem !important;
        border: none !important;
    }

    .custom-table tbody td {
        padding: 1.05rem 1.5rem !important;
        font-size: 0.9rem;
        color: var(--text-main);
        font-weight: 500;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .custom-table tbody tr:last-child td {
        border-bottom: none;
    }

    .custom-table tbody tr:hover {
        background-color: var(--hover-bg);
    }

    /* BADGES */
    .badge-soft-warning {
        background-color: rgba(245, 158, 11, 0.15);
        color: #d97706;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.8rem;
    }

    .badge-soft-danger {
        background-color: rgba(239, 68, 68, 0.15);
        color: #dc2626;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.8rem;
    }

    .badge-soft-primary {
        background-color: rgba(99, 102, 241, 0.15);
        color: #6366f1;
        font-weight: 700;
        padding: 6px 16px;
        border-radius: 30px;
        font-size: 0.85rem;
    }
</style>

<div class="container py-4">

    
    <div class="hero-banner">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="hero-title mb-1">Ringkasan Hari Ini</h1>
                <div class="hero-date">
                    <i class="far fa-calendar-alt me-2"></i><?php echo e($tanggalHariIni->translatedFormat('l, d F Y')); ?>

                </div>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <button id="themeToggleBtn" class="theme-toggle-btn">
                    <i class="fas fa-moon" id="themeIcon"></i>
                    <span id="themeText">Dark Mode</span>
                </button>
            </div>
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\User::class)): ?>

        
        <div class="section-header-custom">
            <span class="section-title-custom"><i class="fas fa-chart-pie me-2 text-primary"></i>Today's Sales</span>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper bg-blue-grad">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div>
                        <div class="stat-title">Total Penjualan</div>
                        <h3 class="stat-number">
                            Rp <?php echo e(number_format($ringkasan['total_penjualan'] ?? 0, 0, ',', '.')); ?>

                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper bg-green-grad">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div>
                        <div class="stat-title">Jumlah Transaksi</div>
                        <h3 class="stat-number">
                            <?php echo e(number_format($ringkasan['jumlah_transaksi'] ?? 0, 0, ',', '.')); ?>

                        </h3>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="section-header-custom">
            <span class="section-title-custom"><i class="fas fa-credit-card me-2 text-warning"></i>Cash & Payment Status</span>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper bg-orange-grad">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div>
                        <div class="stat-title">Pembayaran Tunai</div>
                        <h3 class="stat-number">
                            Rp <?php echo e(number_format($ringkasan['total_cash'] ?? 0, 0, ',', '.')); ?>

                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper bg-purple-grad">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <div>
                        <div class="stat-title">Pembayaran Non Tunai</div>
                        <h3 class="stat-number">
                            Rp <?php echo e(number_format($ringkasan['total_non_tunai'] ?? 0, 0, ',', '.')); ?>

                        </h3>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

    
    <div class="section-header-custom">
        <span class="section-title-custom"><i class="fas fa-boxes-stacked me-2 text-danger"></i>Critical Inventory Status</span>
    </div>

    <div class="row g-4 mb-4">
        
        <div class="col-md-6">
            <div class="table-container">
                <div class="table-header-custom header-warning">
                    <span><i class="fas fa-exclamation-triangle me-2"></i>Stok Rendah</span>
                    <span class="badge bg-warning text-dark rounded-pill"><?php echo e($produkStokRendah->count()); ?> Item</span>
                </div>
                <div class="table-responsive">
                    <table class="table custom-table align-middle">
                        <thead>
                            <tr>
                                <th style="width: 10%;">#</th>
                                <th>Nama Produk</th>
                                <th style="width: 30%;" class="text-end">Sisa Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-muted fw-bold"><?php echo e($produkStokRendah->firstItem() + $index); ?></td>
                                    <td class="fw-bold"><?php echo e($produk->nama); ?></td>
                                    <td class="text-end">
                                        <span class="badge-soft-warning">
                                            <?php echo e($produk->stok); ?> Unit
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        <i class="fas fa-check-circle text-success me-1"></i> Semua stok aman
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                <?php echo e($produkStokRendah->links()); ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="table-container">
                <div class="table-header-custom header-danger">
                    <span><i class="fas fa-circle-xmark me-2"></i>Stok Habis</span>
                    <span class="badge bg-danger text-white rounded-pill"><?php echo e($produkStokHabis->count()); ?> Item</span>
                </div>
                <div class="table-responsive">
                    <table class="table custom-table align-middle">
                        <thead>
                            <tr>
                                <th style="width: 10%;">#</th>
                                <th>Nama Produk</th>
                                <th style="width: 30%;" class="text-end">Sisa Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-muted fw-bold"><?php echo e($produkStokHabis->firstItem() + $index); ?></td>
                                    <td class="fw-bold"><?php echo e($produk->nama); ?></td>
                                    <td class="text-end">
                                        <span class="badge-soft-danger">
                                            Habis
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        <i class="fas fa-info-circle me-1"></i> Tidak ada stok habis
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                <?php echo e($produkStokHabis->links()); ?>

            </div>
        </div>

    </div>

    
    <div class="section-header-custom">
        <span class="section-title-custom"><i class="fas fa-fire me-2 text-danger"></i>Best Seller Products</span>
    </div>

    <div class="table-container mb-5">
        <div class="table-header-custom header-dark">
            <span>Produk Paling Laris</span>
            <i class="fas fa-trophy text-warning"></i>
        </div>
        <div class="table-responsive">
            <table class="table custom-table align-middle">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th style="width: 25%;" class="text-center">Sisa Stok Saat Ini</th>
                        <th style="width: 25%;" class="text-end">Total Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="fw-bold fs-6">
                                <?php echo e($produk->nama); ?>

                            </td>
                            <td class="text-center">
                                <span class="fw-bold text-muted"><?php echo e($produk->stok); ?> Unit</span>
                            </td>
                            <td class="text-end">
                                <span class="badge-soft-primary">
                                    <i class="fas fa-bolt me-1"></i><?php echo e($produk->total_terjual); ?> Terjual
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada data penjualan
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("themeToggleBtn");
        const themeIcon = document.getElementById("themeIcon");
        const themeText = document.getElementById("themeText");
        
        // Cek mode yang disimpan sebelumnya
        const currentTheme = localStorage.getItem("theme") || "light";
        
        if (currentTheme === "dark") {
            document.documentElement.setAttribute("data-theme", "dark");
            themeIcon.className = "fas fa-sun";
            themeText.textContent = "Light Mode";
        } else {
            document.documentElement.setAttribute("data-theme", "light");
            themeIcon.className = "fas fa-moon";
            themeText.textContent = "Dark Mode";
        }

        // Toggle Event
        toggleBtn.addEventListener("click", function () {
            let theme = document.documentElement.getAttribute("data-theme");
            
            if (theme === "dark") {
                document.documentElement.setAttribute("data-theme", "light");
                localStorage.setItem("theme", "light");
                themeIcon.className = "fas fa-moon";
                themeText.textContent = "Dark Mode";
            } else {
                document.documentElement.setAttribute("data-theme", "dark");
                localStorage.setItem("theme", "dark");
                themeIcon.className = "fas fa-sun";
                themeText.textContent = "Light Mode";
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS1-main\resources\views/dashboard.blade.php ENDPATH**/ ?>