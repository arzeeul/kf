<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <div class="d-flex justify-content-center">
                <img src="<?php echo e(asset('admin/image/kimia-farma.jpeg')); ?>" style="height: 20vh; object-fit:contain;"
                    alt="">
            </div>
            


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
                <a class="nav-link <?php echo e(request()->is('admin/letter/arsip') ? 'active' : ''); ?>" href="<?php echo e(route('arsip')); ?>">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Arsip
                </a>
            <?php endif; ?>
            

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
<?php /**PATH C:\Users\ASUS\OneDrive\Documents\surat-app\resources\views/includes/sidebar-admin.blade.php ENDPATH**/ ?>