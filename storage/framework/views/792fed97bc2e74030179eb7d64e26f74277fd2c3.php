<?php $__env->startSection('title'); ?>
    Produk Masuk
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Arsip
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-header-actions mb-4">
                        <div class="card-header">
                            List Arsip
                            <a class="btn btn-sm btn-primary" href="<?php echo e(route('print-surat-masuk')); ?>" target="_blank">
                                <i data-feather="printer"></i> &nbsp;
                                Cetak Laporan
                            </a>
                        </div>
                        <div class="card-body">
                            
                            <?php if(session()->has('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('success')); ?>

                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            
                            <table class="table table-striped table-hover table-sm" id="crudTable">
                                <thead>
                                    <tr>
                                        <th width="10">No.</th>
                                        <th>No. Bets</th>
                                        <th>Tanggal</th>
                                        <th>Produk</th>
                                        <th>Kode Dokumen</th>
                                        <th>Kode Bahan</th>
                                        <th>Kode Jadi</th>
                                        <th>Pengirim</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->bets_no); ?></td>
                                        <td><?php echo e($item->bets_date); ?></td>
                                        <td><?php echo e($item->department->name); ?></td>
                                        <td><?php echo e($item->department->kode_dokumen); ?></td>
                                        <td><?php echo e($item->department->kode_bahan); ?></td>
                                        <td><?php echo e($item->department->kode_jadi); ?></td>
                                        <td><?php echo e($item->sender->name); ?></td>
                                        <td>
                                            <a class="btn btn-success btn-xs"
                                                href="<?php echo e(route('detail-surat', $item->id)); ?>">
                                                <i class="fa fa-search-plus"></i> &nbsp; Detail
                                            </a>
                                            <a class="btn btn-primary btn-xs"
                                                href="<?php echo e(route('letter.edit', $item->id)); ?>">
                                                <i class="fas fa-edit"></i> &nbsp; Ubah
                                            </a>
                                            <a href="<?php echo e(route('letter.delete', $item->id)); ?>" id="delete"
                                                class="btn btn-danger btn-xs"> <i class="far fa-trash-alt"></i> &nbsp;
                                                Hapus</a>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#crudTable').DataTable({});

            $('#delete').click(function(e) {
                e.preventDefault();
                var urlToRedirect = e.currentTarget.getAttribute('href')
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = urlToRedirect;
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                    }
                })

            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\surat-app\resources\views/pages/admin/letter/incoming.blade.php ENDPATH**/ ?>