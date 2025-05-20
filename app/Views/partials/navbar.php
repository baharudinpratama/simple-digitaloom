<style>
    .navbar-wrapper {
        padding: 40px 50px;
        border-bottom: 3px solid #eeeeee;
    }

    .navbar-profile-hr {
        margin: 11px 0px 19px 0px;
        border-top: none;
        border-bottom: 2px solid #e6e6e6;
        opacity: 100;
    }
</style>

<div class="d-flex justify-content-between align-items-center w-100 navbar-wrapper">
    <div class="d-flex flex-column color-1">
        <h1 class="extra-bold-3 color-text" style="padding-bottom: 16px;"><?= esc($page_title) ?></h1>

        <div class="d-flex align-items-center" style="gap: 7px;">
            <?php foreach ($breadcrumb as $crumb) : ?>
                <span><?= esc($crumb['title']) ?></span>

                <?php if ($crumb['arrow']) : ?>
                    <img src="<?= base_url('/img/arrow-right.png') ?>" alt="arrow-right" width="30">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="dropdown">
        <div role="button" class="d-flex align-items-center" style="gap: 18px;" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= base_url('/img/user-default.png') ?>" alt="profile-picture" class="img-fluid rounded-full" width="51">

            <img src="<?= base_url('/img/arrow-down.png') ?>" alt="arrow-down" width="25">
        </div>

        <div class="dropdown-menu" style="min-width: 326px; padding: 26px 27px; border-radius: 5px; border: 2px solid #e6e6e6;">
            <div class="d-flex flex-column">
                <div class="d-flex align-items-center" style="gap: 18px;">
                    <img src="<?= base_url('/img/user-default.png') ?>" alt="profile-picture" class="img-fluid rounded-full" width="45">

                    <p><?= session()->username ?></p>
                </div>

                <hr class="navbar-profile-hr">

                <a href="<?= base_url('/logout') ?>" class="bg-white" style="padding: 8px 0px; border-radius: 5px; border: 2px solid #56ABA9; color: #56ABA9; text-decoration: none;">
                    <div class="d-flex align-items-center justify-content-center" style="gap: 25px;">
                        <img src="<?= base_url('/img/logout.png') ?>" alt="logout" width="29">

                        <p>Log Out</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>