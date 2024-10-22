<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Membuat QR Code Generator Dengan PHP</title>
</head>

<body>

    <style type="text/css">
        body {
            /*background: orange;*/
        }

        h2,
        h3 {
            text-align: center;
        }

        .kotak {
            width: 300px;
            border: 1px dashed black;
            margin: 10px auto;
            padding: 20px;
            text-align: center;
        }

        .hasil {
            text-align: center;
        }
    </style>

    <h2>SAPB</h2>
    <h2>SISTEM APLIKASI PEMBUAT BARCODE</h2>


    <div class="kotak">
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="text" name="link" placeholder="Masukkan link" required><br><br>
            <input type="submit" value="Buat QR Code">
        </form>
    </div>

    <div class="hasil">
        <?php
        if (isset($_POST['link'])) {

            // Mengambil data dari form
            $link = $_POST['link'];

            // Memanggil library PHP QR code
            include "phpqrcode/qrlib.php";

            // Nama folder tempat penyimpanan file QR code
            $penyimpanan = "hasil/";

            // Membuat folder jika belum ada
            if (!file_exists($penyimpanan)) {
                mkdir($penyimpanan, 0777, true);
            }

            // Nama file hasil QR code
            $file_qrcode = $penyimpanan . 'hasil_qrcode_' . time() . '.png';

            // Membuat QR code dari link
            QRcode::png($link, $file_qrcode, QR_ECLEVEL_L, 10, 5);

            // Menampilkan QR code
            echo '<h3>QR Code berhasil dibuat:</h3>';
            echo '<img src="' . $file_qrcode . '" alt="QR Code"><br>';
            echo '<p>QR Code telah disimpan di folder <strong>hasil/</strong></p>';
        }
        ?>
    </div>

</body>

</html>
