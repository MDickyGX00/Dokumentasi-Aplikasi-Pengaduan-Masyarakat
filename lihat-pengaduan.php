<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Pengaduan</h6>
    </div>
    <div class="card-body" style="font-size: 14px">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl Pengaduan</th>
                        <th>NIK</th>
                        <th>Isi Laporan</th>
                        <th>Tanggapan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tgl Pengaduan</th>
                        <th>NIK</th>
                        <th>Isi Laporan</th>
                        <th>Tanggapan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                include 'koneksi.php';

                $sql = "SELECT pengaduan.*, tanggapan.tanggapan FROM pengaduan 
                        LEFT JOIN tanggapan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan";
                $query = mysqli_query($koneksi, $sql);
                $no = 1;
                while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['Tgl_pengaduan']; ?></td>
                        <td><?= $data['nik']; ?></td>
                        <td><?= $data['isi_laporan']; ?></td>
                        
                        <!-- Kolom Tanggapan -->
                        <td>
                            <?php 
                                // Periksa jika tanggapan ada di database
                                if (!empty($data['tanggapan'])) {
                                    echo $data['tanggapan']; // Tampilkan tanggapan dari tabel tanggapan
                                } else {
                                    echo "Belum ada tanggapan"; // Jika tidak ada tanggapan
                                }
                            ?>
                        </td>

                        <td><img class="img-thumbnail" src="foto/<?= $data['foto'] ?>" width="150"></td>
                        <td><?= $data['status']; ?></td>
                        <td>
                            <a href="?url=lihat-tanggapan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa fa-info"></i>
                                </span>
                                <span class="text">Lihat Tanggapan</span>
                            </a>

                            <!-- Tampilkan tombol "Selesai" hanya jika status masih 'proses' -->
                            <?php if ($data['status'] == 'proses') { ?>
                                <a href="pengaduan-selesai.php?id=<?= $data['id_pengaduan'] ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <span class="text">Selesai</span>
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
