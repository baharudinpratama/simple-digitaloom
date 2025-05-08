<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    .case-card {
        height: 332px;
        padding: 56px 45px;
        border-radius: 10px;
        background-image: url("<?= base_url('/img/bg-legal-cases.png') ?>");
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 68px 32px; gap: 67px;">
    <div class="w-100 case-card">
        <div class="h-100 d-flex flex-column justify-content-between text-white fw-bold">
            <h2 style="font-size: 35px;">Total Perkara</h2>
            <p style="font-size: 25px;"><span style="font-size: 70px;">190</span> Perkara</p>
        </div>
    </div>

    <?php if (session()->has('flash_message')) : ?>
        <div class="alert alert-dismissible bg-blue-stone-800 " data-bs-theme="dark" style="min-height: 98px; margin: 0px; padding: 40px; border-radius: 10px;" role="alert">
            <div class="d-flex align-items-center h-100 text-white" style="gap: 10px;">
                <img src="<?= base_url('/img/check-rounded.svg') ?>" alt="check-rounded" width="25">
                <?= session()->get('flash_message') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php session()->remove('flash_message'); ?>
    <?php endif; ?>

    <div class="d-flex flex-column" style="border-radius: 10px; border: 2px solid #c3c3c3;">
        <div class="d-flex justify-content-between align-items-center" style="padding: 49px 36px;">
            <div class="d-flex flex-column" style="gap: 14px;">
                <h2>Daftar Perkara yang terdaftar</h2>
                <p>3 Perkara baru saja telah diinput (?)</p>
            </div>

            <a href="<?= base_url('/legal-cases/create') ?>" class="d-inline-flex justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none;">
                <div class="d-flex align-items-center" style="gap: 10px;">
                    <img src="<?= base_url('/img/plus.png') ?>" alt="add" width="20">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Tambah Data Perkara</p>
                </div>
            </a>
        </div>

        <table>
            <thead class="text-center bg-blue-stone-200" style="height: 78px;">
                <tr>
                    <th>No</th>
                    <th>Nomor Perkara</th>
                    <th>Tanggal Perkara</th>
                    <th>Pokok Perkara</th>
                    <th>Pengadilan</th>
                    <th>PIC</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td style="height: 94px;">1</td>
                    <td>78/Pdt.G/2025/PN.Sby</td>
                    <td>24-01-2025</td>
                    <td>Eks.BPPN</td>
                    <td>PN.Surabaya</td>
                    <td>Ahmad Fauzi</td>
                    <td>
                        <a href="<? base_url('/legal-case/1') ?>" class="d-inline-flex w-75 justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none; line-height: normal;">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>