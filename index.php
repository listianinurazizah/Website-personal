<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$products = [
    ['name' => 'Perfume Aigner Blue E', 'price' => 30000, 'image' => 'images/parfume3.jpeg'],
    ['name' => 'Perfume Bacarat', 'price' => 60000, 'image' => 'images/parfume2.jpeg'],
    ['name' => 'Perfume Scandal', 'price' => 40000, 'image' => 'images/parfume3.jpeg'],
    ['name' => 'Perfume Casablanca', 'price' => 70000, 'image' => 'images/parfume4.jpeg'],
    ['name' => 'Perfume Dunhil Blue', 'price' => 50000, 'image' => 'images/parfume5.jpeg'],
    ['name' => 'Perfume Escada Moon', 'price' => 50000, 'image' => 'images/parfume6.jpeg'],
    ['name' => 'Perfume Gatsby', 'price' => 50000, 'image' => 'images/parfume7.jpeg'],
    ['name' => 'Perfume Harajuku', 'price' => 50000, 'image' => 'images/parfume8.jpeg'],
    ['name' => 'Perfume Incanto', 'price' => 50000, 'image' => 'images/parfume9.jpeg'],
    ['name' => 'Perfume Jlo Style', 'price' => 50000, 'image' => 'images/parfume10.jpeg'],
    ['name' => 'Perfume Kenzo Bali', 'price' => 50000, 'image' => 'images/parfume11.jpeg'],
    ['name' => 'Perfume Lovely', 'price' => 50000, 'image' => 'images/parfume12.jpeg'],
    ['name' => 'Perfume Marbet Men', 'price' => 50000, 'image' => 'images/parfume13.jpeg'],
    ['name' => 'Perfume Nagita', 'price' => 50000, 'image' => 'images/parfume14.jpeg'],
    ['name' => 'Perfume One Direction', 'price' => 50000, 'image' => 'images/parfume15.jpeg'],
    ['name' => 'Perfume Pink Chifon', 'price' => 50000, 'image' => 'images/parfume16.jpeg'],
    ['name' => 'Perfume Rafi Ahmad', 'price' => 50000, 'image' => 'images/parfume17.jpeg'],
    ['name' => 'Perfume Soft', 'price' => 50000, 'image' => 'images/parfume18.jpeg'],
    ['name' => 'Perfume Taylor Swift', 'price' => 50000, 'image' => 'images/parfume19.jpeg'],
    ['name' => 'Perfume Victoria Scandal', 'price' => 50000, 'image' => 'images/parfume20.jpeg'],
    ['name' => 'Perfume White Musk Vanila', 'price' => 50000, 'image' => 'images/parfume21.jpeg'],
    ['name' => 'Perfume Yellow Amber', 'price' => 50000, 'image' => 'images/parfume22.jpeg'],
    ['name' => 'Perfume Zwitzal', 'price' => 50000, 'image' => 'images/parfume23.jpeg'],
    ['name' => 'Perfume 212 VIP Man', 'price' => 50000, 'image' => 'images/parfume24.jpeg'],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name'])) {
    $productName = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING);
    $productPrice = filter_input(INPUT_POST, 'product_price', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['cart'][] = ['name' => $productName, 'price' => $productPrice];
    header('Location: cart.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azizah Parfum</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>
</head>
<body>
    <header class="bg-dark text-white p-3 mb-4" data-aos="fade-down">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="images/logo baru.jpg" alt="Azizah Parfum Logo" class="logo">
            <h1 class="h3">Azizah Parfume Shop</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#products">Products</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="cart.php">Cart</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="admin.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
        <section id="home" class="mb-4" data-aos="fade-in">
            <h2>Selamat Datang di Azizah Parfume Shop</h2>
            <p>Azizah Parfume adalah Tempat favorit Anda untuk membeli parfum secara online.</p>
<p> "Daya tarik sebuah Aroma sangat berkaitan dengan memori yang tersimpan" </p>
            <p> Temukan aroma yang sempurna untuk Anda</P>
        </section>
        <section id="products">
            <h2 data-aos="fade-up">Berbagai Macam Produk Kami :</h2>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-4" data-aos="fade-up">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="card-img-top">
                            <div class="card-body text-center">
                                <h3 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                                <p class="card-text">Harga: Rp<?php echo number_format(htmlspecialchars($product['price']), 0, ',', '.'); ?></p>
                                <form method="POST">
                                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
                                    <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product['price']); ?>">
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <footer class="bg-dark text-white text-center p-3 mt-4" data-aos="fade-up">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
