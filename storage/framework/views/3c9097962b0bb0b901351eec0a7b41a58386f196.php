<?php $__env->startSection('title'); ?>
    Batch
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
                                Batch Record

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
                            List Batch Record
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
                            
                            <table class="table table-striped table-hover table-sm" id="dataTable">
                                <thead>
                                    <tr>
                                        <th width="10">No.</th>
                                        <th>No. Batch</th>
                                        <th>Tanggal</th>
                                        <th>Produk</th>
                                        <th>Pengirim</th>
                                        <th>Pengedit terakhir</th>
                                        <th>Status terakhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $batch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($item->bets_no); ?></td>
                                            <td><?php echo e($item->bets_date); ?></td>
                                            <td><?php echo e($item->department->name); ?></td>
                                            <td><?php echo e($item->sender->name); ?></td>
                                            <td><?php echo e($item->tracking->first()->user->name); ?></td>
                                            <td><?php echo e($item->tracking->first()->status); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('batch.show', $item->id)); ?>"
                                                    class="btn btn-success btn-xs">
                                                    <i class="fas fa-edit"></i> &nbsp; Detail
                                                </a>
                                                <a href="<?php echo e(route('batch.edit', $item->id)); ?>"
                                                    class="btn btn-primary btn-xs">
                                                    <i class="fas fa-edit"></i> &nbsp; Ubah
                                                </a>
                                                <a href="<?php echo e(route('batch.destroy', $item->id)); ?>"
                                                    class="btn btn-danger btn-xs" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="updateModal" role="dialog" aria-labelledby="createModal" aria-hidden="true"
            style="overflow:hidden;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModal">Tambah Data Departemen</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" id="updateForm" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="idEdit">
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="department_id" class="col-sm-3 col-form-label">Produk</label>
                                <div class="col-sm-9">
                                    <select name="department_id" class="form-control selectx" id="department_id" required>
                                        <option value="">Pilih..</option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->id); ?>"
                                                <?php echo e(old('department_id') == $department->id ? 'selected' : ''); ?>>
                                                <?php echo e($department->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['department_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 row">
                                <label for="letter_no" class="col-sm-3 col-form-label">Kode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php $__errorArgs = ['kode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('kode')); ?>" id="editKode" name="kode"
                                        placeholder="Nomor Surat.." required>
                                </div>
                                <?php $__errorArgs = ['kode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_no" class="col-sm-3 col-form-label">No. Bets</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php $__errorArgs = ['bets_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('bets_no')); ?>" id="editBetsNo" name="bets_no"
                                        placeholder="Nomor Surat.." required>
                                </div>
                                <?php $__errorArgs = ['bets_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_date" class="col-sm-3 col-form-label">Tanggal PO</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control <?php $__errorArgs = ['bets_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('bets_date')); ?>" id="editBatesDate" name="bets_date" required>
                                </div>
                                <?php $__errorArgs = ['bets_Date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3 row">
                                <label for="bets_received" class="col-sm-3 col-form-label">Tanggal Upload</label>
                                <div class="col-sm-9">
                                    <input type="date"
                                        class="form-control <?php $__errorArgs = ['bets_received'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('bets_received')); ?>" id="editBetsR" name="bets_received" required>
                                </div>
                                <?php $__errorArgs = ['bets_received'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 row">
                                <label for="letter_file" class="col-sm-3 col-form-label">File</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control <?php $__errorArgs = ['bets_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('bets_file')); ?>" name="bets_file"
                                        accept="application/pdf,application/vnd.ms-excel" required>
                                    <div id="letter_file" class="form-text">Ekstensi .pdf</div>
                                </div>
                                <?php $__errorArgs = ['bets_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="submit" id="updateBtn">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var datatable = $('#dataTable').DataTable({});


        $(document).ready(function() {


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


            $('#edit-batch').click(function(e) {
                var id = $(this).attr("data-id");

                console.log(id);
                $.ajax({
                    url: "batch-record/edit/" + id,
                    data: {
                        id: id,
                        _token: "<?php echo e(csrf_token()); ?>"
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $('#idEdit').val(data.item.id);
                        $('#editBetsNo').val(data.item.bets_no);
                        $('#editBatesDate').val(data.item.bets_date);
                        $('#editBetsR').val(data.item.bets_received);
                        $('#department_id').on('change', function() {
                            var department_id = this.value;
                            $.ajax({
                                url: "<?php echo e(url('admin/get-produk-kode')); ?>/" +
                                    department_id,
                                type: "post",
                                data: {
                                    id: department_id,
                                    _token: '<?php echo e(csrf_token()); ?>'
                                },
                                dataType: 'json',
                                success: function(result) {
                                    $('#editKode').val(result.departmen[0]
                                        .kode)
                                }
                            });
                        });

                    }
                });
            });

            $('#updateForm').submit(function(e) {
                e.preventDefault();

                // Mengambil data dari form
                var formData = new FormData(this);

                var id = $('#idEdit').val()

                // Mengirim data melalui AJAX request
                $.ajax({
                    url: "<?php echo e(url('admin/batch-record/update/')); ?>/" + id,
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Meng-handle respons sukses
                        console.log(response);
                        // Menutup modal
                        $('#updateModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        // Meng-handle respons error
                        console.log(xhr.responseText);
                    }
                });
            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\surat-app\resources\views/pages/admin/batch/index.blade.php ENDPATH**/ ?>