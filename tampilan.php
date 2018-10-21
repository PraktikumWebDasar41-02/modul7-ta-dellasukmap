<?php
session_start();
require_once("koneksidb.php");
if (isset($_POST["cari"])) {
    $value = $_POST["cari"];
$query = "SELECT * FROM mahasiswa where nim like '%$value%'";
}else {
$query = "SELECT * FROM mahasiswa ";
}
$result = mysqli_query($conn, $query);
?>
<table border=1 align="center">
	<head>
		<form action="" method="POST">
		<center>
		<h1>DATA MAHASISWA BARU</h1>
		<input type="text" name="nim" placeholder="Cari Nim Mahasiswa">
		<input type="submit" name="cari" value="cari">&nbsp&nbsp&nbsp&nbsp
		<a href='form.php'><b>Input Data</b></a><br><br>
		<th>Nama</th>
		<th>Nim</th>
		<th>Aksi</th>
		</center>
	</head>
	<tbody>
<?php
$row = mysqli_num_rows($result);
if(mysqli_num_rows($result)>0){
	
	while($row=mysqli_fetch_assoc($result)){
		$nim=$row['nim'];
		echo"<tr>";
		echo"<td>".$row["nama"]."</td>";
		echo"<td>".$row["nim"]."</td>";
		echo"<td>"."<a href='delete.php?nim=$nim'>Delete</a>|<a href='detail.php?nim=$nim'>Detail</a>"."</td>";
		echo"</tr>";
	}
}else{
	echo "0 results";
}
mysqli_close($conn);
?>

</tbody>
</table>