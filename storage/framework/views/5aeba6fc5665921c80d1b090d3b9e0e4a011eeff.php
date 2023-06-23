<?php $__env->startSection('title'); ?>
   Detail Surat
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                                Detail Surat
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali Ke Semua Surat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4">
            <div class="row gx-4">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header">Detail Surat</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Nomor Bets</th>
                                            <td><?php echo e($item->bets_no); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Arsip</th>
                                            <td><?php echo e($item->bets_date); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Diterima</th>
                                            <td><?php echo e($item->bets_received); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Pengirim Surat</th>
                                            <td><?php echo e($item->sender->name); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Departemen</th>
                                            <td><?php echo e($item->department->name); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header">
                            File Surat -
                            <a href="<?php echo e(route('download-surat', $item->id)); ?>" class="btn btn-sm btn-primary">
                                <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Download Surat
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <embed src="<?php echo e(asset('Bets-File/'.$item->bets_file)); ?>" width="500" height="375" type="application/pdf">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\surat-app\resources\views/pages/admin/letter/show.blade.php ENDPATH**/ ?>