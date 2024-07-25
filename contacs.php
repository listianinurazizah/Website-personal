<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Simpan data atau kirim email (ini hanya contoh)
    // Misal menyimpan ke file
    $file = fopen("contacts.txt", "a");
    fwrite($file, "Nama: $name\nEmail: $email\nPesan: $message\n\n");
    fclose($file);

    // Redirect ke halaman utama dengan pesan sukses
    header("Location: index.php?success=1");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
