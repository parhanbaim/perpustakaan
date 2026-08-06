<h4>Daftar History Peminjaman</h4>
<table class="table table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>Judul Buku</td>
        <td>Tanggal Pinjam</td>
        <td>Tanggal Kembali</td>
    </tr>
    <?php
    $no = 1;
    $query = "SELECT transaksi.*, buku.judul_buku FROM transaksi
    JOIN buku ON buku.id_buku = transaksi.id_buku
    WHERE transaksi.id_anggota='$_SESSION[id_anggota]'
    ORDER BY transaksi.id_transaksi DESC";
    $data = mysqli_query($koneksi, $query);
    if($data && mysqli_num_rows($data) > 0){
        while($row = mysqli_fetch_assoc($data)){
    ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['judul_buku'] ?></td>
                <td><?= $row['tgl_pinjam'] ?></td>
                <td><?= !empty($row['tgl_kembali']) ? $row['tgl_kembali'] : '-' ?></td>
            </tr>
    <?php }
    } else { ?>
        <tr>
            <td colspan="4">Belum ada riwayat peminjaman.</td>
        </tr>
    <?php } ?>