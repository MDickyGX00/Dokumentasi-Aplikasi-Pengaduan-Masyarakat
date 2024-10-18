<?php
include '../koneksi.php';

// Get the id_pengaduan from the POST or GET
$id_pengaduan = isset($_GET['id']) ? $_GET['id'] : $_POST['id_pengaduan'];

// Update the status of the pengaduan
$sql = "UPDATE pengaduan SET status='proses' WHERE id_pengaduan='$id_pengaduan'";
$data = mysqli_query($koneksi, $sql);

if ($data) {
    // Prepare the tanggapan details
    $tanggapan = $_POST['tanggapan'] . ' - Status: proses';
    $tgl_tanggapan = date('Y-m-d'); // Capture the current date

    // Insert the response into the tanggapan table
    $query = "INSERT INTO tanggapan (id_pengaduan, tanggapan, tgl_tanggapan) VALUES ('$id_pengaduan', '$tanggapan', '$tgl_tanggapan')";

    if (mysqli_query($koneksi, $query)) {
        // Redirect to petugas.php with a success message
        echo "<script>alert('Tanggapan berhasil disimpan!'); window.location.href='petugas.php?url=verifikasi-pengaduan';</script>";
    } else {
        // Redirect to petugas.php with a failure message
        echo "<script>alert('Gagal menyimpan tanggapan.'); window.location.href='petugas.php?url=verifikasi-pengaduan';</script>";
    }
} else {
    // If status update failed, redirect with a failure message
    echo "<script>alert('Gagal memperbarui status pengaduan.'); window.location.href='petugas.php?url=verifikasi-pengaduan';</script>";
}
?>
