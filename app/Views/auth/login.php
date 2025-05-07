<?= $this->extend('layouts/auth') ?>

<?= $this->section('page_title') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
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
<div class="container-fluid vh-100">
    <div class="container h-100 d-flex align-items-center">
        <div class="mx-auto login-container border-card">
            <div class="d-flex flex-column gap-3">
                <h1 class="extra-bold-1 blue-stone-600">Login</h1>
                <p class="">Selamat Datang di Web Super Admin SIMPLE</p>
            </div>

            <form id="login-form">
                <div class="d-flex flex-column" style="gap: 28px;">
                    <div class="">
                        <label class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Username Anda">
                    </div>

                    <div class="">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" placeholder="Password Anda">
                            <span class="input-group-text">
                                👁️ <!-- You can replace this with a real eye icon -->
                            </span>
                        </div>
                    </div>

                    <button type="submit" id="login-button" class="btn btn-blue-stone-600 text-white w-100">Login</button>
                </div>
            </form>

            <!-- Captcha -->

        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
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
                if (response.status === "success") {
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