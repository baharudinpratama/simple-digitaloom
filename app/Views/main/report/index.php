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
            $title1 = $active_menu === 'reports' ? 'Laporan Daftar Perkara terdaftar' : 'Daftar Perkara';
            $subtitle1 = $active_menu === 'reports' ? 'Total Perkara : ' . sizeof($cases) . ' Perkara' : 'Daftar Perkara yang dikelola di sistem ini';
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
                    <th>Jenis Peradilan</th>
                    <th>Pokok Perkara</th>
                    <th>Pengadilan</th>
                    <th>Posisi Perkara</th>
                    <th>PIC</th>
                </tr>
            </thead>
            <tbody class="text-center fw-extra-bold">
                <?php foreach ($cases as $index => $case) : ?>
                    <tr>
                        <td style="height: 94px;"><?= $index + 1 ?></td>
                        <td class="fw-semibold"><?= $case['case_number'] ?></td>
                        <td class="fw-semibold"><?= date('d-m-Y', strtotime($case['case_date'])) ?></td>
                        <td><?= $case['case_type_name'] ?></td>
                        <td><?= $case['case_subject_name'] ?></td>
                        <td><?= $case['court_name'] ?></td>
                        <td></td>
                        <td><?= $case['pic_name'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
</script>
<?= $this->endSection() ?>