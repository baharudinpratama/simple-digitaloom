<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    label {
        font-weight: 700;
    }

    .case-card {
        height: 332px;
        padding: 56px 45px;
        border-radius: 10px;
        background-image: url("<?= base_url('/img/bg-cases.png') ?>");
        background-size: cover;
        background-repeat: no-repeat;
    }

    .nav-link.active {
        background-color: var(--blue-stone-600) !important;
        color: white;
    }

    .nav-link,
    .nav-link:hover {
        text-decoration: none;
        color: var(--color-1);
    }

    #case-summary,
    #case-summary:focus,
    #case-summary:focus-visible {
        border: none;
        outline: none;
        resize: none;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 68px 32px; gap: 30px;">
    <div class="d-flex flex-column" style="margin-bottom: 40px; padding: 47px 74px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <div class="d-flex align-items-center" style="gap: 38px;">
            <div style="padding: 20px 24px; border-radius: 10px; background-color: var(--blue-stone-500);">
                <img src="<?= base_url('/img/gavel-white.png') ?>" alt="gavel" width="43">
            </div>

            <div class="d-flex flex-column" style="gap: 15px;">
                <h2 class="extra-bold-5 text-blue-stone-600">No. Perkara : <?= $cases['case_number'] ?></h2>

                <p class="color-1" style="size: 15px;">Jenis Peradilan : <span class="fw-bold text-blue-stone-600"><?= $cases['case_type_name'] ?></span></p>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column fw-bold" style="padding: 42px 38px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" style="min-height: 56px;" id="pills-info-tab" data-bs-toggle="pill" data-bs-target="#pills-info" type="button" role="tab" aria-controls="pills-info" aria-selected="true">Informasi Perkara</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" style="min-height: 56px;" id="pills-data-tab" data-bs-toggle="pill" data-bs-target="#pills-data" type="button" role="tab" aria-controls="pills-data" aria-selected="false">Data Pendukung</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" style="min-height: 56px;" id="pills-parties-tab" data-bs-toggle="pill" data-bs-target="#pills-parties" type="button" role="tab" aria-controls="pills-parties" aria-selected="false">Para Pihak</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" style="min-height: 56px;" id="pills-object-tab" data-bs-toggle="pill" data-bs-target="#pills-object" type="button" role="tab" aria-controls="pills-object" aria-selected="false">Objek Perkara</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" style="min-height: 56px;" id="pills-agenda-tab" data-bs-toggle="pill" data-bs-target="#pills-agenda" type="button" role="tab" aria-controls="pills-agenda" aria-selected="false">Posisi Perkara</button>
            </li>
        </ul>
    </div>

    <div class="tab-content" id="pills-content">
        <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab" tabindex="0">
            <div class="d-flex flex-column" style="gap: 30px;">
                <?php if ($active_menu === 'cases') : ?>
                    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 60px; border-radius: 10px; border: 2px solid #c3c3c3;">
                        <h3 class="extra-bold-4 text-blue-stone-600">Informasi Perkara</h3>

                        <div class="row row-cols-2" style="--bs-gutter-y: 40px;">
                            <div class="col-6">
                                <div class="d-flex flex-column" style="gap: 16px;">
                                    <label>Tanggal Perkara</label>
                                    <span><?= date('d-m-Y', strtotime($cases['case_date'])) ?></span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="d-flex flex-column" style="gap: 16px;">
                                    <label>Pengadilan</label>
                                    <span><?= $cases['court_name'] ?></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-column" style="gap: 16px;">
                                    <label>Lokasi Pengadilan</label>
                                    <span><?= $cases['province_name'] ?></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-column" style="gap: 16px;">
                                    <label>Keterangan Perkara</label>
                                    <span><?= $cases['case_description'] ?></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-column" style="gap: 16px;">
                                    <label>Pokok Perkara</label>
                                    <span><?= $cases['case_subject_name'] ?></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-column" style="gap: 16px;">
                                    <label>Uraian Pokok Perkara</label>
                                    <textarea id="case-summary" style="line-height: 1.5;" rows="3" readonly><?= ($cases['case_summary']) ?></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-column" style="gap: 16px;">
                                    <label>Tuntutan Ganti Rugi</label>
                                    <?php if ($cases['compensation_claim']) : ?>
                                        <span>Ya, Terdapat Tuntutan Ganti Rugi (TGR)</span>
                                    <?php else : ?>
                                        <span>Tidak, Tidak Ada Tuntutan Ganti Rugi</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-column" style="gap: 16px;">
                                    <label>Nominal Tuntutan Ganti Rugi (TGR)</label>
                                    <?php if (sizeof($cases['claims']) > 0) : ?>
                                        <ul>
                                            <?php foreach ($cases['claims'] as $index => $claim) : ?>
                                                <div class="d-flex flex-column" style="margin-bottom: 16px; gap: 5px;">
                                                    <li style="margin-bottom: 5px;">Tuntutan Ganti Rugi ke-<?= $index + 1 ?></li>
                                                    <span><?= $claim['currency_symbol'] . number_format($claim['amount'], 0, ',', '.') ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 40px; border-radius: 10px; border: 2px solid #c3c3c3;">
                        <h3 class="extra-bold-4 text-blue-stone-600">PIC / Penanggung Jawab Data Perkara</h3>

                        <div class="row" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
                            <div class="d-flex flex-column">
                                <label for="pic" class="form-label" style="margin-bottom: 18px;">Nama PIC / Penanggung Jawab</label>
                                <span><?= $cases['pic_name'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($active_menu === 'manage_cases') : ?>
                    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 60px; border-radius: 10px; border: 2px solid #c3c3c3;">
                        <h3 class="extra-bold-4 text-blue-stone-600">Informasi Perkara</h3>

                        <div class="row row-cols-2" style="--bs-gutter-y: 40px;">
                            <div class="col-5">
                                <label for="case-date" class="form-label" style="margin-bottom: 18px;">Tanggal Perkara</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                        </svg>
                                    </span>
                                    <input type="date" class="form-control" id="case-date" value="<?= $cases['case_date'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="case-description" class="form-label" style="margin-bottom: 18px;">Keterangan Perkara</label>
                                <textarea class="form-control" id="case-description" placeholder="Masukkan Keterangan Perkara" style="padding: 20px;" rows="5"><?= esc(trim($cases['case_description'])) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 60px; border-radius: 10px; border: 2px solid #c3c3c3;">
                        <h3 class="extra-bold-4 text-blue-stone-600">Informasi Tuntutan Ganti Rugi (TGR)</h3>

                        <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
                            <div class="col">
                                <label class="form-label" style="margin-bottom: 25px;">Apakah ada Tuntutan Ganti Rugi (TGR)</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="compensationClaim" id="claim-true" value="1" <?= $cases['compensation_claim'] ? 'checked' : '' ?>>
                                            <label class="form-check-label" style="line-height: 1.5;" for="claim-true">Ya, Ada</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="compensationClaim" id="claim-false" value="0" <?= !$cases['compensation_claim'] ? 'checked' : '' ?>>
                                            <label class="form-check-label" style="line-height: 1.5;" for="claim-false">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="case-summary" class="form-label" style="margin-bottom: 18px;">Nominal Tuntutan Ganti Rugi (TGR)</label>

                                <div class="d-flex flex-column" style="gap: 18px;">
                                    <div class="d-flex align-items-center" style="gap: 30px;">
                                        <div class="col-4">
                                            <select class="form-select" id="currency" aria-label="Select currency">
                                                <?php foreach ($currencies as $currency) : ?>
                                                    <option value="<?= $currency['id'] ?>" data-code="<?= $currency['code'] ?>"><?= $currency['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="flex-fill">
                                            <input type="number" class="form-control" id="claim-amount" placeholder="Masukkan Nominal Tuntutan Ganti Rugi">
                                        </div>

                                        <div class="flex-shrink-1">
                                            <button id="add-claim" style="padding: 10px; border-radius: 5px; border: none; background-color: var(--blue-stone-500);">
                                                <img src="<?= base_url('/img/plus.png') ?>" alt="plus" width="15">
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Claims -->
                                    <div id="claims-container" class="d-flex flex-column align-items-center" style="gap: 17px;">
                                        <?php foreach ($cases['claims'] as $claim) : ?>
                                            <div class="d-flex w-100 align-items-center claim-item" data-id="<?= $claim['id'] ?>" style="gap: 30px;">
                                                <div class="col-4" style="padding: 10px 12px; border-radius: var(--bs-border-radius); border: 1px solid var(--bs-border-color)">
                                                    <span class="claim-currency" data-id="<?= $claim['currency_id'] ?>"><?= $claim['currency_code'] ?></span>
                                                </div>
                                                <div class="flex-fill" style="padding: 10px 12px; border-radius: var(--bs-border-radius); border: 1px solid var(--bs-border-color)">
                                                    <span class="claim-amount"><?= number_format($claim['amount'], 0, ',', '.') ?></span>
                                                </div>
                                                <div class="flex-shrink-1">
                                                    <button class="delete-claim" style="padding: 7.5px; border-radius: 5px; border: none; background-color: var(--blue-stone-500);">
                                                        <img src="<?= base_url('/img/trash.png') ?>" alt="trash" width="20">
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 40px; border-radius: 10px; border: 2px solid #c3c3c3;">
                        <h3 class="extra-bold-4 text-blue-stone-600">PIC / Penanggung Jawab Data Perkara</h3>

                        <div class="row" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
                            <div class="col">
                                <label for="pic" class="form-label" style="margin-bottom: 18px;">PIC / Penanggung Jawab Data Perkara</label>
                                <input type="text" class="form-control fw-bold" style="padding: 15px 20px;" id="pic" value="<?= $cases['pic_name'] ?? session()->name ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center" style="gap: 30px;">
                        <button class="d-flex align-items-center text-white" id="save" style="min-width: 188px; min-height: 43px; padding: 10px; border-radius: 5px; border: none; background-color: var(--blue-stone-600);">
                            <img src="<?= base_url('/img/save.png') ?>" alt="save" width="25" style="margin-right: 5px;">
                            Simpan Identitas Perkara
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-data" role="tabpanel" aria-labelledby="pills-data-tab" tabindex="0">
            <div class="d-flex flex-column" style="border-radius: 10px; border: 2px solid #c3c3c3;">
                <div class="d-flex justify-content-between align-items-center" style="padding: 49px 36px;">
                    <div class="d-flex flex-column" style="gap: 14px;">
                        <h2 class="extra-bold-5 text-blue-stone-600">Data Pendukung</h2>
                    </div>

                    <?php if (session()->role === 'operator' && $active_menu === 'manage_cases') : ?>
                        <div role="button" id="add-data" class="d-inline-flex justify-content-center align-items-center border-none bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none;">
                            <div class="d-flex align-items-center" style="gap: 10px;">
                                <img src="<?= base_url('/img/plus.png') ?>" alt="add" width="20">
                                <p style="font-weight: 700; font-size: 13px; line-height: normal;">Tambah Data Pendukung</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <table id="case-data-table">
                    <thead class="text-center bg-blue-stone-200" style="height: 78px;">
                        <tr>
                            <th width="5%">No</th>
                            <th>Jenis Aset</th>
                            <th>Lokasi Aset</th>
                            <th>Bukti Kepemilikan</th>
                            <th>Atas Nama</th>
                            <th class="action" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="case-data-tbody" class="text-center">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-parties" role="tabpanel" aria-labelledby="pills-parties-tab" tabindex="0">
            <div class="d-flex flex-column" style="border-radius: 10px; border: 2px solid #c3c3c3;">
                <div class="d-flex justify-content-between align-items-center" style="padding: 49px 36px;">
                    <div class="d-flex flex-column" style="gap: 14px;">
                        <h2 class="extra-bold-5 text-blue-stone-600">Data Para Pihak</h2>
                    </div>

                    <?php if (session()->role === 'operator' && $active_menu === 'manage_cases') : ?>
                        <div role="button" id="add-party" class="d-inline-flex justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none;">
                            <div class="d-flex align-items-center" style="gap: 10px;">
                                <img src="<?= base_url('/img/plus.png') ?>" alt="add" width="20">
                                <p style="font-weight: 700; font-size: 13px; line-height: normal;">Tambah Data Pihak</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <table id="case-party-table">
                    <thead class="text-center bg-blue-stone-200" style="height: 78px;">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Unit</th>
                            <th>Alamat</th>
                            <th>Sebagai</th>
                            <th>Urutan</th>
                            <th class="action" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="case-party-tbody" class="text-center">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-object" role="tabpanel" aria-labelledby="pills-object-tab" tabindex="0">
            <div class="d-flex flex-column" style="border-radius: 10px; border: 2px solid #c3c3c3;">
                <div class="d-flex justify-content-between align-items-center" style="padding: 49px 36px;">
                    <div class="d-flex flex-column" style="gap: 14px;">
                        <h2 class="extra-bold-5 text-blue-stone-600">Data Objek Perkara</h2>
                    </div>

                    <?php if (session()->role === 'operator' && $active_menu === 'manage_cases') : ?>
                        <div role="button" id="add-object" class="d-inline-flex justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none;">
                            <div class="d-flex align-items-center" style="gap: 10px;">
                                <img src="<?= base_url('/img/plus.png') ?>" alt="add" width="20">
                                <p style="font-weight: 700; font-size: 13px; line-height: normal;">Tambah Objek Perkara</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <table id="case-object-table">
                    <thead class="text-center bg-blue-stone-200" style="height: 78px;">
                        <tr>
                            <th width="5%">No</th>
                            <th>Jenis Aset</th>
                            <th>LT/LB</th>
                            <th>Status Dokumen / Sertifikat</th>
                            <th>Uraian</th>
                            <th>Lokasi</th>
                            <th>Atas Nama</th>
                            <th class="action" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="case-object-tbody" class="text-center">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-agenda" role="tabpanel" aria-labelledby="pills-agenda-tab" tabindex="0">
            <div class="d-flex flex-column" style="border-radius: 10px; border: 2px solid #c3c3c3;">
                <div class="d-flex justify-content-between align-items-center" style="padding: 49px 36px;">
                    <div class="d-flex flex-column" style="gap: 14px;">
                        <h2 class="extra-bold-5 text-blue-stone-600">Data Posisi Perkara</h2>
                    </div>

                    <div class="d-flex align-items-center" style="gap: 15px;">
                        <?php if (session()->role === 'operator' && $active_menu === 'manage_cases') : ?>
                            <div role="button" id="add-agenda" class="d-inline-flex justify-content-center align-items-center bg-blue-stone-600" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none;">
                                <div class="d-flex align-items-center" style="gap: 10px;">
                                    <img src="<?= base_url('/img/plus.png') ?>" alt="add" width="20">
                                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Tambah Posisi Perkara</p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('/reports/agenda') ?>" method="post" target="_blank">
                            <input type="hidden" name="caseId" value="<?= $cases['id'] ?>">
                            <button type="submit" class="d-inline-flex justify-content-center align-items-center border-0 bg-blue-stone-500" style="padding: 10px; border-radius: 5px; color: white; text-decoration: none;">
                                <div class="d-flex align-items-center" style="gap: 10px;">
                                    <img src="<?= base_url('/img/file-download-2.png') ?>" alt="download" width="20">
                                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Download Posisi Perkara</p>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>

                <table id="case-agenda-table">
                    <thead class="text-center bg-blue-stone-200" style="height: 78px;">
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Posisi</th>
                            <th>Tingkat Peradilan</th>
                            <th>Hasil Beracara / Amar Putusan</th>
                            <th>Menang / Kalah</th>
                            <th>Nomor Putusan</th>
                            <th>Petugas</th>
                            <th>Dokumen</th>
                            <th class="action" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="case-agenda-tbody" class="text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<template id="claim-template">
    <div class="d-flex w-100 align-items-center claim-item" data-id="" style="gap: 30px;">
        <div class="col-4" style="padding: 12px 6px; border-radius: var(--bs-border-radius); border: 1px solid var(--bs-border-color)">
            <span class="claim-currency" data-id="1" style="margin-left: 12px;">IDR</span>
        </div>
        <div class="flex-fill" style="padding: 12px 6px; border-radius: var(--bs-border-radius); border: 1px solid var(--bs-border-color)">
            <span class="claim-amount" style="margin-left: 12px;">50.000.000</span>
        </div>
        <div class="flex-shrink-1">
            <button class="delete-claim" style="padding: 7.5px; border-radius: 5px; border: none; background-color: var(--blue-stone-500);">
                <img src="<?= base_url('/img/trash.png') ?>" alt="trash" width="20">
            </button>
        </div>
    </div>
</template>

<template id="case-data-row-template">
    <tr data-id="">
        <td class="row-index" style="height: 94px;"></td>
        <td class="asset-type fw-semibold"></td>
        <td class="asset-location fw-semibold"></td>
        <td class="ownership-proof fw-bold"></td>
        <td class="asset-owner fw-bold"></td>
        <td class="action">
            <div class="d-flex align-items-center justify-content-center" style="gap: 5px;">
                <div role="button" class="edit-data text-center bg-blue-stone-500"
                    style="padding: 10px 20px; border-radius: 5px; color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Edit</p>
                </div>
                <div role="button" class="delete-data text-center bg-blue-stone-900"
                    style="padding: 10px 20px; border-radius: 5px; color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Hapus</p>
                </div>
            </div>
        </td>
    </tr>
</template>

<template id="case-party-row-template">
    <tr data-id="">
        <td class="row-index" style="height: 94px;"></td>
        <td class="party-name fw-semibold"></td>
        <td class="party-unit fw-semibold"></td>
        <td class="party-address fw-bold"></td>
        <td class="party-position fw-bold"></td>
        <td class="party-order fw-bold"></td>
        <td class="action">
            <div class="d-flex align-items-center justify-content-center" style="gap: 5px;">
                <div role="button" class="edit-party text-center bg-blue-stone-500"
                    style="padding: 10px 20px; border-radius: 5px; color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Edit</p>
                </div>
                <div role="button" class="delete-party text-center bg-blue-stone-900"
                    style="padding: 10px 20px; border-radius: 5px; color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Hapus</p>
                </div>
            </div>
        </td>
    </tr>
</template>

<template id="case-object-row-template">
    <tr data-id="">
        <td class="row-index" style="height: 94px;"></td>
        <td class="object-asset fw-semibold"></td>
        <td class="object-area fw-semibold"></td>
        <td class="object-doc fw-bold"></td>
        <td class="object-summary fw-bold"></td>
        <td class="object-location fw-bold"></td>
        <td class="object-owner fw-bold"></td>
        <td class="action">
            <div class="d-flex align-items-center justify-content-center" style="gap: 5px;">
                <div role="button" class="edit-object text-center bg-blue-stone-500"
                    style="padding: 10px 20px; border-radius: 5px; color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Edit</p>
                </div>
                <div role="button" class="delete-object text-center bg-blue-stone-900"
                    style="padding: 10px 20px; border-radius: 5px; color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Hapus</p>
                </div>
            </div>
        </td>
    </tr>
</template>

<template id="case-agenda-row-template">
    <tr data-id="">
        <td class="row-index" style="height: 94px;"></td>
        <td class="date fw-semibold"></td>
        <td class="position fw-semibold"></td>
        <td class="level fw-bold"></td>
        <td class="outcome fw-bold"></td>
        <td class="wl fw-bold"></td>
        <td class="decision-number fw-bold"></td>
        <td class="officer fw-bold"></td>
        <td class="doc fw-bold text-start text-truncate"></td>
        <td class="action">
            <div class="d-flex align-items-center justify-content-center" style="gap: 5px;">
                <div role="button" class="edit-agenda text-center bg-blue-stone-500"
                    style="padding: 10px 20px; border-radius: 5px; color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Edit</p>
                </div>
                <div role="button" class="delete-agenda text-center bg-blue-stone-900"
                    style="padding: 10px 20px; border-radius: 5px; color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Hapus</p>
                </div>
            </div>
        </td>
    </tr>
</template>

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

<div class="modal" id="modal-data" data-id="" data-method="create" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content position-relative border-0" style="border-radius: 10px;">
            <div class="modal-header bg-blue-stone-500 text-white" style="padding: 40px;">
                <div class="d-flex flex-column" style="gap: 20px;">
                    <h1 class="modal-title fs-5">Data Pendukung</h1>
                    <div class="d-flex align-items-center" style="gap: 12px;">
                        <img src="<?= base_url('/img/information-triangle.png') ?>" alt="information" width="30">
                        <p style="font-size: 15px; line-height: normal;">Peringatan : Harap pastikan seluruh data pendukung diisi dengan lengkap dan sesuai dokumen resmi.</p>
                    </div>
                </div>

                <div role="button" class="position-absolute" style="top: 15px; right: 15px;" data-bs-dismiss="modal" aria-label="Close">
                    <img src="<?= base_url('/img/close.svg') ?>" alt="close" width="17">
                </div>
            </div>
            <div class="modal-body" style="padding: 40px;">
                <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
                    <input type="hidden" id="case-data-id" value="">

                    <div class="col">
                        <label for="asset-type" class="form-label" style="margin-bottom: 18px;">Jenis Aset</label>
                        <input type="text" class="form-control" id="asset-type" placeholder="Jenis Aset">
                    </div>

                    <div class="col">
                        <label for="asset-location" class="form-label" style="margin-bottom: 18px;">Lokasi Aset</label>
                        <input type="text" class="form-control" id="asset-location" placeholder="Lokasi Aset">
                    </div>

                    <div class="col">
                        <label for="ownership-proof" class="form-label" style="margin-bottom: 18px;">Bukti Kepemilikan</label>
                        <input type="text" class="form-control" id="ownership-proof" placeholder="Bukti Kepemilikan">
                    </div>

                    <div class="col">
                        <label for="asset-owner" class="form-label" style="margin-bottom: 18px;">Atas Nama</label>
                        <input type="text" class="form-control" id="asset-owner" placeholder="Atas Nama Aset">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 30px;">
                <div role="button" id="cancel-data" class="text-center" data-bs-dismiss="modal" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p class="text-blue-stone-600" style="font-weight: 700; font-size: 13px; line-height: normal;">Batal</p>
                </div>
                <div role="button" id="save-data" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Simpan Draft</p>
                </div>
                <div role="button" id="update-data" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Simpan Perubahan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-party" data-id="" data-method="create" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content position-relative border-0" style="border-radius: 10px;">
            <div class="modal-header bg-blue-stone-500 text-white" style="padding: 40px;">
                <div class="d-flex flex-column" style="gap: 20px;">
                    <h1 class="modal-title fs-5">Data Pihak</h1>
                    <div class="d-flex align-items-center" style="gap: 12px;">
                        <img src="<?= base_url('/img/information-triangle.png') ?>" alt="information" width="30">
                        <p style="font-size: 15px; line-height: normal;">Peringatan : Harap pastikan seluruh data pendukung diisi dengan lengkap dan sesuai dokumen resmi.</p>
                    </div>
                </div>

                <div role="button" class="position-absolute" style="top: 15px; right: 15px;" data-bs-dismiss="modal" aria-label="Close">
                    <img src="<?= base_url('/img/close.svg') ?>" alt="close" width="17">
                </div>
            </div>
            <div class="modal-body" style="padding: 40px;">
                <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
                    <input type="hidden" id="case-party-id" value="">

                    <div class="col">
                        <label for="party-name" class="form-label" style="margin-bottom: 18px;">Nama Pihak</label>
                        <input type="text" class="form-control" id="party-name" placeholder="Nama Pihak">
                    </div>

                    <div class="col">
                        <label for="party-unit" class="form-label" style="margin-bottom: 18px;">Unit</label>
                        <select class="form-select" id="party-unit" aria-label="Select party unit">
                            <?php foreach ($party_units as $unit) : ?>
                                <option value="<?= $unit['id'] ?>"><?= $unit['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="party-position" class="form-label" style="margin-bottom: 18px;">Pihak Sebagai</label>
                        <select class="form-select" id="party-position" aria-label="Select party position">
                            <option value="Penggugat" selected>Penggugat</option>
                            <option value="Tergugat">Tergugat</option>
                            <option value="Turut Tergugat">Turut Tergugat</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="party-address" class="form-label" style="margin-bottom: 18px;">Alamat Pihak</label>
                        <textarea class="form-control" id="party-address" style="line-height: 1.5;" placeholder="Masukkan alamat pihak terkait dalam perkara ini"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="party-order" class="form-label" style="margin-bottom: 18px;">Urutan</label>
                        <input type="number" class="form-control" id="party-order" placeholder="Urutan pihak terkait dalam perkara ini, contoh: 1">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 30px;">
                <div role="button" id="cancel-party" class="text-center" data-bs-dismiss="modal" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p class="text-blue-stone-600" style="font-weight: 700; font-size: 13px; line-height: normal;">Batal</p>
                </div>
                <div role="button" id="save-party" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Simpan Draft</p>
                </div>
                <div role="button" id="update-party" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Simpan Perubahan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-object" data-id="" data-method="create" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content position-relative border-0" style="border-radius: 10px;">
            <div class="modal-header bg-blue-stone-500 text-white" style="padding: 40px;">
                <div class="d-flex flex-column" style="gap: 20px;">
                    <h1 class="modal-title fs-5">Data Object</h1>
                    <div class="d-flex align-items-center" style="gap: 12px;">
                        <img src="<?= base_url('/img/information-triangle.png') ?>" alt="information" width="30">
                        <p style="font-size: 15px; line-height: normal;">Peringatan : Harap pastikan seluruh data pendukung diisi dengan lengkap dan sesuai dokumen resmi.</p>
                    </div>
                </div>

                <div role="button" class="position-absolute" style="top: 15px; right: 15px;" data-bs-dismiss="modal" aria-label="Close">
                    <img src="<?= base_url('/img/close.svg') ?>" alt="close" width="17">
                </div>
            </div>
            <div class="modal-body" style="padding: 40px;">
                <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
                    <input type="hidden" id="case-object-id" value="">

                    <div class="col">
                        <label for="object-asset" class="form-label" style="margin-bottom: 18px;">Jenis Aset</label>
                        <select class="form-select" id="object-asset" aria-label="Select asset type">
                            <?php foreach ($asset_types as $type) : ?>
                                <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="object-area" class="form-label" style="margin-bottom: 18px;">Luas Tanah/Luas Bangunan</label>
                        <input type="number" class="form-control" id="object-area" placeholder="contoh: 1251">
                    </div>

                    <div class="col">
                        <label for="object-doc" class="form-label" style="margin-bottom: 18px;">Status Dokumen/Sertifikat</label>
                        <select class="form-select" id="object-doc" aria-label="Select document type">
                            <?php foreach ($doc_types as $type) : ?>
                                <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="object-owner" class="form-label" style="margin-bottom: 18px;">Atas Nama</label>
                        <input type="text" class="form-control" id="object-owner" placeholder="Atas Nama Aset Terkait">
                    </div>

                    <div class="col-12">
                        <label for="object-location" class="form-label" style="margin-bottom: 18px;">Lokasi</label>
                        <input type="text" class="form-control" id="object-location" placeholder="Lokasi Aset terkait">
                    </div>

                    <div class="col-12">
                        <label for="object-summary" class="form-label" style="margin-bottom: 18px;">Uraian Objek Perkara</label>
                        <textarea class="form-control" id="object-summary" style="line-height: 1.5;" placeholder="Uraikan secara panjang mengenai objek perkara terkait dalam perkara ini"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 30px;">
                <div role="button" id="cancel-object" class="text-center" data-bs-dismiss="modal" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p class="text-blue-stone-600" style="font-weight: 700; font-size: 13px; line-height: normal;">Batal</p>
                </div>
                <div role="button" id="save-object" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Simpan Draft</p>
                </div>
                <div role="button" id="update-object" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Simpan Perubahan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-agenda" data-id="" data-method="create" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content position-relative border-0" style="border-radius: 10px;">
            <div class="modal-header bg-blue-stone-500 text-white" style="padding: 40px;">
                <div class="d-flex flex-column" style="gap: 20px;">
                    <h1 class="modal-title fs-5">Data Posisi</h1>
                    <div class="d-flex align-items-center" style="gap: 12px;">
                        <img src="<?= base_url('/img/information-triangle.png') ?>" alt="information" width="30">
                        <p style="font-size: 15px; line-height: normal;">Peringatan : Harap pastikan seluruh data pendukung diisi dengan lengkap dan sesuai dokumen resmi.</p>
                    </div>
                </div>

                <div role="button" class="position-absolute" style="top: 15px; right: 15px;" data-bs-dismiss="modal" aria-label="Close">
                    <img src="<?= base_url('/img/close.svg') ?>" alt="close" width="17">
                </div>
            </div>
            <div class="modal-body" style="padding: 40px;">
                <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
                    <input type="hidden" id="case-agenda-id" value="">

                    <div class="col">
                        <label for="agenda-position" class="form-label" style="margin-bottom: 18px;">Posisi Perkara</label>
                        <select class="form-select" id="agenda-position" aria-label="Select asset type">
                            <?php foreach ($case_positions as $position) : ?>
                                <option value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="agenda-level" class="form-label" style="margin-bottom: 18px;">Tingkat Peradilan</label>
                        <input type="text" class="form-control" id="agenda-level" placeholder="Tingkat Peradilan">
                    </div>

                    <div class="col">
                        <label for="decision-number" class="form-label" style="margin-bottom: 18px;">Nomor Putusan</label>
                        <input type="text" class="form-control" id="decision-number" placeholder="Nomor Putusan">
                    </div>

                    <div class="col">
                        <label for="agenda-date" class="form-label" style="margin-bottom: 18px;">Tanggal Agenda Posisi Perkara</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg>
                            </span>
                            <input type="date" class="form-control" id="agenda-date">
                        </div>
                    </div>

                    <div class="col">
                        <label for="agenda-wl" class="form-label" style="margin-bottom: 18px;">Menang/Kalah</label>
                        <select class="form-select" id="agenda-wl" aria-label="Select party position">
                            <option value="" selected>Tidak Ada</option>
                            <option value="win">Menang</option>
                            <option value="lose">Kalah</option>
                        </select>
                    </div>

                    <div class="col">
                        <label for="agenda-officer" class="form-label" style="margin-bottom: 18px;">Petugas Beracara</label>
                        <input type="text" class="form-control" id="agenda-officer" placeholder="Masukkan Nama Petugas">
                    </div>

                    <div class="col-12">
                        <label for="agenda-outcome" class="form-label" style="margin-bottom: 18px;">Hasil Beracara / Amar Putusan</label>
                        <input type="text" class="form-control" id="agenda-outcome" placeholder="Hasil Putusan Sidang">
                    </div>

                    <div class="col-12">
                        <label for="agenda-doc" class="form-label" style="margin-bottom: 18px;">Upload Dokumen</label>
                        <div class="d-flex w-100 flex-column align-items-center justify-content-between" style="height: 250px; margin-bottom: 18px; padding: 30px; gap: 20px; border-radius: var(--bs-border-radius); border: 1px solid var(--bs-border-color)">
                            <img src="<?= base_url('/img/upload.png') ?>" alt="upload" width="46">
                            <div class="d-flex flex-column align-items-center" style="gap: 10px;">
                                <p class="fw-bold">Upload dokumen perkara dengan ukuran Maks 5Mb</p>
                                <p class="fw-bold color-1" style="font-size: 13px;">Pastikan dokumen terlihat dengan jelas dan sah (memiliki tanda tangan/pengesahan resmi)</p>
                            </div>
                            <div role="button" id="agenda-doc-btn" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                                <p style="font-weight: 700; font-size: 13px; line-height: normal;">Upload</p>
                            </div>
                            <input type="file" id="agenda-doc" style="display: none;" multiple>
                        </div>
                        <div id="agenda-file-preview" class="d-flex flex-column" style="gap: 18px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 30px;">
                <div role="button" id="cancel-agenda" class="text-center" data-bs-dismiss="modal" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p class="text-blue-stone-600" style="font-weight: 700; font-size: 13px; line-height: normal;">Batal</p>
                </div>
                <div role="button" id="save-agenda" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Simpan Draft</p>
                </div>
                <div role="button" id="update-agenda" class="text-center bg-blue-stone-600" style="min-width: 155px; padding: 10px; border-radius: 5px; border: 3px solid var(--blue-stone-600); color: white;">
                    <p style="font-weight: 700; font-size: 13px; line-height: normal;">Simpan Perubahan</p>
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
    const modalLoading = new bootstrap.Modal("#modal-loading");

    $("#add-claim").on("click", function() {
        const currencyId = $("#currency").val();
        const currency = $("#currency :selected").data("code");
        const amount = $("#claim-amount").val();

        if (!amount || amount <= 0) {
            alert("Masukkan nominal yang valid.");
            return;
        }

        const formattedAmount = parseInt(amount).toLocaleString("id-ID");

        const $template = $($("#claim-template").html());
        $template.find(".claim-currency").text(currency);
        $template.find(".claim-currency").attr("data-id", currencyId);
        $template.find(".claim-amount").text(formattedAmount);

        $("#claims-container").append($template);
        $("#claim-amount").val("");
    });

    $("#claims-container").on("click", ".delete-claim", function() {
        $(this).closest(".d-flex").remove();
    });

    $("#save").on("click", function() {
        const claims = [];

        $(".claim-item").each(function() {
            const id = $(this).data("id");
            const currencyId = $(this).find(".claim-currency").data("id");
            const amount = $(this).find(".claim-amount").text().split(".").join("");

            claims.push({
                id,
                currencyId,
                amount
            });
        });

        $.ajax({
            method: "POST",
            url: "<?= base_url('/manage-cases/update/') ?>",
            data: {
                id: "<?= $cases['id'] ?>",
                caseDate: $("#case-date").val(),
                caseDescription: $("#case-description").val(),
                compensationClaim: $(`input[name="compensationClaim"]:checked`).val(),
                claims: JSON.stringify(claims),
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

    const modalConfirm = new bootstrap.Modal("#modal-confirm");
    const modalData = new bootstrap.Modal("#modal-data");
    const modalParty = new bootstrap.Modal("#modal-party");
    const modalObject = new bootstrap.Modal("#modal-object");
    const modalAgenda = new bootstrap.Modal("#modal-agenda");

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

    $(document).ready(function() {
        getCaseData();
        getCaseParty();
        getCaseObject();
        getCaseAgenda();

        if ("<?= $active_menu ?>" === "cases") {
            $("th.action").prop("hidden", true);
            $("#case-data-tbody td.action").prop("hidden", true);
        }
    });

    // Data Section
    const getCaseData = () => {
        $.ajax({
            method: "GET",
            url: "<?= base_url('/manage-cases/' . $cases['id']) . '/data' ?>",
            success: function(response) {
                if (response.success) {
                    if (response.data.length > 0) {
                        const $tbody = $("#case-data-tbody");
                        $tbody.empty();

                        $.each(response.data, function(index, item) {
                            const $template = $($("#case-data-row-template").html());
                            $template.attr("data-id", item.id);
                            $template.find(".row-index").text(index + 1);
                            $template.find(".asset-type").text(item.asset_type);
                            $template.find(".asset-location").text(item.asset_location);
                            $template.find(".ownership-proof").text(item.ownership_proof);
                            $template.find(".asset-owner").text(item.asset_owner);

                            $template.find(".edit-data").on("click", function() {
                                $("#case-data-id").val(item.id);
                                $("#asset-type").val(item.asset_type);
                                $("#asset-location").val(item.asset_location);
                                $("#asset-owner").val(item.asset_owner);
                                $("#ownership-proof").val(item.ownership_proof);

                                $("#save-data").prop("hidden", true);
                                $("#update-data").prop("hidden", false);

                                modalData.show()
                            });

                            $template.find(".delete-data").on("click", async function() {
                                const confirmed = await showModalConfirm();

                                if (confirmed) {
                                    deleteData(item.id);
                                } else {
                                    modalConfirm.hide();
                                }
                            });

                            $tbody.append($template);

                            if ("<?= $active_menu ?>" === "cases") {
                                $("td.action").prop("hidden", true);
                            }
                        });
                    } else {
                        const $tbody = $("#case-data-tbody");
                        $tbody.empty();

                        $tbody.append(`
                            <tr>
                                <td colspan="99">
                                    <div class="d-flex flex-fill flex-column align-items-center justify-content-center" style="padding: 50px 0px; gap: 20px;">
                                        <img src="<?= base_url('/img/looking-file.png') ?>" alt="looking-file" width="300">
                                        <p class="extra-bold-6">Belum ada data pendukung yang diunggah untuk perkara ini</p>
                                        <span class="medium-4">Silakan unggah data pendukung untuk data perkara ini jika diperlukan</span>
                                    </div>
                                </td>
                            </tr>
                        `);
                    }
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

    const resetDataForm = () => {
        $("#case-data-id").val("");
        $("#asset-type").val("");
        $("#asset-location").val("");
        $("#asset-owner").val("");
        $("#ownership-proof").val("");

        $("#save-data").prop("hidden", false);
        $("#update-data").prop("hidden", true);
    }

    $("#add-data").on("click", function() {
        resetDataForm();
        modalData.show();
    });

    $("#cancel-data").on("click", function() {
        modalData.hide();
        resetDataForm();
    });

    $("#save-data").on("click", function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-data') ?>",
            data: {
                caseId: "<?= $cases['id'] ?>",
                assetType: $("#asset-type").val(),
                assetLocation: $("#asset-location").val(),
                assetOwner: $("#asset-owner").val(),
                ownershipProof: $("#ownership-proof").val()
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
                    modalData.hide();
                    resetDataForm();
                    getCaseData();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    $("#update-data").on("click", function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-data/update') ?>",
            data: {
                id: $("#case-data-id").val(),
                caseId: "<?= $cases['id'] ?>",
                assetType: $("#asset-type").val(),
                assetLocation: $("#asset-location").val(),
                assetOwner: $("#asset-owner").val(),
                ownershipProof: $("#ownership-proof").val()
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
                    modalData.hide();
                    resetDataForm();
                    getCaseData();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    const deleteData = (id) => {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-data/delete') ?>",
            data: {
                id,
                caseId: "<?= $cases['id'] ?>"
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
                    getCaseData();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    // Parties Section
    const getCaseParty = () => {
        $.ajax({
            method: "GET",
            url: "<?= base_url('/manage-cases/' . $cases['id']) . '/parties' ?>",
            success: function(response) {
                if (response.success) {
                    if (response.data.length > 0) {
                        const $tbody = $("#case-party-tbody");
                        $tbody.empty();

                        $.each(response.data, function(index, item) {
                            const $template = $($("#case-party-row-template").html());
                            $template.attr("data-id", item.id);
                            $template.find(".row-index").text(index + 1);
                            $template.find(".party-name").text(item.name);
                            $template.find(".party-unit").text(item.unit_name);
                            $template.find(".party-position").text(item.position);
                            $template.find(".party-address").text(item.address);
                            $template.find(".party-order").text(item.order);

                            $template.find(".edit-party").on("click", function() {
                                $("#case-party-id").val(item.id);
                                $("#party-name").val(item.name);
                                $("#party-unit").val(item.unit_id);
                                $("#party-position").val(item.position);
                                $("#party-address").val(item.address);
                                $("#party-order").val(item.order);

                                $("#save-party").prop("hidden", true);
                                $("#update-party").prop("hidden", false);

                                modalParty.show()
                            });

                            $template.find(".delete-party").on("click", async function() {
                                const confirmed = await showModalConfirm();

                                if (confirmed) {
                                    deleteParty(item.id);
                                } else {
                                    modalConfirm.hide();
                                }
                            });

                            $tbody.append($template);

                            if ("<?= $active_menu ?>" === "cases") {
                                $("td.action").prop("hidden", true);
                            }
                        });
                    } else {
                        const $tbody = $("#case-party-tbody");
                        $tbody.empty();

                        $tbody.append(`
                            <tr>
                                <td colspan="99">
                                    <div class="d-flex flex-fill flex-column align-items-center justify-content-center" style="padding: 50px 0px; gap: 20px;">
                                        <img src="<?= base_url('/img/looking-file.png') ?>" alt="looking-file" width="300">
                                        <p class="extra-bold-6">Belum ada data pihak yang ditambahkan untuk perkara ini</p>
                                        <span class="medium-4">Silakan tambah data pihak yang terlibat dalam data perkara ini</span>
                                    </div>
                                </td>
                            </tr>
                        `);
                    }
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

    const resetPartyForm = () => {
        $("#case-party-id").val("");
        $("#party-name").val("");
        $("#party-unit").val($("#party-unit option:first").val());
        $("#party-position").val($("#party-position option:first").val());
        $("#party-address").val("");
        $("#party-order").val("");

        $("#save-party").prop("hidden", false);
        $("#update-party").prop("hidden", true);
    }

    $("#add-party").on("click", function() {
        resetPartyForm();
        modalParty.show();
    });

    $("#cancel-party").on("click", function() {
        modalParty.hide();
        resetPartyForm();
    });

    $("#save-party").on("click", function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-parties') ?>",
            data: {
                caseId: "<?= $cases['id'] ?>",
                name: $("#party-name").val(),
                unitId: $("#party-unit").val(),
                position: $("#party-position").val(),
                address: $("#party-address").val(),
                order: $("#party-order").val()
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
                    modalParty.hide();
                    resetPartyForm();
                    getCaseParty();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    $("#update-party").on("click", function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-parties/update') ?>",
            data: {
                id: $("#case-party-id").val(),
                caseId: "<?= $cases['id'] ?>",
                name: $("#party-name").val(),
                unitId: $("#party-unit").val(),
                position: $("#party-position").val(),
                address: $("#party-address").val(),
                order: $("#party-order").val()
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
                    modalParty.hide();
                    resetDataForm();
                    getCaseParty();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    const deleteParty = (id) => {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-parties/delete') ?>",
            data: {
                id,
                caseId: "<?= $cases['id'] ?>"
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
                    getCaseParty();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    // Objects Section
    const getCaseObject = () => {
        $.ajax({
            method: "GET",
            url: "<?= base_url('/manage-cases/' . $cases['id']) . '/objects' ?>",
            success: function(response) {
                if (response.success) {
                    if (response.data.length > 0) {
                        const $tbody = $("#case-object-tbody");
                        $tbody.empty();

                        $.each(response.data, function(index, item) {
                            const $template = $($("#case-object-row-template").html());
                            $template.attr("data-id", item.id);
                            $template.find(".row-index").text(index + 1);
                            $template.find(".object-asset").text(item.asset_type_name);
                            $template.find(".object-area").text(item.area);
                            $template.find(".object-doc").text(item.doc_type_name);
                            $template.find(".object-owner").text(item.owner);
                            $template.find(".object-location").text(item.location);
                            $template.find(".object-summary").text(item.summary);

                            $template.find(".edit-object").on("click", function() {
                                $("#case-object-id").val(item.id);
                                $("#object-asset").val(item.asset_type_id);
                                $("#object-area").val(item.area);
                                $("#object-doc").val(item.doc_type_id);
                                $("#object-owner").val(item.owner);
                                $("#object-location").val(item.location);
                                $("#object-summary").val(item.summary);

                                $("#save-object").prop("hidden", true);
                                $("#update-object").prop("hidden", false);

                                modalObject.show()
                            });

                            $template.find(".delete-object").on("click", async function() {
                                const confirmed = await showModalConfirm();

                                if (confirmed) {
                                    deleteObject(item.id);
                                } else {
                                    modalConfirm.hide();
                                }
                            });

                            $tbody.append($template);

                            if ("<?= $active_menu ?>" === "cases") {
                                $("td.action").prop("hidden", true);
                            }
                        });
                    } else {
                        const $tbody = $("#case-object-tbody");
                        $tbody.empty();

                        $tbody.append(`
                            <tr>
                                <td colspan="99">
                                    <div class="d-flex flex-fill flex-column align-items-center justify-content-center" style="padding: 50px 0px; gap: 20px;">
                                        <img src="<?= base_url('/img/looking-file.png') ?>" alt="looking-file" width="300">
                                        <p class="extra-bold-6">Belum ada data Objek Perkara yang ditambahkan untuk perkara ini</p>
                                        <span class="medium-4">Silakan tambah data Objek Perkara yang diperlukan dalam data perkara ini</span>
                                    </div>
                                </td>
                            </tr>
                        `);
                    }
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

    const resetObjectForm = () => {
        $("#case-object-id").val("");
        $("#object-asset").val($("#object-asset option:first").val());
        $("#object-area").val("");
        $("#object-doc").val($("#object-doc option:first").val());
        $("#object-owner").val("");
        $("#object-location").val("");
        $("#object-summary").val("");

        $("#save-object").prop("hidden", false);
        $("#update-object").prop("hidden", true);
    }

    $("#add-object").on("click", function() {
        resetObjectForm();
        modalObject.show();
    });

    $("#cancel-object").on("click", function() {
        modalObject.hide();
        resetObjectForm();
    });

    $("#save-object").on("click", function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-objects') ?>",
            data: {
                caseId: "<?= $cases['id'] ?>",
                assetTypeId: $("#object-asset").val(),
                area: $("#object-area").val(),
                docTypeId: $("#object-doc").val(),
                owner: $("#object-owner").val(),
                location: $("#object-location").val(),
                summary: $("#object-summary").val(),
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
                    modalObject.hide();
                    resetObjectForm();
                    getCaseObject();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    $("#update-object").on("click", function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-objects/update') ?>",
            data: {
                id: $("#case-object-id").val(),
                caseId: "<?= $cases['id'] ?>",
                assetTypeId: $("#object-asset").val(),
                area: $("#object-area").val(),
                docTypeId: $("#object-doc").val(),
                owner: $("#object-owner").val(),
                location: $("#object-location").val(),
                summary: $("#object-summary").val(),
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
                    modalObject.hide();
                    resetObjectForm();
                    getCaseObject();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    const deleteObject = (id) => {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-objects/delete') ?>",
            data: {
                id,
                caseId: "<?= $cases['id'] ?>"
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
                    getCaseObject();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    // Agendas Section
    let agendaFiles = [];
    let deletedAgendaFileIds = [];

    const swithcWl = (choosen) => {
        if (choosen === "") return choosen;
        if (choosen === "win") return "Menang";
        if (choosen === "lose") return "Kalah";
    }

    const getCaseAgenda = () => {
        $.ajax({
            method: "GET",
            url: "<?= base_url('/manage-cases/' . $cases['id']) . '/agendas' ?>",
            success: function(response) {
                if (response.success) {
                    if (response.data.length > 0) {
                        const $tbody = $("#case-agenda-tbody");
                        $tbody.empty();

                        $.each(response.data, function(index, item) {
                            const $template = $($("#case-agenda-row-template").html());
                            $template.attr("data-id", item.id);
                            $template.find(".row-index").text(index + 1);
                            $template.find(".date").text(item.date);
                            $template.find(".position").text(item.case_position_name);
                            $template.find(".level").text(item.level);
                            $template.find(".outcome").text(item.outcome);
                            $template.find(".wl").text(swithcWl(item.win_lose));
                            $template.find(".decision-number").text(item.decision_number);
                            $template.find(".officer").text(item.officer);
                            item.agenda_files.forEach(file => {
                                $template.find(".doc").append(`<a href="<?= base_url('/uploads/agenda_files/') ?>${file.filename}" target="_blank" class="text-decoration-none">${file.name}</a>`);
                            });

                            item.agenda_files.forEach((file, index) => {
                                $("#agenda-file-preview").append(`
                                    <div data-file-id="${file.id}" data-agenda-id="${file.agenda_id}" class="existing-file d-flex align-items-center justify-content-between file-preview" style="padding: 0px 20px;">
                                        <div class="d-flex align-items-center" style="gap: 20px;">
                                            <div style="width: 58px; padding: 10px 12px; border-radius: 10px; background-color: var(--blue-stone-200);">
                                                <img src="<?= base_url('/img/file-pdf.png') ?>" alt="file-pdf" width="34">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center" style="gap: 14px;">
                                                <p class="bold-4">${file.name}</p>
                                                <p style="font-size: 13px;"></p>
                                            </div>
                                        </div>

                                        <button class="delete-xdoc-btn" style="padding: 10px; border-radius: 10px; border: none; background-color: var(--blue-stone-900);">
                                            <img src="<?= base_url('/img/trash.png') ?>" alt="trash" width="32">
                                        </button>
                                    </div>
                                `);
                            });

                            $template.find(".edit-agenda").on("click", function() {
                                $("#case-agenda-id").val(item.id);
                                $("#agenda-position").val(item.position_id);
                                $("#agenda-level").val(item.level);
                                $("#agenda-date").val(item.date);
                                $("#agenda-officer").val(item.officer);
                                $("#agenda-outcome").val(item.outcome);
                                $("#decision-number").val(item.decision_number);
                                $("#agenda-wl").val(item.win_lose);
                                $(".existing-file").addClass("d-none");
                                item.agenda_files.forEach(agenda => {
                                    $(`.existing-file[data-agenda-id="${item.id}"]`).removeClass("d-none");
                                });

                                $("#save-agenda").prop("hidden", true);
                                $("#update-agenda").prop("hidden", false);

                                modalAgenda.show()
                            });

                            $template.find(".delete-agenda").on("click", async function() {
                                const confirmed = await showModalConfirm();

                                if (confirmed) {
                                    deleteAgenda(item.id);
                                } else {
                                    modalConfirm.hide();
                                }
                            });

                            $tbody.append($template);

                            if ("<?= $active_menu ?>" === "cases") {
                                $("td.action").prop("hidden", true);
                            }
                        });
                    } else {
                        const $tbody = $("#case-agenda-tbody");
                        $tbody.empty();

                        $tbody.append(`
                            <tr>
                                <td colspan="99">
                                    <div class="d-flex flex-fill flex-column align-items-center justify-content-center" style="padding: 50px 0px; gap: 20px;">
                                        <img src="<?= base_url('/img/looking-file.png') ?>" alt="looking-file" width="300">
                                        <p class="extra-bold-6">Belum ada data Posisi Perkara yang ditambahkan untuk perkara ini</p>
                                        <span class="medium-4">Silakan perbaharui posisi perkara untuk data perkara ini jika sudah memasuki waktu sidang</span>
                                    </div>
                                </td>
                            </tr>
                        `);
                    }
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

    const resetAgendaForm = () => {
        agendaFiles = [];
        deletedAgendaFileIds = [];
        $("#case-agenda-id").val("");
        $("#agenda-position").val($("#agenda-position option:first").val());
        $("#agenda-level").val("");
        $("#agenda-date").val("");
        $("#agenda-officer").val("");
        $("#agenda-outcome").val("");
        $("#agenda-file-preview").html("");

        $("#save-agenda").prop("hidden", false);
        $("#update-agenda").prop("hidden", true);
    }

    $("#add-agenda").on("click", function() {
        resetAgendaForm();
        modalAgenda.show();
    });

    $("#cancel-agenda").on("click", function() {
        modalAgenda.hide();
        resetAgendaForm();
    });

    $("#agenda-doc-btn").on("click", function() {
        $("#agenda-doc").click();
    });

    const renderFileList = () => {
        agendaFiles.forEach((file, index) => {
            $("#agenda-file-preview").append(`
                <div data-index="${index}" class="d-flex align-items-center justify-content-between" style="padding: 0px 20px;">
                    <div class="d-flex align-items-center" style="gap: 20px;">
                        <div style="width: 58px; padding: 10px 12px; border-radius: 10px; background-color: var(--blue-stone-200);">
                            <img src="<?= base_url('/img/file-pdf.png') ?>" alt="file-pdf" width="34">
                        </div>

                        <div class="d-flex flex-column justify-content-center" style="gap: 14px;">
                            <p class="bold-4">${file.name}</p>
                            <p style="font-size: 13px;">Ukuran : ${(file.size / 1024).toFixed(1)} KB</p>
                        </div>
                    </div>

                    <button class="delete-doc-btn" style="padding: 10px; border-radius: 10px; border: none; background-color: var(--blue-stone-900);">
                        <img src="<?= base_url('/img/trash.png') ?>" alt="trash" width="32">
                    </button>
                </div>
            `);
        });
    }

    $("#agenda-doc").on("change", function(event) {
        const files = Array.from(event.target.files);

        for (file of files) {
            console.log(file.size/1024)
            if (file.size/1024 > 5000) {
                return alert("Ditemukan file lebih dari 5MB");
            }
        }

        agendaFiles = [...agendaFiles, ...files];

        renderFileList();
    });

    $("#agenda-file-preview").on("click", ".delete-doc-btn", function() {
        const index = $(this).parent().data("index");
        agendaFiles.splice(index, 1);
        renderFileList();
    });

    $("#agenda-file-preview").on("click", ".delete-xdoc-btn", function() {
        const parentDiv = $(this).closest('.existing-file');
        const fileId = parentDiv.data('file-id');
        deletedAgendaFileIds.push(fileId);
        parentDiv.remove();
    });

    $("#save-agenda").on("click", function() {
        const formData = new FormData();
        formData.append("caseId", "<?= $cases['id'] ?>");
        formData.append("positionId", $("#agenda-position").val());
        formData.append("level", $("#agenda-level").val());
        formData.append("date", $("#agenda-date").val());
        formData.append("officer", $("#agenda-officer").val());
        formData.append("outcome", $("#agenda-outcome").val());
        formData.append("decisionNumber", $("#decision-number").val());
        formData.append("winLose", $("#agenda-wl :selected").val());
        if (agendaFiles.length > 0) {
            agendaFiles.forEach((file) => {
                formData.append("files[]", file);
            });
        }

        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-agendas') ?>",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                modalLoading.show();
            },
            complete: function() {
                modalLoading.hide();
            },
            success: function(response) {
                if (response.success) {
                    modalAgenda.hide();
                    resetAgendaForm();
                    getCaseAgenda();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    $("#update-agenda").on("click", function() {
        const formData = new FormData();
        formData.append("id", $("#case-agenda-id").val());
        formData.append("caseId", "<?= $cases['id'] ?>");
        formData.append("positionId", $("#agenda-position").val());
        formData.append("level", $("#agenda-level").val());
        formData.append("date", $("#agenda-date").val());
        formData.append("officer", $("#agenda-officer").val());
        formData.append("outcome", $("#agenda-outcome").val());
        formData.append("decisionNumber", $("#decision-number").val());
        formData.append("winLose", $("#agenda-wl").val());
        if (agendaFiles.length > 0) {
            agendaFiles.forEach((file) => {
                formData.append("newFiles[]", file);
            });
        }
        deletedAgendaFileIds.forEach(id => {
            formData.append("deletedFileIds[]", id);
        });

        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-agendas/update') ?>",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                modalLoading.show();
            },
            complete: function() {
                modalLoading.hide();
            },
            success: function(response) {
                if (response.success) {
                    modalAgenda.hide();
                    resetAgendaForm();
                    getCaseAgenda();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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

    const deleteAgenda = (id) => {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/case-agendas/delete') ?>",
            data: {
                id,
                caseId: "<?= $cases['id'] ?>"
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
                    getCaseAgenda();

                    $("#toast-message").text(response.message);
                    let toast = new bootstrap.Toast('#toast');
                    toast.show();
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