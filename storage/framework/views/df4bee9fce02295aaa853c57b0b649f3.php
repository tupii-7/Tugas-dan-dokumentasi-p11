

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><i class="bi bi-graph-up"></i> Dashboard</li>
        </ol>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 fw-bold text-dark">
                <i class="bi bi-graph-up"></i> Dashboard Perpustakaan
            </h1>
            <p class="text-muted">Selamat datang di sistem manajemen perpustakaan. Berikut adalah ringkasan statistik perpustakaan Anda.</p>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="row mb-4">
        <!-- Total Books -->
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon text-primary">
                    <i class="bi bi-book"></i>
                </div>
                <div class="stat-number"><?php echo e($totalBuku); ?></div>
                <div class="stat-label">Total Buku</div>
            </div>
        </div>

        <!-- Available Books -->
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--success-color);">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-number"><?php echo e($bukuTersedia); ?></div>
                <div class="stat-label">Buku Tersedia</div>
            </div>
        </div>

        <!-- Out of Stock Books -->
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--danger-color);">
                    <i class="bi bi-x-circle"></i>
                </div>
                <div class="stat-number"><?php echo e($bukuHabis); ?></div>
                <div class="stat-label">Buku Habis</div>
            </div>
        </div>

        <!-- Stock Availability Rate -->
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--info-color);">
                    <i class="bi bi-percent"></i>
                </div>
                <div class="stat-number"><?php echo e($totalBuku > 0 ? round(($bukuTersedia / $totalBuku) * 100, 0) : 0); ?>%</div>
                <div class="stat-label">Tingkat Ketersediaan</div>
            </div>
        </div>
    </div>

    <!-- Members Statistics Section -->
    <div class="row mb-4">
        <!-- Total Members -->
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--primary-color);">
                    <i class="bi bi-people"></i>
                </div>
                <div class="stat-number"><?php echo e($totalAnggota); ?></div>
                <div class="stat-label">Total Anggota</div>
            </div>
        </div>

        <!-- Active Members -->
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--success-color);">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-number"><?php echo e($anggotaAktif); ?></div>
                <div class="stat-label">Anggota Aktif</div>
            </div>
        </div>

        <!-- Inactive Members -->
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--warning-color);">
                    <i class="bi bi-exclamation-circle"></i>
                </div>
                <div class="stat-number"><?php echo e($anggotaNonaktif); ?></div>
                <div class="stat-label">Anggota Nonaktif</div>
            </div>
        </div>

        <!-- Member Percentage -->
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--info-color);">
                    <i class="bi bi-percent"></i>
                </div>
                <div class="stat-number"><?php echo e($totalAnggota > 0 ? round(($anggotaAktif / $totalAnggota) * 100, 0) : 0); ?>%</div>
                <div class="stat-label">Anggota Aktif (%)</div>
            </div>
        </div>
    </div>

    <!-- Newest Books & Members Section -->
    <div class="row mb-4">
        <!-- Newest Books -->
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-clock-history"></i> 5 Buku Terbaru
                </div>
                <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $bukuTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="d-flex justify-content-between align-items-start mb-3 pb-3" style="border-bottom: 1px solid #e2e8f0;">
                            <div style="flex: 1;">
                                <h6 class="mb-1"><?php echo e($buku->judul); ?></h6>
                                <small class="text-muted d-block">Pengarang: <?php echo e($buku->pengarang); ?></small>
                                <small class="text-muted">Tahun: <?php echo e($buku->tahun_terbit); ?></small>
                            </div>
                            <div>
                                <?php if($buku->stok > 0): ?>
                                    <span class="badge bg-success"><?php echo e($buku->stok); ?> Tersedia</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Habis</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-4">
                            <i class="bi bi-inbox" style="font-size: 32px; color: #cbd5e1;"></i>
                            <p class="text-muted mt-2">Belum ada data buku</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Newest Members -->
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-clock-history"></i> 5 Anggota Terbaru
                </div>
                <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $anggotaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="d-flex justify-content-between align-items-start mb-3 pb-3" style="border-bottom: 1px solid #e2e8f0;">
                            <div style="flex: 1;">
                                <h6 class="mb-1"><?php echo e($anggota->nama); ?></h6>
                                <small class="text-muted d-block">Email: <?php echo e($anggota->email); ?></small>
                                <small class="text-muted">Daftar: <?php echo e($anggota->created_at->format('d M Y')); ?></small>
                            </div>
                            <div>
                                <?php if($anggota->status === 'Aktif'): ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Nonaktif</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-4">
                            <i class="bi bi-inbox" style="font-size: 32px; color: #cbd5e1;"></i>
                            <p class="text-muted mt-2">Belum ada data anggota</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-lightning"></i> Quick Actions - Menu Utama
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-4">
                            <a href="/buku" class="btn btn-custom btn-custom-primary w-100">
                                <i class="bi bi-book"></i> Kelola Buku
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="/anggota" class="btn btn-custom btn-custom-primary w-100">
                                <i class="bi bi-people"></i> Kelola Anggota
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="#" class="btn btn-custom btn-custom-primary w-100" disabled>
                                <i class="bi bi-arrow-left-right"></i> Transaksi Peminjaman
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Perpustakaan laravel\resources\views/perpustakaan/dashboard.blade.php ENDPATH**/ ?>