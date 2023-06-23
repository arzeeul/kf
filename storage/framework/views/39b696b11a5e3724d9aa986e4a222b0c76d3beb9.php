<?php $__env->startSection('title'); ?>
    Detail Batch
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
                                Detail Batch
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali Ke Semua Batch
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
                        <div class="card-header">Detail Batch</div>
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
                                            <th>Pengirim Arsip</th>
                                            <td><?php echo e($item->sender->name); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Produk</th>
                                            <td><?php echo e($item->department->name); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bolder">Perbarui status tracking</h5>
                            <form action="<?php echo e(route('tracking.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">

                                    <label for="">Pilih status</label>
                                    <input type="hidden" name="batch_id" value="<?php echo e($item->id); ?>">
                                    <select name="status" id="" class="form-control">
                                        <option value="">Perbarui status</option>


                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Penimbangan')): ?>
                                            <option value="penimbangan">Penimbangan</option>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Pengolahan')): ?>
                                            <option value="pengolahan">Pengolahan</option>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Rekonsiliasi')): ?>
                                            <option value="rekonsiliasi">penerimaan dan
                                                rekonsiliasi bahan pengemas</option>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Container')): ?>
                                            <option value="container">Pembukaan container</option>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Pengisian')): ?>
                                            <option value="pengisian    ">Pengisian</option>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Pengemasan')): ?>
                                            <option value="pengemasan">Pengemasan</option>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin')): ?>
                                            <option value="selesai">Selesai</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Keterangan</label>
                                    <input type="text" name="keterangan" id="" class="form-control">
                                </div>
                                <button class="btn btn-success btn-md pb-2 mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="fw-bolder">Status </h3>
                            <hr>

                            <div class="row">
                                <?php $__currentLoopData = $item->tracking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $array => $tracking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 col-lg-3">
                                        <h4 class="fw-bold"> <span
                                                class="badge bg-<?php echo e($array == 0 ? 'success' : 'white text-dark'); ?> "><?php echo e($tracking->status); ?></span>
                                            </h3>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <p><?php echo e($tracking->keterangan); ?></h3>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <span class="btn btn-blue-soft btn-sm"><?php echo e($tracking->user->name); ?></h3>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <p><?php echo e(Carbon\Carbon::parse($tracking->created_at)->isoFormat('LLLL')); ?></h3>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\surat-app\resources\views/pages/admin/batch/show.blade.php ENDPATH**/ ?>