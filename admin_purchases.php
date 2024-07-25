<?php
session_start();

$purchases = isset($_SESSION['purchases']) ? $_SESSION['purchases'] : [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pembelian</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-dark text-white p-3 mb-4">
        <div class="container">
            <h1 class="h3">Admin Pembelian Azizah Parfum</h1>
        </div>
    </header>
    <main class="container">
        <h2>Daftar Pembelian</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Produk</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($purchases) > 0): ?>
                    <?php foreach ($purchases as $purchase): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($purchase['name']); ?></td>
                            <td><?php echo htmlspecialchars($purchase['email']); ?></td>
                            <td><?php echo htmlspecialchars($purchase['product']); ?></td>
                            <td>Rp<?php echo number_format(htmlspecialchars($purchase['price']), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Belum ada pembelian.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
