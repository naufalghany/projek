<?php 
require_once '../dbkoneksi.php';
?>
<?php 
   $_kode = $_POST['kode'];
   $_nama = $_POST['nama'];
   $_harga_jual = $_POST['harga_jual'];
   $_harga_beli = $_POST['harga_beli'];
   $_stok = $_POST['stok'];
   $_minstok = $_POST['min_stok'];
   $_deskripsi = $_POST['deskripsi'];
   $_kategori_produk_id = $_POST['kategori_produk_id'];
   $_foto = $_POST['foto'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_kode; // ? 1
   $ar_data[]=$_nama; // ? 2
   $ar_data[]=$_harga_jual;// 3
   $ar_data[]=$_harga_beli;
   $ar_data[]=$_stok;
   $ar_data[]=$_min_stok;
   $ar_data[]=$_deskripsi; // ? 7
   $ar_data[]=$_kategori_produk_id; // ? 
   $ar_data[]=$_foto; // ? 

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO produk (kode,nama,harga_jual,harga_beli,stok,
    min_stok,deskripsi,kategori_produk_id,foto) VALUES (?,?,?,?,?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 9
    $sql = "UPDATE produk SET kode=?,nama=?,harga_jual=?,harga_beli=?,
    stok=?,min_stok=?,deskripsi=?,kategori_produk_id=?,foto=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location: ../index.php?hal=table_produk/produk');
?>