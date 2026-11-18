<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form_data_diri.html');
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$tanggal = $_POST['tanggal_lahir'] ?? '';

if ($nama === '' || $tanggal === '') {
    die('Nama dan tanggal lahir wajib diisi. <a href="form_data_diri.html">&laquo; Kembali ke Form</a>');
}

// Format tanggal ke bahasa Indonesia
$bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$tgl = explode('-', $tanggal); // YYYY-MM-DD
$tanggal_indo = (int)$tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0];

// Gabungkan hobi
$hobi = $_POST['hobi'] ?? [];
$hobi_teks = empty($hobi) ? 'Tidak ada hobi yang dipilih' : implode(', ', $hobi);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tampilan Data Anda</title>
    <style>
        body { 
            font-family: Arial, Helvetica, sans-serif; 
            background: #f4f4f4; 
            padding: 40px 0; 
        }
        .container { 
            max-width: 520px; 
            margin: 0 auto; 
            background: #fff; 
            padding: 25px 30px; 
            border-radius: 8px; 
            box-shadow: 0 2px 6px rgba(0,0,0,.2); 
        }
        h1 { 
            margin-top: 0; 
            padding-bottom: 12px; 
            border-bottom: 1px solid #eee; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        td { 
            padding: 14px 0; 
            vertical-align: top; 
        }
        td.label { 
            font-weight: bold; 
            width: 140px; 
        }
        a { 
            color: #007bff; 
            text-decoration: none; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tampilan Data Anda</h1>
        <table>
            <tr><td class="label">Nama Lengkap:</td><td><?= htmlspecialchars($nama) ?></td></tr>
            <tr><td class="label">Tanggal Lahir:</td><td><?= htmlspecialchars($tanggal_indo) ?></td></tr>
            <tr><td class="label">Hobi:</td><td><?= htmlspecialchars($hobi_teks) ?></td></tr>
        </table>
        <p><a href="form_data_diri.html">&laquo; Kembali ke Form</a></p>
    </div>
</body>
</html>
