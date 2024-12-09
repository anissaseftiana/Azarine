<?php
require "../Config/config.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mt-4">Input Data Barang</h2>

        <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Input Nama Barang -->
                <div class="form-group">
                    <label for="namaBarang">Nama Barang:</label>
                    <input type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Masukkan nama barang" required>
                </div>

                <!-- Input Kode Kategori -->
                <div class="form-group">
                    <label for="kodekategoriBarang">Kode Kategori:</label>
                    <select class="form-control" id="kodekategoriBarang" name="kodekategoriBarang" required>
                        <option value="" disabled selected>Pilih kode kategori</option>
                        <option value="0001">0001</option>
                        <option value="0002">0002</option>
                        <option value="0003">0003</option>
                        <option value="0004">0004</option>
                        <option value="0005">0005</option>
                        <option value="0006">0006</option>
                    </select>
                </div>

                <!-- Input Kode Barang -->
                

                <!-- Input Harga -->
                <div class="form-group">
                    <label for="hargabarang">Harga Barang:</label>
                    <input type="text" class="form-control" id="hargabarang" name="hargabarang" placeholder="Masukkan harga barang" required>
                </div>

                <!-- Input Deskripsi Barang -->
                <div class="form-group">
                    <label for="deskripsiBarang">Deskripsi Barang:</label>
                    <textarea class="form-control" id="deskripsiBarang" name="deskripsiBarang" placeholder="Masukkan deskripsi barang" rows="5" required></textarea>
                </div>

                <!-- Input Gambar Barang -->
                <div class="form-group">
                    <label for="gambarBarang">Upload Gambar Barang:</label>
                    <input type="file" class="form-control-file" id="gambarBarang" name="gambarBarang" accept="image/*" required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" name="submit" class="btn btn-success btn-block">Kirim Data Barang</button>
            </form>

        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
