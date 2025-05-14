<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 68px 32px; gap: 47px;">
    <div class="d-flex flex-column" style="gap: 14px;">
        <h2 class="extra-bold-5 text-blue-stone-600">Informasi Terkini Penanganan Perkara</h2>

        <div class="d-flex align-items-center semi-bold-1 color-1" style="gap: 25px;">
            <p>Info Penanganan Perkara Terbaru</p>
            <div style="width: 6px; height: 6px; border-radius: 100%; background-color: #d9d9d9;"></div>
            <p><?= sizeof($cases) ?> Info</p>
        </div>
    </div>

    <div class="d-flex flex-column" style="gap: 18px;">
        <?php foreach ($cases as $case) :  ?>
            <div class="d-flex flex-column color-1" style="padding: 34px 37px; border-radius: 10px; border: 2px solid #c3c3c3;">
                <div class="row justify-content-between">
                    <div class="col-9">
                        <div class="d-flex flex-column" style="gap: 34px;">
                            <div class="d-flex align-items-center" style="gap: 38px;">
                                <div style="padding: 20px 24px; border-radius: 10px; background-color: var(--blue-stone-200);">
                                    <img src="<?= base_url('/img/user-gavel.png') ?>" alt="user-gavel" width="43">
                                </div>

                                <div class="d-flex flex-column" style="gap: 14px;">
                                    <h3 class="extra-bold-5 color-text">Update Perkara : Perkara Memasuki Memori Banding</h3>

                                    <div class="d-flex align-items-center regular-2" style="gap: 16px;">
                                        <p>No. Perkara : <span class="bold-2"><?= $case['case_number'] ?></span></p>
                                        <p>Jenis Peradilan : <span class="bold-2"><?= $case['case_type_name'] ?></span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center regular-1 color-text" style="gap: 83px;">
                                <p>Tanggal Perkara : <span class="bold-3"><?= date('d-m-Y', strtotime($case['case_date'])) ?></span></p>
                                <p>Lokasi Peradilan : <span class="bold-3"><?= $case['court_name'] ?></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 text-end">
                        19 Jan 2025
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>