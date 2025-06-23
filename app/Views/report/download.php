<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perkara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        .table-striped {
            border-collapse: collapse;
            border: 1px black solid;
        }
    </style>
</head>

<body style="font-size: 12px;">
    <table style="width: 100%;">
        <tr>
            <td style="width: 10%;">
                <img src="<?= $logo ?>" alt="logo" width="100">
            </td>
            <td style="width: 90%;">
                <strong>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</strong><br>
                DIREKTORAT JENDERAL KEKAYAAN NEGARA<br>
                LEMBAGA MANAJEMEN ASET NEGARA
            </td>
        </tr>
    </table>

    <hr style="margin-bottom: 4rem;">

    <h1 style="margin-bottom: 3rem; text-align: center; font-size: 20px; text-decoration: underline;">LAPORAN PERKARA</h1>

    <table class="table-striped" style="width: 100%; margin-bottom: 3rem;" border="true">
        <thead class="text-center bg-blue-stone-200">
            <tr>
                <th style="height: 4rem;" width="5%">No</th>
                <th>Nomor Perkara</th>
                <th>Tanggal Perkara</th>
                <th>Jenis Peradilan</th>
                <th>Pokok Perkara</th>
                <th>Pengadilan</th>
                <th>Posisi Perkara</th>
                <th>PIC</th>
            </tr>
        </thead>
        <tbody class="text-center fw-extra-bold">
            <?php foreach ($cases as $index => $case) : ?>
                <tr>
                    <td style="height: 3rem; text-align:center;"><?= $index + 1 ?></td>
                    <td><?= $case['case_number'] ?></td>
                    <td><?= date('d-m-Y', strtotime($case['case_date'])) ?></td>
                    <td><?= $case['case_type_name'] ?></td>
                    <td><?= $case['case_subject_name'] ?></td>
                    <td><?= $case['court_name'] ?></td>
                    <td><?= $case['last_agenda']['case_position_name'] ?? 'Input Baru' ?></td>
                    <td><?= $case['pic_name'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width: 75%; vertical-align: top;"><span style="font-weight: 700;">Tanggal Download</span> : <?= date('d-m-Y') ?></td>
            <td style="width: 25%; vertical-align: top;">
                Mengetahui,<br>
                <strong>Kepala Divisi Advokasi</strong>
            </td>
        </tr>
    </table>
</body>

</html>