<?php
if (!file_exists('orders.txt')) {
    file_put_contents('orders.txt', '');
}

$orders = file('orders.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Azizah Parfum</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="bg-dark text-white p-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="images/logo baru.jpg" alt="Azizah Parfum Logo" class="logo">
            <h1 class="h3">Azizah Parfum - Admin</h1>
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
        <section id="admin">
            <h2>Detail Pesanan</h2>
            <?php if (empty($orders)): ?>
                <p>Tidak ada pesanan yang masuk.</p>
            <?php else: ?>
                <div class="list-group">
                    <?php foreach ($orders as $order): ?>
                        <pre class="list-group-item"><?php echo htmlspecialchars($order); ?></pre>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>
    <footer class="bg-dark text-white text-center p-3 mt-4">
        <p>Hubungi kami:</p>
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

