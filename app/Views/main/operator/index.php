<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<!--  -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 68px 32px; gap: 67px;">
    <?php if ($active_menu === 'operators') : ?>
        <div class="row row-cols-3" style="--bs-gutters-x: 40px;">
            <div class="col">
                <div class="d-flex flex-column justify-content-between fw-bold" style="min-height: 200px; padding: 25px; border-radius: 10px; border: 2px solid #c3c3c3;">
                    <div class="d-flex align-items-center" style="gap: 24px;">
                        <div class="d-flex align-items-center justify-content-center position-relative rounded-circle bg-blue-stone-200" style="width: 65px; height: 65px;">
                            <img src="<?= base_url('/img/user-active.png') ?>" alt="" width="35">
                        </div>
                        <h3 class="bold-3">Total Akun Operator</h3>
                    </div>
                    <p style="margin-left: 10px; font-weight: 600; font-size: 18px;"><span style="margin-right: 16px; font-size: 36px;"><?= sizeof($operators) ?></span> Akun</p>
                </div>
            </div>

            <div class="col">
                <div class="d-flex flex-column justify-content-between fw-bold" style="min-height: 200px; padding: 25px; border-radius: 10px; border: 2px solid #c3c3c3;">
                    <div class="d-flex align-items-center" style="gap: 24px;">
                        <div class="d-flex align-items-center justify-content-center position-relative rounded-circle bg-blue-stone-200" style="width: 65px; height: 65px;">
                            <img src="<?= base_url('/img/online-active.png') ?>" alt="" width="35">
                        </div>
                        <h3 class="bold-3">Total Operator Aktif</h3>
                    </div>
                    <p style="margin-left: 10px; font-weight: 600; font-size: 18px;"><span id="operator-active-count" style="margin-right: 16px; font-size: 36px;"><?= $operator_active_count ?></span> Akun</p>
                </div>
            </div>

            <div class="col">
                <div class="d-flex flex-column justify-content-between fw-bold" style="min-height: 200px; padding: 25px; border-radius: 10px; border: 2px solid #c3c3c3;">
                    <div class="d-flex align-items-center" style="gap: 24px;">
                        <div class="d-flex align-items-center justify-content-center position-relative rounded-circle bg-blue-stone-200" style="width: 65px; height: 65px;">
                            <img src="<?= base_url('/img/offline-active.png') ?>" alt="" width="35">
                        </div>
                        <h3 class="bold-3">Total Operator Nonaktif</h3>
                    </div>
                    <p style="margin-left: 10px; font-weight: 600; font-size: 18px;"><span id="operator-inactive-count" style="margin-right: 16px; font-size: 36px;"><?= $operator_inactive_count ?></span> Akun</p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="d-flex flex-column" style="border-radius: 10px; border: 2px solid #c3c3c3;">
        <div class="d-flex justify-content-between align-items-center" style="padding: 49px 36px;">
            <?php
            $title1 = $active_menu === 'operators' ? 'Daftar Akun Operator' : 'Daftar Perkara';
            $subtitle1 = $active_menu === 'operators' ? 'Akun operator yang terdaftar di sistem saat ini' : 'Daftar Perkara yang dikelola di sistem ini';
            ?>
            <div class="d-flex flex-column" style="gap: 14px;">
                <h2 class="extra-bold-5 text-blue-stone-600"><?= $title1 ?></h2>
                <p class="semi-bold-1 color-1"><?= $subtitle1 ?></p>
            </div>

            <?php if ($active_menu === 'operators') : ?>
                <a href="<?= base_url('/operators/create') ?>" class="d-inline-flex justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none;">
                    <div class="d-flex align-items-center" style="gap: 10px;">
                        <img src="<?= base_url('/img/plus.png') ?>" alt="add" width="20">
                        <p style="font-weight: 700; font-size: 13px; line-height: normal;">Tambah Akun</p>
                    </div>
                </a>
            <?php endif; ?>
        </div>

        <table>
            <thead class="text-center bg-blue-stone-200" style="height: 78px;">
                <tr>
                    <th width="5%">No</th>
                    <th>Username</th>
                    <th>Tanggal Dibuat</th>
                    <th>Status Akun</th>
                    <th class="action">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center fw-extra-bold">
                <?php foreach ($operators as $index => $operator) : ?>
                    <tr>
                        <td style="height: 94px;"><?= $index + 1 ?></td>
                        <td><?= $operator['username'] ?></td>
                        <td><?= date('d-m-Y', strtotime($operator['created_at'])) ?></td>
                        <td>
                            <?php if ($active_menu === 'operators') : ?>
                                <div class="form-check form-switch d-flex justify-content-center align-items-center gap-3">
                                    <input class="form-check-input switch-status" type="checkbox" role="switch" data-id="<?= $operator['id'] ?>" id="switch-status-<?= $operator['id'] ?>" <?= $operator['deleted_at'] === null ? 'checked' : '' ?>>
                                    <label class="form-check-label switch-status" for="switch-status-<?= $operator['id'] ?>"><?= $operator['deleted_at'] === null ? 'Aktif' : 'Nonaktif' ?></label>
                                </div>
                            <?php endif; ?>
                            <?php if ($active_menu === 'manage_operators') : ?>
                                <?= $operator['deleted_at'] === null ? 'Aktif' : 'Nonaktif' ?>
                            <?php endif; ?>
                        </td>
                        <td class="action fw-bold" style="padding: 22px 0px; font-size: 13px;">
                            <?php if ($active_menu === 'operators') : ?>
                                <div class="d-flex flex-column align-items-center" style="gap: 10px;">
                                    <a href="<?= base_url('/operators/' .  $operator['id']) ?>" class="d-inline-flex w-75 justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none; line-height: normal;">
                                        Reset Password
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($active_menu === 'manage_operators') : ?>
                                <div class="d-flex flex-column align-items-center" style="gap: 10px;">
                                    <a href="<?= base_url('/manage-operators/' .  $operator['id']) ?>" class="d-inline-flex w-75 justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none; line-height: normal;">
                                        Reset Password
                                    </a>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="modal-loading" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 300px; height: 270px;">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="<?= base_url('/img/loading.gif') ?>" alt="loading" width="150">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="toast-container w-50 position-fixed top-50 start-50 translate-middle">
    <div id="toast" class="toast position-relative w-100 bg-blue-stone-800" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body" style="padding: 40px;">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center h-100 text-white" style="gap: 10px;">
                    <img src="<?= base_url('/img/check-rounded.svg') ?>" alt="check-rounded" width="25">
                    <p id="toast-message"></p>
                </div>
            </div>

            <div role="button" class="position-absolute" style="top: 15px; right: 15px;" data-bs-dismiss="toast" aria-label="Close">
                <img src="<?= base_url('/img/close.svg') ?>" alt="close" width="17">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        if ("<?= $session->flash_message ?>") {
            $("#toast-message").text("<?= $session->flash_message ?>");
            let toast = new bootstrap.Toast('#toast');
            toast.show();
            <?php session()->remove('flash_message'); ?>
        }

        if ("<?= $active_menu ?>" === "operators") {
            $("th.action").prop("hidden", true);
            $("td.action").prop("hidden", true);
        }
    });

    const modalLoading = new bootstrap.Modal("#modal-loading");

    const handleOperatorCount = () => {
        let active = 0;
        let inactive = 0;
        $("table input.switch-status").each((index, item) => {
            item.checked ? active++ : inactive++;
        });
        $("#operator-active-count").text(active);
        $("#operator-inactive-count").text(inactive);
    }

    handleOperatorCount();

    $(".switch-status").on("change", function() {
        const id = $(this).data("id");
        const checked = this.checked;

        $.ajax({
            method: "POST",
            url: "<?= base_url('/operators/update-status') ?>",
            data: {
                id: id,
                status: checked
            },
            dataType: "json",
            beforeSend: function() {
                modalLoading.show();
            },
            complete: function() {
                modalLoading.hide();
            },
            success: function(response) {
                if (response.success) {
                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();

                    $(`label[for="switch-status-${id}"]`).text(checked === true ? 'Aktif' : 'Nonaktif');
                    handleOperatorCount();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX error:", error);
                alert("Something went wrong.");
            }
        });
    });
</script>
<?= $this->endSection() ?>