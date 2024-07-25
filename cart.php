<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$total = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buyer_name'])) {
    $buyerName = $_POST['buyer_name'];
    $buyerAddress = $_POST['buyer_address'];
    $buyerEmail = $_POST['buyer_email'];
    $buyerContact = $_POST['buyer_contact'];
    $buyerNote = $_POST['buyer_note'];
    $paymentMethod = $_POST['payment_method'];
    
    $orderDetails = "Pembeli: $buyerName\nAlamat: $buyerAddress\nEmail: $buyerEmail\nNo. HP: $buyerContact\nKeterangan: $buyerNote\nMetode Pembayaran: $paymentMethod\nItem:\n";
    foreach ($_SESSION['cart'] as $item) {
        $orderDetails .= "- " . $item['name'] . " (Rp" . number_format($item['price'], 0, ',', '.') . ")\n";
    }
    $orderDetails .= "Total: Rp" . number_format(array_sum(array_column($_SESSION['cart'], 'price')), 0, ',', '.') . "\n\n";
    file_put_contents('orders.txt', $orderDetails, FILE_APPEND);

    // Tindak lanjut pembayaran
    switch ($paymentMethod) {
        case 'Dana':
            // Logika untuk pembayaran Dana
            $message = "Silakan lakukan pembayaran melalui aplikasi Dana ke nomor: 085712166170, Maka pesanan akan segera di proses:)";
            break;
        case 'Kartu Kredit':
            // Logika untuk pembayaran Kartu Kredit
            $message = "Silakan lakukan pembayaran menggunakan Kartu Kredit melalui link berikut: [Link Pembayaran Kartu Kredit] Maka pesanan akan segera diproses:)";
            break;
        case 'OVO':
            // Logika untuk pembayaran OVO
            $message = "Silakan lakukan pembayaran melalui aplikasi OVO ke nomor: 085712166170, Maka Pesanan akan segera di proses:)";
            break;
        case 'Bank Transfer':
            // Logika untuk pembayaran Bank Transfer
            $message = "Silakan lakukan pembayaran melalui transfer bank ke rekening berikut:\nBank: BCA Bank\nNomor Rekening: 1122334455\nAtas Nama: Azizah Parfume Shop. Maka pesanan akan segera diperoses:) ";
            break;
        default:
            $message = "Metode pembayaran tidak dikenali.";
            break;
    }

    $_SESSION['cart'] = [];
    $_SESSION['message'] = $message;
    header('Location: thankyou.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Azizah Parfume Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="bg-dark text-white p-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="images/logo baru.jpg" alt="Azizah Parfum Logo" class="logo">
            <h1 class="h3">Azizah Parfume Shop</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php#home">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="index.php#products">Produk</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="cart.php">Keranjang</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="admin.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
        <section id="cart">
            <h2>Keranjang Belanja</h2>
            <div id="cart-items" class="mb-4">
                <?php if (empty($_SESSION['cart'])): ?>
                    <p>Tidak ada item di keranjang.</p>
                <?php else: ?>
                    <ul class="list-group mb-3">
                        <?php foreach ($_SESSION['cart'] as $item): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo htmlspecialchars($item['name']); ?>
                                <span class="badge badge-primary badge-pill">Rp<?php echo number_format(htmlspecialchars($item['price']), 0, ',', '.'); ?></span>
                            </li>
                            <?php $total += $item['price']; ?>
                        <?php endforeach; ?>
                    </ul>
                    <p class="font-weight-bold">Total: Rp<?php echo number_format($total, 0, ',', '.'); ?></p>
                <?php endif; ?>
            </div>
            <?php if (!empty($_SESSION['cart'])): ?>
            <form method="POST" class="mb-4">
                <div class="form-group">
                    <label for="buyer_name">Nama:</label>
                    <input type="text" class="form-control" id="buyer_name" name="buyer_name" required>
                </div>
                <div class="form-group">
                    <label for="buyer_address">Alamat:</label>
                    <textarea class="form-control" id="buyer_address" name="buyer_address" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="buyer_email">Email:</label>
                    <input type="email" class="form-control" id="buyer_email" name="buyer_email" required>
                </div>
                <div class="form-group">
                    <label for="buyer_contact">No Yang Bisa dihubungi:</label>
                    <input type="text" class="form-control" id="buyer_contact" name="buyer_contact" required>
                </div>
                <div class="form-group">
                    <label for="buyer_note">Keterangan:</label>
                    <textarea class="form-control" id="buyer_note" name="buyer_note" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="payment_method">Metode Pembayaran:</label>
                    <select class="form-control" id="payment_method" name="payment_method" required>
                        <option value="Cash On Delivery">Cash On Delivery</option>
                        <option value="Dana">Dana</option>
                        <option value="Kartu Kredit">Kartu Kredit</option>
                        <option value="OVO">OVO</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
            <?php endif; ?>
        </section>
    </main>
    <footer class="bg-dark text-white text-center p-3 mt-4">
        <p>Klik disini:</p>
        <div class="row">
            <div class="col">
                WhatsApp: <a href="https://wa.me/085712166170" target="_blank">Hubungi WhatsApp kami</a>
            </div>
            <div class="col">
                Email: <a href="mailto:listianiurazizah1504@gmail.com">listianiurazizah1504@gmail.com</a>
            </div>
            <div class="col">
                Instagram: <a href="https://www.instagram.com/listiaaa.ni/" target="_blank">@listiaaa.ni</a>
            </div>
        </div>
    </footer>
</body>
</html>
