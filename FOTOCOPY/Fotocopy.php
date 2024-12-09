<!DOCTYPE html>
<html>
<head>
    <title>Hitung Harga Fotokopi</title>
</head>
<body>
    <h2>Form Hitung Harga Fotokopi</h2>
    <form method="post">
        <label for="status">Status Langganan:</label><br>
        <input type="radio" name="status" value="langganan" required> Langganan<br>
        <input type="radio" name="status" value="bukan langganan" required> Bukan Langganan<br><br>

        <label for="jumlahLembar">Jumlah Lembar Fotokopi:</label><br>
        <input type="number" name="jumlahLembar" min="1" required><br><br>

        <input type="submit" name="submit" value="Hitung Harga">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        function hitungHargaFotokopi($status, $jumlahLembar) {
            // Tentukan harga per lembar dan keterangan berdasarkan status dan jumlah lembar
            if ($status == "langganan") {
                $hargaPerLembar = 75;
                $keterangan = "Status langganan, harga per lembar Rp. 75.";
            } else {
                if ($jumlahLembar < 100) {
                    $hargaPerLembar = 100;
                    $keterangan = "Bukan langganan dengan harga per lembar Rp. 100 (kurang dari 100 lembar).";
                } else {
                    $hargaPerLembar = 85;
                    $keterangan = "Bukan langganan dengan harga per lembar Rp. 85 (100 lembar atau lebih).";
                }
            }
            
            // Hitung total harga
            $totalHarga = $hargaPerLembar * $jumlahLembar;
            
            // Tambahkan rincian penjumlahan
            $keterangan .= " Jumlah lembar: $jumlahLembar x Rp. " . number_format($hargaPerLembar, 0, ',', '.') . " = Rp. " . number_format($totalHarga, 0, ',', '.');

            return array($totalHarga, $keterangan);
        }

        // Mengambil nilai dari form
        $status = $_POST['status'];
        $jumlahLembar = (int)$_POST['jumlahLembar'];

        // Menghitung total harga dan mendapatkan keterangan
        list($totalHarga, $keterangan) = hitungHargaFotokopi($status, $jumlahLembar);

        // Menampilkan hasil dan keterangan
        echo "<h3>Total harga fotokopi: Rp. ".number_format($totalHarga, 0, ',', '.') ."</h3>" ;
        echo "<p>Keterangan: $keterangan</p>";
    }
    ?>
</body>
</html>
