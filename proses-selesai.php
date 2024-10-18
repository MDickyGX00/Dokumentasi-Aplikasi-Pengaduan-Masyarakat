<?php
include 'koneksi.php';

// Get the id_pengaduan from POST data (as it's a form submission)
$id_pengaduan = isset($_POST['id_pengaduan']) ? $_POST['id_pengaduan'] : null;

// Make sure id_pengaduan is not empty
if ($id_pengaduan) {
    // Update the status of the pengaduan to 'selesai'
    $sql = "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='$id_pengaduan'";
    $data = mysqli_query($koneksi, $sql);

    if ($data) {
        // Prepare the tanggapan details
        $tanggapan = 'selesai';
        $tgl_tanggapan = date('Y-m-d'); // Capture the current date

        // Insert the response into the tanggapan table
        $query = "INSERT INTO tanggapan (id_pengaduan, tanggapan, tgl_tanggapan) VALUES ('$id_pengaduan', '$tanggapan', '$tgl_tanggapan')";

        if(mysqli_query($koneksi, $query)) {
            // Success message and redirect
            echo "<script>alert('Pengaduan Sudah Terselesaikan 😝'); window.location.assign('masyarakat.php');</script>";
        } else {
            // If inserting into tanggapan fails
            echo "<script>alert('Gagal menambahkan tanggapan.'); window.location.href='masyarakat.php?url=lihat-pengaduan';</script>";
        }
    } else {
        // If status update failed
        echo "<script>alert('Gagal memperbarui status pengaduan.'); window.location.href='masyarakat.php?url=lihat-pengaduan';</script>";
    }
} else {
    // If id_pengaduan is not found, redirect with an error
    echo "<script>alert('ID Pengaduan tidak ditemukan.'); window.location.href='masyarakat.php?url=lihat-pengaduan';</script>";
}
?>
