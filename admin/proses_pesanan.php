<?php 
require_once 'dbkoneksi.php';
?>
<?php 
   $_tanggal = $_POST['tanggal'];
   $_nama = $_POST['nama'];
   $_alamat_pemesan = $_POST['alamat_pemesan'];
   $_no_hp = $_POST['no_hp'];
   $_email = $_POST['email'];
   $_jumlah_pesanan = $_POST['jumlah_pesanan'];
   $_deskripsi = $_POST['deskripsi'];
   $_produk_id = $_POST['produk_id'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_tanggal; // ? 2
   $ar_data[]=$_nama;// 3
   $ar_data[]=$_alamat_pemesan;
   $ar_data[]=$_no_hp;
   $ar_data[]=$_email;
   $ar_data[]=$_jumlah_pesanan; // ? 7
   $ar_data[]=$_deskripsi; // ? 7
   $ar_data[]=$_produk_id; // ? 7

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO pesanan (tanggal,nama_pemesan,alamat_pemesan,no_hp,email,
    jumlah_pesanan,deskripsi,produk_id) VALUES (?,?,?,?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 8
    $sql = "UPDATE pesanan SET tanggal=?,nama_pemesan=?,alamat_pemesan=?,no_hp=?,
    email=?,jumlah_pesanan=?,deskripsi=?,_produk_id=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:index.php?hal=pesanan');
?>