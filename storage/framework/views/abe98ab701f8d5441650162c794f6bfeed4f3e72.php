<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <div class="d-flex justify-content-center">
                <img src="<?php echo e(asset('admin/image/kimia-farma.jpeg')); ?>" style="height: 20vh; object-fit:contain;"
                    alt="">
            </div>
            <!-- Sidenav Menu Heading (Account)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <div class="sidenav-menu-heading d-sm-none">Account</div>
            <!-- Sidenav Link (Alerts)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                Alerts
                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
            </a>
            <!-- Sidenav Link (Messages)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                Messages
                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
            </a>


            <!-- Sidenav Menu Heading (Core)-->
            <div class="sidenav-menu-heading mt-0">Menu</div>
            <!-- Sidenav Link (Dashboard)-->
            <a class="nav-link <?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>"
                href="<?php echo e(route('admin-dashboard')); ?>">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Dashboard
            </a>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin')): ?>
                <a class="nav-link <?php echo e(request()->is('admin/department*') ? 'active' : ''); ?>"
                    href="<?php echo e(route('department.index')); ?>">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Data Produk
                </a>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin')): ?>
                <a class="nav-link <?php echo e(request()->is('admin/letter/create') ? 'active' : ''); ?>"
                    href="<?php echo e(route('letter.create')); ?>">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Tambah Arsip
                </a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin')): ?>
                <a class="nav-link <?php echo e(request()->is('admin/letter/arsip') ? 'active' : ''); ?>" href="<?php echo e(route('arsip')); ?>">
                    <div class="nav-link-icon"><i data-feather="arrow-right"></i></div>
                    Arsip
                </a>
            <?php endif; ?>
            <a class="nav-link <?php echo e(request()->is('admin/batch-record/create') ? 'active' : ''); ?>"
                href="<?php echo e(route('batch.create')); ?>">
                <div class="nav-link-icon"><i data-feather="book-open"></i></div>
                Tambah Batch Record
            </a>

            <a class="nav-link <?php echo e(request()->is('admin/letter/batch-record') ? 'active' : ''); ?>"
                href="<?php echo e(route('batch')); ?>">
                <div class="nav-link-icon"><i data-feather="box"></i></div>
                Batch Record
            </a>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin')): ?>
                <a class="nav-link <?php echo e(request()->is('admin/user*') ? 'active' : ''); ?>" href="<?php echo e(route('user.index')); ?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Data User
                </a>
            <?php endif; ?>


            <a class="nav-link <?php echo e(request()->is('admin/setting*') ? 'active' : ''); ?>"
                href="<?php echo e(route('setting.index')); ?>">
                <div class="nav-link-icon"><i data-feather="settings"></i></div>
                Profile
            </a>
        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title"><?php echo e(Auth::user()->name); ?></div>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\Project\surat-app\resources\views/includes/sidebar-admin.blade.php ENDPATH**/ ?>