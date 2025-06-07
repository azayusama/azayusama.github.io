<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    $email = trim($_POST["email"]);
    $pesan = trim($_POST["pesan"]);

      // Validasi data (opsional)
    if (empty($nama) || empty($email) || empty($pesan)) {
        header("Location: index.html?error=1"); // Redirect ke halaman sebelumnya dengan pesan error
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.html?error=2"); // Redirect dengan pesan error untuk email tidak valid
        exit();
    }


    // Konfigurasi email (sesuaikan dengan detail email Anda)
    $to = "azayusama@gmail.com"; // Alamat email tujuan
    $subject = "Pesan dari formulir Hubungi Kami";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-type: text/html; charset=utf-8\r\n";

    $message = "<html><body>";
    $message .= "<h3>Pesan dari formulir Hubungi Kami</h3>";
    $message .= "<b>Nama:</b> " . htmlspecialchars($nama) . "<br>";
    $message .= "<b>Email:</b> " . htmlspecialchars($email) . "<br>";
    $message .= "<b>Pesan:</b> " . htmlspecialchars($pesan) . "<br>";
    $message .= "</body></html>";

    // Kirim email
    if (mail($to, $subject, $message, $headers)) {
        header("Location: index.html"); // Redirect ke halaman sebelumnya dengan pesan sukses
    } else {
        header("Location: undraw_software_engineer_lvl5.svg"); // Redirect dengan pesan error jika gagal mengirim email
    }
} else {
    header("Location: project-image01.png"); // Redirect ke halaman sebelumnya jika tidak ada data POST
}
?>
