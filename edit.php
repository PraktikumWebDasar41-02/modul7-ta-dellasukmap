<?php
require_once("koneksidb.php");
$nim   = $_GET['nim'];
$query=mysqli_query($conn, "SELECT * from mahasiswa where nim ='$nim'");
$row = mysqli_fetch_array($query);
if(isset($_POST['submit'])){
 $nim = $_POST["nim"];
 $nama = $_POST["nama"];
 $tanggal	= $_POST["tanggal"];
 $jeniskelamin	= $_POST["jeniskelamin"];
 $prodi	= $_POST["prodi"];
 $fakultas = $_POST["fakultas"];
 $asal = $_POST["asal"];
 $moto = $_POST["moto"];

 $mysql = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', jeniskelamin = '$jeniskelamin', prodi = '$prodi', fakultas = '$fakultas', asal = '$asal', moto = '$moto' WHERE nim='$nim'";
 if (mysqli_query($conn, $mysql)) {
 header('Location: tampilan.php');
 }else {
 echo "Data gagal terupload! " . $mysql . "<br?" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<center>
		<h1>FORM PENDAFTARAN MAHASISWA BARU</h1>
		Nama : <?php echo "<input type='text' name='nama' value='".$row['nama']."''>"; ?><br><br>
		Nim : <?php echo "<input type='text' name='nim' value='".$row['nim']."''>"; ?><br><br>
		Tanggal Lahir : <input type="date" name="tanggal"><br><br>
		Jenis Kelamin : <select name="jeniskelamin">
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
						</select><br><br>
		Program Studi : <select name="prodi">
						<option value="MI">MI</option>
						<option value="IF">IF</option>
						<option value="TK">TK</option>
						<option value="SM">SM</option>
						</select><br><br>
		Fakultas : <input type="radio" name="fakultas" value="			 FIT"<?php echo ($row['fakultas']=='FIT')?'			checked':''?>>FIT
				   <input type="radio" name="fakultas" value="FIF"<?php echo ($row['fakultas']=='FIF')?'checked':''?>>FIF
				   <input type="radio" name="fakultas" value="FRI"<?php echo ($row['fakultas']=='FRI')?'checked':''?>>FRI
				   <input type="radio" name="fakultas" value="FIK"<?php echo ($row['fakultas']=='FIK')?'checked':''?>>FIK
				   <br><br>
		Asal : <?php echo "<input type='text' name='asal' value='".$row['asal']."''>"; ?><br><br>
		Moto Hidup : <?php echo "<textarea name='moto'".">".$row['moto']."</textarea>"; ?><br><br>
		<input type="submit" name="submit" value="SUBMIT">
	</center>

</body>
</html>