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
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 68px 32px; gap: 30px;">
    <div class="d-flex flex-column" style="margin-bottom: 40px; padding: 47px 74px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <div class="d-flex align-items-center" style="gap: 38px;">
            <div style="padding: 20px 24px; border-radius: 10px; background-color: var(--blue-stone-500);">
                <img src="<?= base_url('/img/information.png') ?>" alt="information" width="43">
            </div>

            <h3>Informasi Perkara</h3>
        </div>
    </div>

    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 78px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <h3>Informasi Perkara</h3>

        <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
            <div class="col">
                <label for="case-number" class="form-label" style="margin-bottom: 18px;">Nomor Perkara</label>
                <input type="text" class="form-control" id="case-number" placeholder="Masukkan Nomor Perkara">
            </div>

            <div class="col">
                <label for="case-type" class="form-label" style="margin-bottom: 18px;">Jenis Perkara</label>
                <select class="form-select" id="case-type" aria-label="Select case type">
                    <option selected>Pilih Jenis Perkara</option>
                    <option value="1">Perdata</option>
                </select>
            </div>

            <div class="col">
                <label for="court-location" class="form-label" style="margin-bottom: 18px;">Lokasi Pengadilan</label>
                <select class="form-select" id="court-location" aria-label="Select case location">
                    <option selected>Pilih Lokasi Pengadilan</option>
                    <option value="1">JAWA TIMUR</option>
                </select>
            </div>

            <div class="col">
                <label for="court" class="form-label" style="margin-bottom: 18px;">Pengadilan</label>
                <select class="form-select" id="court" aria-label="Select court">
                    <option selected>Pilih Pengadilan</option>
                    <option value="1">Pengadilan Negeri Surabaya</option>
                </select>
            </div>

            <div class="col">
                <label for="case-date" class="form-label" style="margin-bottom: 18px;">Tanggal Perkara</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg>
                    </span>
                    <input type="date" class="form-control" id="case-date">
                </div>
            </div>

            <div class="col-12">
                <label for="case-description" class="form-label" style="margin-bottom: 18px;">Keterangan Perkara</label>
                <textarea class="form-control" id="case-description" placeholder="Masukkan Keterangan Perkara" style="padding: 20px;" rows="5"></textarea>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 78px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <h3>Informasi Pokok Perkara</h3>

        <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
            <div class="col">
                <label for="case-subject" class="form-label" style="margin-bottom: 18px;">Pokok Perkara</label>
                <select class="form-select" id="case-subject" aria-label="Select case subject">
                    <option selected>Pilih Pokok Perkara</option>
                    <option value="1">Eks. BPPN</option>
                </select>
            </div>

            <div class="col-12">
                <label for="case-summary" class="form-label" style="margin-bottom: 18px;">Uraian Pokok Perkara</label>
                <textarea class="form-control" id="case-summary" placeholder="Masukkan Uraian Pokok Perkara" style="padding: 20px;" rows="5"></textarea>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 78px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <h3>Informasi Tuntutan Ganti Rugi (TGR)</h3>

        <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
            <div class="col">
                <label class="form-label" style="margin-bottom: 25px;">Apakah ada Tuntutan Ganti Rugi (TGR)</label>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="compensationClaim" id="claim-true" value="1">
                            <label class="form-check-label" for="claim-true">Ya, Ada</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="compensationClaim" id="claim-false" value="0">
                            <label class="form-check-label" for="claim-false">Tidak Ada</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="case-summary" class="form-label" style="margin-bottom: 18px;">Nominal Tuntutan Ganti Rugi (TGR)</label>

                <div class="d-flex align-items-center" style="gap: 30px;">
                    <div class="col">
                        <select class="form-select" aria-label="Select currency">
                            <option selected>IDR</option>
                        </select>
                    </div>

                    <div class="flex-fill">
                        <input type="number" class="form-control" id="claim-amount" placeholder="Masukkan Nominal Tuntutan Ganti Rugi">
                    </div>

                    <div class="flex-shrink-1">
                        <button style="padding: 10px; border-radius: 5px; border: none; background-color: var(--blue-stone-500);">
                            <img src="<?= base_url('/img/plus.png') ?>" alt="plus" width="15">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 78px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <h3>PIC / Penanggung Jawab Data Perkara</h3>

        <div class="row" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
            <div class="col">
                <label for="pic" class="form-label" style="margin-bottom: 18px;">PIC / Penanggung Jawab Data Perkara</label>
                <input type="text" class="form-control" id="pic" value="<?= session()->name ?>" disabled>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center" style="gap: 30px;">
        <button class="text-white" id="save" style="min-width: 188px; min-height: 43px; padding: 12px 4px; border-radius: 5px; border: none; background-color: var(--blue-stone-500);">
            Simpan Data
        </button>

        <button class="text-blue-stone-600" id="save" style="min-width: 117px; min-height: 43px; padding: 12px 4px; border-radius: 5px; border: 2px solid var(--blue-stone-600); background-color: white;">
            Batal
        </button>
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

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    const modalLoading = new bootstrap.Modal('#modal-loading');

    $(document).ready(function() {
        if ("<?= $method ?>" === "create") {
            $("#claim-false").prop("checked", true);
        }
    });

    $("#save").on("click", function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/legal-cases/store') ?>",
            data: {
                caseNumber: $("#case-number").val(),
                caseType: $("#case-type").val(),
                courtLocation: $("#court-location").val(),
                court: $("#court").val(),
                caseDate: $("#case-date").val(),
                caseDescription: $("#case-description").val(),
                caseSubject: $("#case-subject").val(),
                caseSummary: $("#case-summary").val(),
                compensationClaim: $(`input[name="compensationClaim"]:checked`).val(),
            },
            dataType: "json",
            beforeSend: function() {
                modalLoading.show();
            },
            complete: function() {
                modalLoading.hide();
            },
            success: function(response) {
                if (response.status === "success") {
                    window.location.href = "/legal-cases";
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