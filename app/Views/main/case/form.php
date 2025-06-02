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

    label {
        font-weight: 700;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 68px 32px; gap: 30px;">
    <div class="d-flex flex-column" style="margin-bottom: 40px; padding: 47px 74px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <div class="d-flex align-items-center" style="gap: 38px;">
            <div style="padding: 20px 24px; border-radius: 10px; background-color: var(--blue-stone-500);">
                <img src="<?= base_url('/img/information.png') ?>" alt="information" width="52">
            </div>

            <h2 class="extra-bold-5 text-blue-stone-600">Informasi Perkara</h2>
        </div>
    </div>

    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 78px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <h3 class="extra-bold-4 text-blue-stone-600">Informasi Perkara</h3>

        <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
            <div class="col">
                <label for="case-number" class="form-label" style="margin-bottom: 18px;">Nomor Perkara</label>
                <input type="text" class="form-control" id="case-number" placeholder="Masukkan Nomor Perkara">
            </div>

            <div class="col">
                <label for="case-type" class="form-label" style="margin-bottom: 18px;">Jenis Perkara</label>
                <select class="form-select" id="case-type" aria-label="Select case type">
                    <option selected>Pilih Jenis Perkara</option>
                    <?php foreach ($case_types as $case_type) : ?>
                        <option value="<?= $case_type['id'] ?>"><?= $case_type['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col">
                <label for="court-location" class="form-label" style="margin-bottom: 18px;">Lokasi Pengadilan</label>
                <select class="form-select" id="court-location" aria-label="Select case location">
                    <option selected>Pilih Lokasi Pengadilan</option>
                    <?php foreach ($provinces as $province) : ?>
                        <option value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col">
                <label for="court" class="form-label" style="margin-bottom: 18px;">Pengadilan</label>
                <input type="text" class="form-control" id="court" placeholder="Masukkan Nama Pengadilan">
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
                    <?php foreach ($case_subjects as $case_subject) : ?>
                        <option value="<?= $case_subject['id'] ?>"><?= $case_subject['name'] ?></option>
                    <?php endforeach; ?>
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
                            <label class="form-check-label" style="line-height: 1.5;" for="claim-true">Ya, Ada</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="compensationClaim" id="claim-false" value="0" checked>
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
                <input type="text" class="form-control fw-bold" style="padding: 15px 20px;" id="pic" value="<?= session()->name ?>" disabled>
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

<template id="claim-template">
    <div class="d-flex w-100 align-items-center claim-item" style="gap: 30px;">
        <div class="col-4" style="padding: 10px 12px; border-radius: var(--bs-border-radius); border: 1px solid var(--bs-border-color)">
            <span class="claim-currency" data-id="1">IDR</span>
        </div>
        <div class="flex-fill" style="padding: 10px 12px; border-radius: var(--bs-border-radius); border: 1px solid var(--bs-border-color)">
            <span class="claim-amount">50.000.000</span>
        </div>
        <div class="flex-shrink-1">
            <button class="delete-claim" style="padding: 7.5px; border-radius: 5px; border: none; background-color: var(--blue-stone-500);">
                <img src="<?= base_url('/img/trash.png') ?>" alt="trash" width="20">
            </button>
        </div>
    </div>
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
            const currencyId = $(this).find(".claim-currency").data("id");
            const amount = $(this).find(".claim-amount").text().split(".").join("");

            claims.push({
                currencyId,
                amount
            });
        });

        $.ajax({
            method: "POST",
            url: "<?= base_url('/cases') ?>",
            data: {
                caseNumber: $("#case-number").val(),
                caseTypeId: $("#case-type").val(),
                provinceId: $("#court-location").val(),
                courtName: $("#court").val(),
                caseDate: $("#case-date").val(),
                caseDescription: $("#case-description").val(),
                caseSubjectId: $("#case-subject").val(),
                caseSummary: $("#case-summary").val(),
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
                    window.location.href = "/cases";
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