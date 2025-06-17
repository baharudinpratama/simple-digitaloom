<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 68px 32px; gap: 47px;">
    <div class="d-flex flex-column" style="gap: 14px;">
        <h2 class="extra-bold-5 text-blue-stone-600">Informasi Terkini Penanganan Perkara</h2>

        <div class="d-flex align-items-center semi-bold-1 color-1" style="gap: 25px;">
            <p>Info Penanganan Perkara Terbaru</p>
            <div style="width: 6px; height: 6px; border-radius: 100%; background-color: #d9d9d9;"></div>
            <p>
                <?php if (session('role') === 'admin') {
                    echo sizeof($cases);
                } else {
                    echo (sizeof($cases_today) + sizeof($cases_this_week));
                } ?>
                Info
            </p>
        </div>
    </div>

    <div class="d-flex flex-column" style="gap: 18px;">
        <?php if (session('role') === 'admin') : ?>
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
                                        <h3 class="extra-bold-5 color-text">Agenda Perkara : <?= $case['last_agenda']['case_position_name'] ?? 'Input Baru' ?></h3>

                                        <div class="d-flex align-items-center regular-2" style="gap: 16px;">
                                            <p>No. Perkara : <span class="bold-2"><?= $case['case_number'] ?></span></p>
                                            <p>Jenis Peradilan : <span class="bold-2"><?= $case['case_type_name'] ?></span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center regular-1 color-text" style="gap: 83px;">
                                    <p>Tanggal Agenda : <span class="bold-3"><?= isset($case['last_agenda']['date']) ? date('d-m-Y', strtotime($case['last_agenda']['date'])) : date('d-m-Y', strtotime($case['case_date'])) ?></span></p>
                                    <p>Lokasi Peradilan : <span class="bold-3"><?= $case['court_name'] ?></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 text-end">

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="d-flex flex-column mb-5" style="gap: 18px;">
                <div class="d-flex flex-column color-1" style="padding: 34px 37px; border-radius: 10px; border: 2px solid #c3c3c3;">
                    <h3 class="extra-bold-5 color-text">Agenda Sidang Hari Ini</h3>
                </div>
                <?php if (sizeof($cases_today) === 0) : ?>
                    <p class="d-flex flex-shrink-1 ms-3 fw-bold text-blue-stone-600">Tidak ada agenda</p>
                <?php else: ?>
                    <?php foreach ($cases_today as $case_today) :  ?>
                        <div class="d-flex flex-column color-1" style="padding: 34px 37px; border-radius: 10px; border: 2px solid #c3c3c3;">
                            <div class="row justify-content-between">
                                <div class="col-9">
                                    <div class="d-flex flex-column" style="gap: 34px;">
                                        <div class="d-flex align-items-center" style="gap: 38px;">
                                            <div style="padding: 20px 24px; border-radius: 10px; background-color: var(--blue-stone-200);">
                                                <img src="<?= base_url('/img/user-gavel.png') ?>" alt="user-gavel" width="43">
                                            </div>

                                            <div class="d-flex flex-column" style="gap: 14px;">
                                                <h3 class="extra-bold-5 color-text">Agenda Perkara : <?= $case_today['last_agenda']['case_position_name'] ?? 'Input Baru' ?></h3>

                                                <div class="d-flex align-items-center regular-2" style="gap: 16px;">
                                                    <p>No. Perkara : <span class="bold-2"><?= $case_today['case_number'] ?></span></p>
                                                    <p>Jenis Peradilan : <span class="bold-2"><?= $case_today['case_type_name'] ?></span></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center regular-1 color-text" style="gap: 83px;">
                                            <p>Tanggal Agenda : <span class="bold-3"><?= date('d-m-Y', strtotime($case_today['date'])) ?></span></p>
                                            <p>Lokasi Peradilan : <span class="bold-3"><?= $case_today['court_name'] ?></span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 text-end">

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="d-flex flex-column mb-5" style="gap: 18px;">
                <div class="d-flex flex-column color-1" style="padding: 34px 37px; border-radius: 10px; border: 2px solid #c3c3c3;">
                    <h3 class="extra-bold-5 color-text">Agenda Sidang Minggu Ini</h3>
                </div>
                <?php if (sizeof($cases_this_week) === 0) : ?>
                    <p class="d-flex flex-shrink-1 ms-3 fw-bold text-blue-stone-600">Tidak ada agenda</p>
                <?php else: ?>
                    <?php foreach ($cases_this_week as $case_this_week) :  ?>
                        <div class="d-flex flex-column color-1" style="padding: 34px 37px; border-radius: 10px; border: 2px solid #c3c3c3;">
                            <div class="row justify-content-between">
                                <div class="col-9">
                                    <div class="d-flex flex-column" style="gap: 34px;">
                                        <div class="d-flex align-items-center" style="gap: 38px;">
                                            <div style="padding: 20px 24px; border-radius: 10px; background-color: var(--blue-stone-200);">
                                                <img src="<?= base_url('/img/user-gavel.png') ?>" alt="user-gavel" width="43">
                                            </div>

                                            <div class="d-flex flex-column" style="gap: 14px;">
                                                <h3 class="extra-bold-5 color-text">Agenda Perkara : <?= $case_this_week['case_position_name'] ?? 'Input Baru' ?></h3>

                                                <div class="d-flex align-items-center regular-2" style="gap: 16px;">
                                                    <p>No. Perkara : <span class="bold-2"><?= $case_this_week['case_number'] ?></span></p>
                                                    <p>Jenis Peradilan : <span class="bold-2"><?= $case_this_week['case_type_name'] ?></span></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center regular-1 color-text" style="gap: 83px;">
                                            <p>Tanggal Agenda : <span class="bold-3"><?= date('d-m-Y', strtotime($case_this_week['date'])) ?></span></p>
                                            <p>Lokasi Peradilan : <span class="bold-3"><?= $case_this_week['court_name'] ?></span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 text-end">

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif ?>
    </div>
</div>
<?= $this->endSection() ?>