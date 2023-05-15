<?php
require_once 'dbkoneksi.php';
?>
<?php
$sql = "SELECT * FROM pesanan";
$rs = $dbh->query($sql);
?>

<h1 class="mt-4">Tables</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Tables</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more
        information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <!-- <i class="fas fa-table me-1"></i> -->
        <a class="btn btn-success" href="index.php?hal=form_pesanan">Create Pesanan</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Alamat Pemesan</th>
                    <th>No hp</th>
                    <th>Email</th>
                    <th>Jumlah Pesanan</th>
                    <th>Deskripsi</th>
                    <th>Produk Id</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Alamat Pesanan</th>
                    <th>No hp</th>
                    <th>Email</th>
                    <th>Jumlah Pemesan</th>
                    <th>Deskripsi</th>
                    <th>Produk Id</th>
                </tr>
            </tfoot>
            <tbody>
        <?php
        $nomor  = 1;
        foreach ($rs as $row) {
        ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['alamat_pemesan'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['jumlah_pesanan'] ?></td>
                <td><?= $row['deskripsi'] ?></td>
                <td><?= $row['prdouk_id'] ?></td>
                <td>
                    <a class="btn btn-primary" href="index.php?hal=view_pesanan&id=<?= $row['id'] ?>">View</a>
                    <a class="btn btn-primary" href="index.php?hal=form_pesanan&idedit=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-primary" href="delete_pesanan.php?iddel=<?= $row['id'] ?>" onclick="if(!confirm('Anda Yakin Hapus Data Produk <?= $row['nama'] ?>?')) {return false}">Delete</a>
                </td>
            </tr>
        <?php
            $nomor++;
        }
        ?>
    </tbody>
        </table>
    </div>
</div>