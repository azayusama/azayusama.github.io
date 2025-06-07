<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $pesan = $_POST["pesan"];

    // Konfigurasi email
    $to = "azayusama@gmail.com"; // Ganti dengan alamat email tujuan Anda
    $subject = "Pesan dari Formulir";
    $headers = "From: " . $nama . " <" . $email . ">" . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Isi pesan email
    $message = "Nama: " . $nama . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Pesan: " . $pesan . "\n";

    // Kirim email
    if (mail($to, $subject, $message, $headers)) {
        echo "Pesan berhasil dikirim!";
    } else {
        echo "Gagal mengirim pesan.";
    }
}

?>
