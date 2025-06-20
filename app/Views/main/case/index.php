<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    .case-card {
        height: 332px;
        padding: 56px 45px;
        border-radius: 10px;
        background-image: url("<?= base_url('/img/bg-cases.png') ?>");
        background-size: cover;
        background-repeat: no-repeat;
    }

    table tbody tr:not(:last-child) {
        border-bottom: 2px solid #c3c3c3;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 68px 32px; gap: 67px;">
    <?php if ($active_menu === 'cases') : ?>
        <div class="w-100 case-card">
            <div class="h-100 d-flex flex-column justify-content-between text-white fw-bold">
                <h2 class="extra-bold-3">Total Perkara</h2>
                <p style="font-weight:800px; font-size: 25px;"><span style="font-size: 70px;"><?= sizeof($cases) ?></span> Perkara</p>
            </div>
        </div>
    <?php endif; ?>

    <div class="d-flex flex-column" style="border-radius: 10px; border: 2px solid #c3c3c3;">
        <div class="d-flex justify-content-between align-items-center" style="padding: 49px 36px;">
            <?php
            $title1 = $active_menu === 'cases' ? 'Daftar Perkara yang terdaftar' : 'Daftar Perkara';
            $subtitle1 = $active_menu === 'cases' ? '' : 'Daftar Perkara yang dikelola di sistem ini';
            ?>
            <div class="d-flex flex-column" style="gap: 14px;">
                <h2 class="extra-bold-5 text-blue-stone-600"><?= $title1 ?></h2>
                <p class="semi-bold-1 color-1"><?= $subtitle1 ?></p>
            </div>

            <?php if (session()->role === 'operator' && $active_menu === 'cases') : ?>
                <a href="<?= base_url('/cases/create') ?>" class="d-inline-flex justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none;">
                    <div class="d-flex align-items-center" style="gap: 10px;">
                        <img src="<?= base_url('/img/plus.png') ?>" alt="add" width="20">
                        <p style="font-weight: 700; font-size: 13px; line-height: normal;">Tambah Data Perkara</p>
                    </div>
                </a>
            <?php endif; ?>
        </div>

        <table>
            <thead class="text-center bg-blue-stone-200" style="height: 78px;">
                <tr>
                    <th width="5%">No</th>
                    <th>Nomor Perkara</th>
                    <th>Tanggal Perkara</th>
                    <th>Pokok Perkara</th>
                    <th>Pengadilan</th>
                    <th>PIC</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center fw-extra-bold">
                <?php foreach ($cases as $index => $case) : ?>
                    <tr>
                        <td style="height: 94px;"><?= $index + 1 ?></td>
                        <td class="fw-semibold"><?= $case['case_number'] ?></td>
                        <td class="fw-semibold"><?= date('d-m-Y', strtotime($case['case_date'])) ?></td>
                        <td><?= $case['case_subject_name'] ?></td>
                        <td><?= $case['court_name'] ?></td>
                        <td><?= $case['pic_name'] ?></td>
                        <td class="fw-bold" style="padding: 22px 0px; font-size: 13px;">
                            <?php if ($active_menu === 'cases') : ?>
                                <div class="d-flex flex-column align-items-center" style="gap: 10px;">
                                    <a href="<?= base_url('/cases/' .  $case['id']) ?>" class="d-inline-flex w-75 justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none; line-height: normal;">
                                        Lihat Detail
                                    </a>
                                    <?php if (session()->get('role') === 'operator') : ?>
                                        <form action="<?= base_url('/reports/agenda') ?>" method="post" target="_blank">
                                            <div class="d-flex w-100">
                                                <input type="hidden" name="caseId" value="<?= $case['id'] ?>">
                                                <button type="submit" class="d-inline-flex justify-content-center align-items-center border-0 bg-blue-stone-800" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none; line-height: normal;">
                                                    <img src="<?= base_url('/img/file-download.png') ?>" alt="file-download" style="margin-right: 5px;" width="15">
                                                    Download Resume
                                                </button>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($active_menu === 'manage_cases') : ?>
                                <div class="d-flex flex-column align-items-center" style="gap: 10px;">
                                    <a href="<?= base_url('/manage-cases/' .  $case['id']) ?>" class="d-inline-flex w-75 justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none; line-height: normal;">
                                        Ubah Data Perkara
                                    </a>
                                    <div role=button onclick="handleDelete('<?= $case['id'] ?>')" class="d-inline-flex w-75 justify-content-center align-items-center bg-blue-stone-800" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none; line-height: normal;">
                                        Hapus Data
                                    </div>
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

<div class="modal" id="modal-confirm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered w-50">
        <div class="modal-content">
            <div class="modal-header fw-bold" style="padding: 35px;">
                Hapus Data
            </div>
            <div class="modal-body" style="padding: 35px;">
                <div class="d-flex align-items-center fw-semibold">
                    Apakah anda yakin menghapus data ini?
                </div>
            </div>
            <div class="modal-footer" style="padding: 35px;">
                <div class="d-flex align-items-center" style="gap: 10px;">
                    <div role="button" id="confirm-cancel" class="text-center" data-bs-dismiss="modal" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                        <p class="text-blue-stone-600" style="font-weight: 700; font-size: 13px; line-height: normal;">Batal</p>
                    </div>
                    <div role="button" id="confirm-ok" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                        <p style="font-weight: 700; font-size: 13px; line-height: normal;">Ya, Hapus</p>
                    </div>
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
    });

    const modalLoading = new bootstrap.Modal("#modal-loading");
    const modalConfirm = new bootstrap.Modal("#modal-confirm");

    function showModalConfirm() {
        return new Promise((resolve) => {
            const modal = new bootstrap.Modal(("#modal-confirm"));

            $("#confirm-ok").off("click").on("click", function() {
                modal.hide();
                resolve(true);
            });

            $("#confirm-cancel").off("click").on("click", function() {
                modal.hide();
                resolve(false);
            });

            modal.show();
        });
    }

    const handleDelete = async (id) => {
        const confirmed = await showModalConfirm();

        if (confirmed) {
            deleteData(id);
        } else {
            modalConfirm.hide();
        }
    }

    const deleteData = (id) => {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/manage-cases/delete') ?>",
            data: {
                id,
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
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX error:", error);
                alert("Something went wrong.");
            }
        });
    }
</script>
<?= $this->endSection() ?>