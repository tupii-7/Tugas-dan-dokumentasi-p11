

<?php $__env->startSection('title', $buku->judul); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/buku">Buku</a></li>
            <li class="breadcrumb-item active"><?php echo e($buku->judul); ?></li>
        </ol>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <!-- Book Cover -->
                        <div class="col-md-4 mb-3">
                            <div class="book-image" style="height: 300px;">
                                <i class="bi bi-book" style="font-size: 100px;"></i>
                            </div>
                        </div>

                        <!-- Book Details -->
                        <div class="col-md-8">
                            <h1 class="h3 fw-bold mb-2"><?php echo e($buku->judul); ?></h1>
                            
                            <p class="text-muted mb-3">
                                <strong>Pengarang:</strong> <?php echo e($buku->pengarang); ?><br>
                                <strong>Penerbit:</strong> <?php echo e($buku->penerbit); ?><br>
                                <strong>Tahun Terbit:</strong> <?php echo e($buku->tahun_terbit); ?>

                            </p>

                            <div class="mb-3">
                                <span class="badge bg-info me-2"><?php echo e($buku->kategori); ?></span>
                                <?php if($buku->stok > 0): ?>
                                    <span class="badge bg-success">Tersedia</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Habis</span>
                                <?php endif; ?>
                            </div>

                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Harga</h6>
                                            <h4 class="text-primary"><?php echo e($buku->harga_format); ?></h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>Stok Tersedia</h6>
                                            <h4 class="text-success"><?php echo e($buku->stok); ?> Buku</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2">
                                <a href="/buku/<?php echo e($buku->id); ?>/edit" class="btn btn-custom btn-custom-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <button class="btn btn-outline-danger" disabled>
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                                <a href="/buku" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Book Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-info-circle"></i> Informasi Lengkap
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Kode Buku</h6>
                            <p><?php echo e($buku->kode_buku); ?></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">ISBN</h6>
                            <p><?php echo e($buku->isbn); ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Bahasa</h6>
                            <p><?php echo e($buku->bahasa); ?></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Kategori</h6>
                            <p><?php echo e($buku->kategori); ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-muted">Deskripsi</h6>
                            <p><?php echo e($buku->deskripsi ?? 'Tidak ada deskripsi'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Similar Books -->
            <?php if($bukuSerupa->count() > 0): ?>
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-book-half"></i> Buku Serupa (Kategori: <?php echo e($buku->kategori); ?>)
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <?php $__currentLoopData = $bukuSerupa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card book-card h-100">
                                        <div class="book-image" style="height: 150px;">
                                            <i class="bi bi-book"></i>
                                        </div>
                                        <div class="card-body book-body">
                                            <h6 class="book-title"><?php echo e($similar->judul); ?></h6>
                                            <div class="book-info">
                                                <strong><?php echo e($similar->pengarang); ?></strong><br>
                                                <?php echo e($similar->tahun_terbit); ?>

                                            </div>
                                            <div class="book-info">
                                                <?php echo e($similar->harga_format); ?>

                                            </div>
                                            <div class="book-footer">
                                                <div>
                                                    <?php if($similar->stok > 0): ?>
                                                        <span class="badge bg-success"><?php echo e($similar->stok); ?> Ada</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger">Habis</span>
                                                    <?php endif; ?>
                                                </div>
                                                <a href="/buku/<?php echo e($similar->id); ?>" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-lightning"></i> Status & Aksi
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p class="text-muted mb-1">Status Stok</p>
                        <?php if($buku->stok == 0): ?>
                            <h6><span class="badge bg-danger">Habis</span></h6>
                        <?php elseif($buku->stok >= 1 && $buku->stok <= 5): ?>
                            <h6><span class="badge bg-warning">Menipis (<?php echo e($buku->stok); ?>)</span></h6>
                        <?php elseif($buku->stok >= 6 && $buku->stok <= 15): ?>
                            <h6><span class="badge bg-info">Sedang (<?php echo e($buku->stok); ?>)</span></h6>
                        <?php else: ?>
                            <h6><span class="badge bg-success">Aman (<?php echo e($buku->stok); ?>)</span></h6>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <p class="text-muted mb-1">Jenis Buku</p>
                        <?php if($buku->tahun_terbit >= 2024): ?>
                            <h6><span class="badge bg-primary">Buku Baru</span></h6>
                        <?php else: ?>
                            <h6><span class="badge bg-secondary">Buku Lama</span></h6>
                        <?php endif; ?>
                    </div>

                    <hr>

                    <div class="d-grid gap-2">
                        <a href="/buku/<?php echo e($buku->id); ?>/pinjam" class="btn btn-primary">
                            <i class="bi bi-book"></i> Pinjam Buku
                        </a>
                        <button class="btn btn-outline-primary" disabled>
                            <i class="bi bi-bookmark"></i> Bookmark
                        </button>
                    </div>
                </div>
            </div>

            <!-- Additional Info Card -->
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-file-text"></i> Detail Publikasi
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tbody>
                            <tr>
                                <td class="text-muted">Penerbit</td>
                                <td><strong><?php echo e($buku->penerbit); ?></strong></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Tahun</td>
                                <td><strong><?php echo e($buku->tahun_terbit); ?></strong></td>
                            </tr>
                            <tr>
                                <td class="text-muted">ISBN</td>
                                <td><strong><?php echo e($buku->isbn); ?></strong></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Bahasa</td>
                                <td><strong><?php echo e($buku->bahasa); ?></strong></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Harga</td>
                                <td><strong><?php echo e($buku->harga_format); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Perpustakaan laravel\resources\views/perpustakaan/buku/show.blade.php ENDPATH**/ ?>