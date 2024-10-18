<?php
// Cek apakah sesi sudah dimulai, jika belum maka mulai sesi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah sudah login atau belum
if (!isset($_SESSION['nama_petugas'])) {
    echo "<script>alert('Anda belum login!'); window.location.href = '../index2.php';</script>";
    exit();
}

if (isset($_GET['url'])) {
    switch ($_GET['url']) {
        case 'verifikasi-pengaduan': 
            include 'verifikasi-pengaduan.php'; 
            break;

        case 'detail-pengaduan': 
            include 'detail-pengaduan.php'; 
            break;

        case 'lihat-pengaduan': 
            include 'lihat-pengaduan.php'; 
            break;

        case 'tanggapan': 
            include 'tanggapan.php'; 
            break;
        
        default:
            echo "Halaman Tidak Ditemukan";
            break;
    }
} else {
    echo "Selamat Datang Di Aplikasi Pelaporan Pengaduan Masyarakat, Dimana Aplikasi ini dibuat untuk melaporkan tindakan yang menyimpang dari ketentuan.<br>";
}
echo "Anda Login Sebagai: " . $_SESSION['nama_petugas'];
?>
