<?php 
require_once 'dbkoneksi.php';
?>
<?php 
   $_nama = $_POST['tanggal'];
   $_nama = $_POST['nama'];
   $_harga = $_POST['alamat_pemesan'];
   $_harga = $_POST['no_hp'];
   $_stok = $_POST['email'];
   $_minstok = $_POST['jumlah_pesanan'];
   $_jenis = $_POST['deskripsi'];
   $_jenis = $_POST['produk_id'];

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

   if($_proses == "Pesan"){
    // data baru
    $sql = "INSERT INTO pesanan (tanggal,nama,alamat_pemesan,no_hp,email,
    jumlah_pesanan,deskripsi,produk_id) VALUES (?,?,?,?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 8
    $sql = "UPDATE pesanan SET tanggal=?,nama=?,alamat_pemesan=?,no_hp=?,
    email=?,jumlah_pesanan=?,deskripsi=?, produk_id=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:index.php');
?>