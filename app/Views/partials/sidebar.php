<style>
    .sidebar-header {
        display: flex;
        height: 162px;
        padding: 0px 20px;
        gap: 120px;
    }

    .menu {
        display: flex;
        height: 43px;
        padding: 10px 20px;
        gap: 10px;
        color: var(--blue-stone-400);
    }

    .submenu-wrapper {
        display: flex;
        flex-direction: column;
        padding-top: 13px;
        padding-bottom: 27px;
        gap: 16px;
    }

    .submenu {
        display: flex;
        align-items: center;
        padding-right: 20px;
        padding-left: 29px;
        gap: 25px;
    }

    .submenu-hr {
        margin: 0px 20px;
        border-top: none;
        border-bottom: 3px solid #eaeaea;
        opacity: 100;
    }

    #sidebar {
        border-right: 5px solid #eeeeee;
    }
</style>

<div id="sidebar" class="w-100 vh-100">
    <div class="sidebar-header d-flex align-items-center">
        <img src="<?= base_url('/img/logo.png') ?>" class="img-fluid" alt="logo" style="width: 10rem;">
    </div>

    <div class="menu extra-bold-2">
        Menu Utama
    </div>

    <div class="submenu-wrapper">
        <a href="<?= base_url('/dashboard') ?>" class="submenu bold-4" style="text-decoration: none;">
            <img src="<?= $active_menu === 'dashboard' ? base_url('/img/dashboard-active.png') : base_url('/img/dashboard.png') ?>" alt="dashboard" width="29">

            <span class="<?= $active_menu === 'dashboard' ? 'text-blue-stone-600' : 'color-1' ?>">Dashboard</span>
        </a>

        <hr class="submenu-hr">

        <a href="<?= base_url('/cases') ?>" class="submenu bold-4" style="text-decoration: none;">
            <img src="<?= $active_menu === 'cases' ? base_url('/img/gavel-active.png') : base_url('/img/gavel.png') ?>" alt="gavel" width="29">

            <span class="<?= $active_menu === 'cases' ? 'text-blue-stone-600' : 'color-1' ?>">Identitas Perkara</span>
        </a>

        <?php if (session()->get('role') === 'operator') : ?>
            <hr class="submenu-hr">

            <a href="<?= base_url('/manage-cases') ?>" class="submenu bold-4" style="text-decoration: none;">
                <img src="<?= $active_menu === 'manage_cases' ? base_url('/img/deadline-active.png') : base_url('/img/deadline.png') ?>" alt="deadline" width="29">

                <span class="<?= $active_menu === 'manage_cases' ? 'text-blue-stone-600' : 'color-1' ?>">Kelola Perkara</span>
            </a>
        <?php endif; ?>
    </div>

    <?php if (session()->get('role') === 'admin') : ?>
        <div class="menu extra-bold-2">
            Manajemen Operator
        </div>

        <div class="submenu-wrapper">
            <a href="<?= base_url('/operators') ?>" class="submenu bold-4" style="text-decoration: none;">
                <img src="<?= $active_menu === 'operators' ? base_url('/img/user-active.png') : base_url('/img/user.png') ?>" alt="user" width="29">

                <span class="<?= $active_menu === 'operators' ? 'text-blue-stone-600' : 'color-1' ?>">Daftar Akun Operator</span>
            </a>

            <hr class="submenu-hr">

            <a href="<?= base_url('/manage-operators') ?>" class="submenu bold-4" style="text-decoration: none;">
                <img src="<?= $active_menu === 'manage_operators' ? base_url('/img/user-pencil-active.png') : base_url('/img/user-pencil.png') ?>" alt="user-pencil" width="29">

                <span class="<?= $active_menu === 'manage_operators' ? 'text-blue-stone-600' : 'color-1' ?>">Kelola Akun Operator</span>
            </a>
        </div>
    <?php endif; ?>

    <?php if (session()->get('role') === 'operator') : ?>
        <div class="menu extra-bold-2">
            Laporan
        </div>

        <div class="submenu-wrapper">
            <a href="<?= base_url('/reports') ?>" class="submenu bold-4" style="text-decoration: none;">
                <img src="<?= $active_menu === 'reports' ? base_url('/img/file-gavel-active.png') : base_url('/img/file-gavel.png') ?>" alt="user" width="29">

                <span class="<?= $active_menu === 'reports' ? 'text-blue-stone-600' : 'color-1' ?>">Laporan Daftar Perkara</span>
            </a>
        </div>
    <?php endif; ?>
</div>