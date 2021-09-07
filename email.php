<?php
session_start();
//Include file koneksi ke database
include 'koneksi.php';

//menerima nilai dari kiriman form pendaftaran
// $id=$_POST['id'];
$Nama=$_POST['Nama'];
$Email=$_POST['Email'];
$Nomor_Telepon=(int)$_POST['Nomor_Telepon'];
$Pesan=$_POST['Pesan'];





//Query input meginput data kedalam tabel anggota
  $sql="INSERT INTO `daftar_pengunjung`(`Nama`,`Email`,`Nomor_Telepon`,`Pesan`) VALUES ('$Nama','$Email','$Nomor_Telepon','$Pesan')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);
 
$email_from = 'noreply@lembahtumpang.xyz';


    $to       = "$Email";
    $subject  = 'Your Recepient';
    $message  =  "Pesan Anda Sudah Terkirim\n";


$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $Email \r\n";



//Kondisi apakah berhasil atau tidak
  if ($hasil){  
    mail($to,$subject,$message,$headers); 
    header("location:index.php?Pesan=Pesan Terkirim");
  }
else {
	header("gagal"); 
	exit;
}  

?>