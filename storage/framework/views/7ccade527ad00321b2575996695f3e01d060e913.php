<?php $__env->startSection('main'); ?>
    <main>
        <div class="container-xl px-4">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <!-- Basic login form-->
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <?php if(session()->has('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('success')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <?php if(session()->has('loginError')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo e(session('loginError')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <!-- Login form-->
                            <div class="d-flex justify-content-center">
                                <img src="<?php echo e(asset('admin/image/kimia-farma.jpeg')); ?>"
                                    style="height: 20vh; object-fit:contain;" alt="">
                            </div>

                            <form action="/login" method="post">
                                <?php echo csrf_field(); ?>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
                                        name="email" type="email" value="<?php echo e(old('email')); ?>"
                                        placeholder="Enter email address" autofocus required />
                                    <?php $__errorArgs = ['email'];
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
                                <!-- Form Group (password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="password">Password</label>
                                    <input class="form-control" id="password" name="password" type="password"
                                        placeholder="Enter password" required />
                                </div>
                                <!-- Form Group (remember password checkbox)-->
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" id="rememberPasswordCheck" type="checkbox"
                                            value="" />
                                        <label class="form-check-label" for="rememberPasswordCheck">Remember
                                            password</label>
                                    </div>
                                </div>
                                <!-- Form Group (login box)-->
                                <div class="d-grid gap-2">
                                    <a class="small" href="#">

                                    </a>
                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\surat-app\resources\views/auth/login.blade.php ENDPATH**/ ?>