

<?php $__env->startSection('title', 'Daftar Buku'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active"><i class="bi bi-book"></i> Buku</li>
        </ol>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 fw-bold text-dark">
                <i class="bi bi-book"></i> Daftar Buku
            </h1>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon text-primary">
                    <i class="bi bi-book"></i>
                </div>
                <div class="stat-number"><?php echo e($totalBuku); ?></div>
                <div class="stat-label">Total Buku</div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--success-color);">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-number"><?php echo e($bukuTersedia); ?></div>
                <div class="stat-label">Buku Tersedia</div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--danger-color);">
                    <i class="bi bi-x-circle"></i>
                </div>
                <div class="stat-number"><?php echo e($bukuHabis); ?></div>
                <div class="stat-label">Buku Habis</div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="color: var(--info-color);">
                    <i class="bi bi-percent"></i>
                </div>
                <div class="stat-number"><?php echo e($totalBuku > 0 ? round(($bukuTersedia / $totalBuku) * 100, 0) : 0); ?>%</div>
                <div class="stat-label">Ketersediaan</div>
            </div>
        </div>
    </div>

    <!-- Search & Filter Section -->
    <div class="filter-section">
        <form method="GET" action="/buku" class="row g-3">
            <div class="col-md-6">
                <label for="search" class="filter-label">Cari Buku</label>
                <input type="text" class="form-control search-input" id="search" name="search" 
                       placeholder="Cari judul, pengarang, atau ISBN..." value="<?php echo e(request('search')); ?>">
            </div>

            <div class="col-md-4">
                <label for="kategori" class="filter-label">Filter Kategori</label>
                <select class="form-select" id="kategori" name="kategori">
                    <option value="">Semua Kategori</option>
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($kat->nama_kategori); ?>" <?php echo e(request('kategori') == $kat->nama_kategori ? 'selected' : ''); ?>>
                            <?php echo e($kat->nama_kategori); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-2 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-custom btn-custom-primary w-100">
                    <i class="bi bi-search"></i> Cari
                </button>
                <a href="/buku" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </form>
    </div>

    <!-- Books Grid -->
    <?php if($buku->count() > 0): ?>
        <div class="row g-4 mb-4">
            <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card book-card">
                        <div class="book-image">
                            <i class="bi bi-book"></i>
                        </div>
                        <div class="card-body book-body">
                            <h6 class="book-title"><?php echo e($item->judul); ?></h6>
                            <div class="book-info">
                                <strong><?php echo e($item->pengarang); ?></strong><br>
                                <?php echo e($item->tahun_terbit); ?>

                            </div>
                            <div class="book-info">
                                Kategori: <strong><?php echo e($item->kategori); ?></strong>
                            </div>
                            <div class="book-info">
                                Harga: <strong><?php echo e($item->harga_format); ?></strong>
                            </div>
                            <div class="book-footer">
                                <div>
                                    <?php if($item->stok > 0): ?>
                                        <span class="badge bg-success"><?php echo e($item->stok); ?> Tersedia</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Habis</span>
                                    <?php endif; ?>
                                </div>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="/buku/<?php echo e($item->id); ?>" class="btn btn-outline-primary" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/buku/<?php echo e($item->id); ?>/edit" class="btn btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <!-- Previous Link -->
                <?php if($buku->onFirstPage()): ?>
                    <li class="page-item disabled">
                        <span class="page-link">← Sebelumnya</span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($buku->previousPageUrl()); ?>">← Sebelumnya</a>
                    </li>
                <?php endif; ?>

                <!-- Page Numbers -->
                <?php $__currentLoopData = $buku->getUrlRange(1, $buku->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $buku->currentPage()): ?>
                        <li class="page-item active">
                            <span class="page-link"><?php echo e($page); ?></span>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Next Link -->
                <?php if($buku->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($buku->nextPageUrl()); ?>">Selanjutnya →</a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <span class="page-link">Selanjutnya →</span>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php else: ?>
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="bi bi-inbox"></i>
            </div>
            <h5 class="empty-state-title">Buku Tidak Ditemukan</h5>
            <p class="empty-state-text">Tidak ada buku yang sesuai dengan kriteria pencarian Anda.</p>
            <a href="/buku" class="btn btn-custom btn-custom-primary">
                <i class="bi bi-arrow-clockwise"></i> Reset Filter
            </a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Perpustakaan laravel\resources\views/perpustakaan/buku/index.blade.php ENDPATH**/ ?>