<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posisi Perkara <?= $caseId ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
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

    <h1 style="margin-bottom: 3rem; text-align: center; font-size: 20px; text-decoration: underline;">RESUME PERKARA</h1>

    <table style="width: 100%; margin-bottom: 2rem;">
        <tr>
            <td colspan="99" style="padding-bottom: 0.25rem; font-weight: 700; font-style: italic;">Identitas Perkara</td>
        </tr>
        <tr>
            <td style="width: 20%;">Nomor Perkara</td>
            <td style="width: 5%;">:</td>
            <td style="width: 75%;"><?= $case['case_number'] ?></td>
        </tr>
        <tr>
            <td style="width: 20%;">Tanggal Perkara</td>
            <td style="width: 5%;">:</td>
            <td style="width: 75%;"><?= date('d-m-Y', strtotime($case['case_date'])) ?></td>
        </tr>
        <tr>
            <td style="width: 20%;">Pengadilan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 75%;"><?= $case['court_name'] ?></td>
        </tr>
        <tr>
            <td style="width: 20%;">Jenis Perkara</td>
            <td style="width: 5%;">:</td>
            <td style="width: 75%;"><?= $case['case_type_name'] ?></td>
        </tr>
        <tr>
            <td style="width: 20%;">Pokok Perkara</td>
            <td style="width: 5%;">:</td>
            <td style="width: 75%;"><?= $case['case_subject_name'] ?></td>
        </tr>
        <tr>
            <td style="width: 20%; vertical-align: top;">Keterangan</td>
            <td style="width: 5%; vertical-align: top;">:</td>
            <td style="width: 75%;"><?= $case['case_description'] ?></td>
        </tr>
    </table>

    <table style="width: 100%; margin-bottom: 2rem;">
        <tr>
            <td colspan="99" style="padding-bottom: 0.25rem; font-weight: 700; font-style: italic;">Para Pihak</td>
        </tr>
        <?php foreach ($parties as $party) : ?>
            <tr>
                <td style="width: 5%; text-align: center;">-</td>
                <td style="width: 95%;"><?= $party['name'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table style="width: 100%; margin-bottom: 2rem;">
        <tr>
            <td colspan="99" style="padding-bottom: 0.25rem; font-weight: 700; font-style: italic;">Objek Perkara</td>
        </tr>
        <?php foreach ($objects as $index => $object) : ?>
            <tr>
                <td style="width: 5%; text-align: center;"><?= $index + 1 ?>.</td>
                <td style="width: 20%;">Jenis Barang</td>
                <td style="width: 5%;">:</td>
                <td style="width: 70%;"><?= $object['asset_type_name'] ?></td>
            </tr>
            <tr>
                <td style="width: 5%; text-align: center;"></td>
                <td style="width: 20%;">Luas Tanah/Bangunan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 70%;"><?= $object['area'] ?></td>
            </tr>
            <tr>
                <td style="width: 5%; text-align: center;"></td>
                <td style="width: 20%;">Sertifikat/Dokumen</td>
                <td style="width: 5%;">:</td>
                <td style="width: 70%;"><?= $object['doc_type_name'] ?></td>
            </tr>
            <tr>
                <td style="width: 5%; text-align: center;"></td>
                <td style="width: 20%; vertical-align: top;">Lokasi</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 70%;"><?= $object['location'] ?></td>
            </tr>
            <tr>
                <td style="width: 5%; text-align: center;"></td>
                <td style="width: 20%; vertical-align: top;">Uraian</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 70%;"><?= $object['summary'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table style="width: 100%; margin-bottom: 2rem;">
        <tr>
            <td colspan="99" style="padding-bottom: 0.25rem; font-weight: 700; font-style: italic;">Data Pendukung</td>
        </tr>
        <?php foreach ($agendas as $agenda) : ?>
            <?php foreach ($agenda['files'] as $file) : ?>
                <tr>
                    <td style="width: 5%; text-align: center;">-</td>
                    <td style="width: 95%;"><?= $file['name'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>

    <table style="width: 100%; margin-bottom: 2rem;">
        <tr>
            <td colspan="99" style="padding-bottom: 0.25rem; font-weight: 700; font-style: italic;">Posisi Perkara</td>
        </tr>
        <?php foreach ($agendas as $agenda) : ?>
            <tr>
                <td style="width: 5%; text-align: center;">-</td>
                <td style="width: 15%;"><?= date('d-m-Y', strtotime($agenda['date'])) ?></td>
                <td style="width: 80%;"><?= $agenda['case_position_name'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width: 75%; vertical-align: top;"><span style="font-weight: 700;">Tanggal Proses</span> : <?= date('d-m-Y') ?></td>
            <td style="width: 25%; vertical-align: top;">
                Mengetahui,<br>
                <strong>Kepala Divisi Advokasi</strong>
            </td>
        </tr>
    </table>
</body>

</html>