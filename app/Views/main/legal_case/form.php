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
<div class="container-fluid d-flex flex-column" style="padding: 68px 18px 0px 32px; gap: 67px;">
    <div class="w-100 case-card">
        <div class="h-100 d-flex flex-column justify-content-between text-white fw-bold">
            <h2 style="font-size: 35px;">Total Perkara</h2>
            <p style="font-size: 25px;"><span style="font-size: 70px;">190</span> Perkara</p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>