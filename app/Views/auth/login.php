<?= $this->extend('layouts/auth') ?>

<?= $this->section('page_title') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    label {
        font-weight: bold;
    }

    .form-label {
        margin-bottom: 15px;
    }

    .login-container {
        display: flex;
        flex-direction: column;
        width: 552px;
        border-radius: 15px;
        border-width: 2px;
        border-style: solid;
        padding: 31px 36px;
        gap: 28px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="position-relative container-fluid vh-100">
    <div class="container h-100 d-flex align-items-center">
        <div class="mx-auto login-container bg-white border-card">
            <div class="d-flex flex-column gap-3">
                <h1 class="extra-bold-1 text-blue-stone-600">Login</h1>
                <p class="fw-medium color-1" hidden>Selamat Datang di Web Super Admin SIMPLE</p>
            </div>

            <form id="login-form">
                <div class="d-flex flex-column" style="gap: 28px;">
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Username Anda">
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" style="border-right: none;" placeholder="Password Anda">
                            <button type="button" id="toggle-password" class="input-group-text" style="border-left: none; background-color: white;">
                                <img src="<?= base_url('/img/eye-closed.svg') ?>" alt="eye-closed" class="eye-closed" width="25" style="display: inline;">
                                <img src="<?= base_url('/img/eye.svg') ?>" alt="eye-open" class="eye-open" width="25" height="25" style="display: none;">
                            </button>
                        </div>
                    </div>

                    <button type="submit" id="login-button" class="btn btn-blue-stone-600 text-white w-100">Login</button>
                </div>
            </form>

            <!-- Captcha -->

        </div>
    </div>

    <img src="<?= base_url('/img/logo.png') ?>" alt="" width="200" class="position-absolute" style="top: 2.5rem; left: 2.5rem;">
    <img src="<?= base_url('/img/2-eclipse-alt.png') ?>" alt="" class="position-absolute" style="bottom: 0px; left: 0px; z-index: -1;">
    <img src="<?= base_url('/img/8-circle-alt.png') ?>" alt="" class="position-absolute" style="right: 0px; bottom: 0px; z-index: -1;">
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $("#toggle-password").on("click", function() {
        const passwordInput = $("#password");
        const eyeOpen = $(this).find(".eye-open");
        const eyeClosed = $(this).find(".eye-closed");

        const isPassword = passwordInput.attr("type") === "password";

        passwordInput.attr("type", isPassword ? "text" : "password");
        eyeClosed.toggle(!isPassword);
        eyeOpen.toggle(isPassword);
    });

    $("#login-form").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "<?= base_url('/login') ?>",
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    window.location.href = "/dashboard";
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX error:", error);
            }
        });
    });
</script>
<?= $this->endSection() ?>