<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 0px 32px; gap: 47px;">
    <div class="d-flex flex-column" style="gap: 14px;">
        <h2>Informasi Terkini Penanganan Perkara</h2>

        <div class="d-flex align-items-center" style="gap: 21px;">
            <p>Info Penanganan Perkara Terbaru</p>
            <div style="width: 6px; height: 6px; border-radius: 100%; background-color: #d9d9d9;"></div>
            <p>4 Info</p>
        </div>
    </div>

    <div class="d-flex flex-column" style="gap: 18px;">
        <div class="d-flex flex-column" style="padding: 34px 37px; border-radius: 10px; border: 2px solid #c3c3c3;">
            <div class="row justify-content-between">
                <div class="col-9">
                    <div class="d-flex flex-column" style="gap: 34px;">
                        <div class="d-flex align-items-center" style="gap: 38px;">
                            <div style="padding: 20px 24px; border-radius: 10px; background-color: var(--blue-stone-200);">
                                <img src="<?= base_url('/img/user-gavel.png') ?>" alt="user-gavel" width="43">
                            </div>

                            <div class="d-flex flex-column" style="gap: 14px;">
                                <h3>Update Perkara : Perkara Memasuki Memori Banding</h3>

                                <div class="d-flex align-items-center" style="gap: 16px;">
                                    <p>No. Perkara : 78/Pdt.G/2025/PN.Sby</p>
                                    <p>Jenis Peradilan : Perdata</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center" style="gap: 83px;">
                            <p>Tanggal Perkara : 24 - 01 - 2025</p>
                            <p>Lokasi Peradilan : PN Surabaya</p>
                        </div>
                    </div>
                </div>

                <div class="col-3 text-end">
                    19 Jan 2025
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>