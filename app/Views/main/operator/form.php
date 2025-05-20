<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    label {
        font-weight: 700;
    }

    .form-label {
        margin-bottom: 18px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 68px 32px; gap: 30px;">
    <div class="d-flex align-items-center bg-blue-stone-500 text-white" style="padding: 40px 56px; gap: 16px; border-radius: 10px; font-weight: 600;">
        <img src="<?= base_url('/img/information-triangle.png') ?>" alt="info" width="25">
        <div>
            Harap pastikan data pengguna yang akan ditambahkan harus sesuai dan valid. Karena kesalahan dalam pengisian dapat berdampak pada pengelolaan perkara dan keamanan sistem.
        </div>
    </div>

    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 78px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <h3 class="extra-bold-4 text-blue-stone-600">Informasi Nama Pengguna</h3>

        <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
            <div class="col-12">
                <label for="username" class="form-label">Nama Pengguna (username)</label>
                <input type="text" class="form-control" id="username" placeholder="Masukkan Username"
                    value="<?= $active_menu === 'manage_operators' ? $operators['username'] : '' ?>"
                    <?= $active_menu === 'manage_operators' ? 'disabled' : '' ?>>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column" style="padding: 60px 57px; gap: 78px; border-radius: 10px; border: 2px solid #c3c3c3;">
        <h3 class="extra-bold-4 text-blue-stone-600">Kredensial Login Pengguna</h3>

        <div class="row row-cols-2" style="--bs-gutter-x: 70px; --bs-gutter-y: 40px;">
            <div class="col-6">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" id="password" class="form-control" style="border-right: none;" placeholder="Password">
                    <button type="button" class="toggle-password input-group-text" style="border-left: none; background-color: white;">
                        <img src="<?= base_url('/img/eye-closed.svg') ?>" alt="eye-closed" class="eye-closed" width="25" style="display: inline;">
                        <img src="<?= base_url('/img/eye.svg') ?>" alt="eye-open" class="eye-open" width="25" height="25" style="display: none;">
                    </button>
                </div>
            </div>

            <div class="col-6">
                <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" id="password-confirm" class="form-control" style="border-right: none;" placeholder="Konfirmasi Password">
                    <button type="button" class="toggle-password input-group-text" style="border-left: none; background-color: white;">
                        <img src="<?= base_url('/img/eye-closed.svg') ?>" alt="eye-closed" class="eye-closed" width="25" style="display: inline;">
                        <img src="<?= base_url('/img/eye.svg') ?>" alt="eye-open" class="eye-open" width="25" height="25" style="display: none;">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center" style="gap: 30px;">
        <button class="text-white" id="save" style="min-width: 188px; min-height: 43px; padding: 12px 4px; border-radius: 5px; border: none; background-color: var(--blue-stone-500);">
            Simpan Data
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

    $(".toggle-password").on("click", function() {
        const passwordInput = $("#password");
        const passwordConfirmInput = $("#password-confirm");

        const isPassword = passwordInput.attr("type") === "password";

        const newType = isPassword ? "text" : "password";
        passwordInput.attr("type", newType);
        passwordConfirmInput.attr("type", newType);

        $(".toggle-password").each(function() {
            $(this).find(".eye-open").toggle(isPassword);
            $(this).find(".eye-closed").toggle(!isPassword);
        });
    });

    $("#save").on("click", function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('/operators') ?><?= $method === 'update' ? '/update' : '' ?>",
            data: {
                id: "<?= $operators['id'] ?? '' ?>",
                username: $("#username").val(),
                password: $("#password").val(),
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
                    window.location.href = "/operators";
                    // $("#toast-message").text(response.message);
                    // let toast = new bootstrap.Toast('#toast');
                    // toast.show();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX error:", error);
                alert("Something went wrong.");
            }
        });
    })
</script>
<?= $this->endSection() ?>