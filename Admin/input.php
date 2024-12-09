<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pembayaran dan Pembelian Otomatis</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Pembelian dan Pembayaran Otomatis</h2>

    <div class="row">
        <!-- Bagian Produk -->
        <div class="col-md-6 mb-4">
            <h3>Pilih Produk</h3>
            <form id="productForm">
                <div class="mb-3">
                    <label for="categorySelect" class="form-label">Pilih Kategori Produk</label>
                    <select class="form-select" id="categorySelect" onchange="updateProductOptions()">
                        <option value="">Pilih Kategori</option>
                        <option value="electronics">Elektronik</option>
                        <option value="clothing">Pakaian</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="productSelect" class="form-label">Pilih Produk</label>
                    <select class="form-select" id="productSelect" disabled>
                        <!-- Produk akan diperbarui berdasarkan kategori -->
                    </select>
                </div>

                <div class="mb-3">
                    <label for="productQuantity" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="productQuantity" value="1" min="1">
                </div>
                <button type="button" class="btn btn-primary" onclick="addToCart()">Tambahkan ke Troli</button>
            </form>

            <h3 class="mt-4">Troli</h3>
            <ul class="list-group" id="cartItems">
                <!-- Daftar produk yang ditambahkan ke troli akan muncul di sini -->
            </ul>

            <h4 class="mt-3">Total Harga: <span id="totalPrice">Rp 0</span></h4>
        </div>

        <!-- Formulir Pembayaran -->
        <div class="col-md-6">
            <h3>Formulir Pembayaran</h3>
            <form id="paymentForm">
                <!-- Informasi Pengiriman -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat Pengiriman</label>
                    <textarea class="form-control" id="address" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="phone" placeholder="Masukkan nomor telepon" required>
                </div>

                <!-- Metode Pembayaran -->
                <h4 class="mb-3">Metode Pembayaran</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="bank_transfer" value="Bank Transfer" checked>
                    <label class="form-check-label" for="bank_transfer">Transfer Bank</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="credit_card" value="Credit Card">
                    <label class="form-check-label" for="credit_card">Kartu Kredit</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="e_wallet" value="E-Wallet">
                    <label class="form-check-label" for="e_wallet">E-Wallet (OVO, GoPay, dll.)</label>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary btn-lg w-100">Konfirmasi Pembayaran</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript untuk Mengelola Troli dan Menghitung Total Harga -->
<script>
    const products = {
        electronics: [
            { name: "TV LED", price: 3000000 },
            { name: "Smartphone", price: 2500000 },
            { name: "Laptop", price: 7000000 }
        ],
        clothing: [
            { name: "T-Shirt", price: 100000 },
            { name: "Jeans", price: 300000 },
            { name: "Jaket", price: 500000 }
        ]
    };

    let cart = [];
    let total = 0;

    function updateProductOptions() {
        const categorySelect = document.getElementById('categorySelect').value;
        const productSelect = document.getElementById('productSelect');

        // Reset pilihan produk
        productSelect.innerHTML = '<option value="">Pilih Produk</option>';
        productSelect.disabled = !categorySelect;

        if (categorySelect && products[categorySelect]) {
            products[categorySelect].forEach(product => {
                const option = document.createElement('option');
                option.value = product.price;
                option.text = `${product.name} (Rp ${product.price.toLocaleString()})`;
                productSelect.appendChild(option);
            });
        }
    }

    function addToCart() {
        const productSelect = document.getElementById('productSelect');
        const productQuantity = parseInt(document.getElementById('productQuantity').value);
        const productPrice = parseInt(productSelect.value);
        const productName = productSelect.options[productSelect.selectedIndex].text;

        if (!productSelect.value || productQuantity < 1) {
            alert("Pilih produk dan jumlah yang benar");
            return;
        }

        // Tambahkan produk ke troli
        cart.push({ name: productName, quantity: productQuantity, price: productPrice });

        // Perbarui total harga
        total += productPrice * productQuantity;

        // Tampilkan produk di troli
        const cartItems = document.getElementById('cartItems');
        const newCartItem = document.createElement('li');
        newCartItem.className = 'list-group-item d-flex justify-content-between';
        newCartItem.innerHTML = `<span>${productName} x${productQuantity}</span><span>Rp ${(productPrice * productQuantity).toLocaleString()}</span>`;
        cartItems.appendChild(newCartItem);

        // Perbarui tampilan total harga
        document.getElementById('totalPrice').innerText = 'Rp ' + total.toLocaleString();
    }

    // Menangani pengiriman form pembayaran
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah reload halaman saat submit
        alert("Pembayaran berhasil dikonfirmasi! Total: " + document.getElementById('totalPrice').innerText);
    });
</script>

</body>
</html>
