<?php
$id = $_GET['id'];
if (empty($id)) {
    header("Location: masyarakat.php");
    exit; // Best practice untuk menghentikan eksekusi setelah redirect
}

include 'koneksi.php';

// Ambil data pengaduan dan tanggapan berdasarkan ID pengaduan
$query = mysqli_query($koneksi, "SELECT pengaduan.*, tanggapan.tanggapan 
                                 FROM pengaduan 
                                 LEFT JOIN tanggapan 
                                 ON tanggapan.id_pengaduan = pengaduan.id_pengaduan 
                                 WHERE pengaduan.id_pengaduan='$id'");

if (mysqli_num_rows($query) == 0) {
    echo "<script>alert('Pengaduan belum ditanggapi oleh petugas'); window.location.assign('masyarakat.php?url=lihat-pengaduan');</script>";
    exit;
} else {
    $data = mysqli_fetch_array($query);
}
?>

<div class="card shadow">
    <div class="card-header">
        <a href="?url=lihat-pengaduan" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <form method="post" action="proses-pengaduan.php" enctype="multipart/form-data">
            <div class="form-group">
                <label style="font-size: 14px;">Tgl Pengaduan</label>
                <input type="text" name="tgl_pengaduan" class="form-control" readonly value="<?= $data['Tgl_pengaduan']; ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 14px;">Isi Laporan</label>
                <textarea name="isi_laporan" class="form-control" required readonly><?= $data['isi_laporan']; ?></textarea>
            </div>
            <div class="form-group">
                <label style="font-size: 14px;">Foto</label>
                <img class="img-thumbnail" src="foto/<?= $data['foto'] ?>" width="300">
            </div>
            <div class="form-group">
                <label style="font-size: 14px;">Tanggapan</label>
                <!-- Menampilkan tanggapan dari admin/petugas -->
                <textarea name="tanggapan" class="form-control" required readonly><?= isset($data['tanggapan']) ? $data['tanggapan'] : 'Belum ada tanggapan'; ?></textarea>
            </div>
            <div class="form-group">
                <label style="font-size: 14px;">Status</label>
                <input type="text" name="status" class="form-control" readonly value="<?= $data['status']; ?>">
            </div>
        </form>
    </div>
</div>
