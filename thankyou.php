<?php
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : 'Terima kasih atas pesanan Anda!';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih - Azizah Parfume Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="bg-dark text-white p-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="images/logo baru.jpg" alt="Azizah Parfum Logo" class="logo">
            <h1 class="h3">Azizah Parfume Shop</h1>
        </div>
    </header>
    <main class="container text-center">
        <h2>Terima Kasih atas pesanan anda!</h2>
        <p><?php echo htmlspecialchars($message); ?></p>
        <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
    </main>
</body>
</html>
<?php
unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
?>
