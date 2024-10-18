<?php
include 'koneksi.php';

// Get the ID of the complaint from URL parameter
$id_pengaduan = $_GET['id'];

// Check if ID is present
if (empty($id_pengaduan)) {
    echo "<script>alert('ID Pengaduan tidak ditemukan.'); window.location.href='masyarakat.php';</script>";
    exit;
}

// Fetch the existing tanggapan from the database
$query_tanggapan = mysqli_query($koneksi, "SELECT tanggapan FROM tanggapan WHERE id_pengaduan='$id_pengaduan'");
$data_tanggapan = mysqli_fetch_assoc($query_tanggapan);

// Check if there is already a tanggapan
if ($data_tanggapan && !empty($data_tanggapan['tanggapan'])) {
    // Remove "Status: proses" if it exists in the tanggapan
    $cleaned_tanggapan = str_replace('Status: proses', '', $data_tanggapan['tanggapan']);
    
    // Append " - Status: selesai" to the cleaned tanggapan
    $tanggapan = trim($cleaned_tanggapan) . ' - Status: selesai';
} else {
    echo "<script>alert('Tanggapan belum ada.'); window.location.href='masyarakat.php';</script>";
    exit;
}

// Update the status to 'selesai' in the `pengaduan` table
$sql_pengaduan = "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='$id_pengaduan' AND status != 'selesai'";
$data_pengaduan = mysqli_query($koneksi, $sql_pengaduan);

// Update the `tanggapan` in the `tanggapan` table
$sql_update_tanggapan = "UPDATE tanggapan SET tanggapan='$tanggapan' WHERE id_pengaduan='$id_pengaduan'";
$data_update_tanggapan = mysqli_query($koneksi, $sql_update_tanggapan);

// Check if both updates were successful
if ($data_pengaduan && $data_update_tanggapan) {
    echo "<script>alert('Pengaduan berhasil diselesaikan dengan status tanggapan diperbarui.'); window.location.href='masyarakat.php?url=lihat-pengaduan';</script>";
} else {
    echo "<script>alert('Gagal menyelesaikan pengaduan.'); window.location.href='masyarakat.php?url=lihat-pengaduan';</script>";
}
?>
