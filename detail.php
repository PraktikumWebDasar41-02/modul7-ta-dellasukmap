<?php
require_once("koneksidb.php");
?>


<a href="tampilan.php"> Kembali </a>

<br> <br>

<table border="1">
	<thead>
		<th> Nama </th>
		<th> NIM </th>
		<th> Tanggal </th>
		<th> Jenis Kelamin </th>
		<th> Program Studi </th>
		<th> Fakultas </th>
		<th> Asal </th>
		<th> Motto Hidup </th>
		<th> Aksi </th>
	</thead>

	<body>
		<?php
		$query = "SELECT * FROM mahasiswa";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				?>
				 <tr>
				 	<td><?php echo $row["nama"] ?></td>
				 	<td><?php echo $row["nim"] ?></td>
				 	<td><?php echo $row["tanggal"] ?></td>
				 	<td><?php echo $row["jeniskelamin"] ?></td>
				 	<td><?php echo $row["prodi"] ?></td>
				 	<td><?php echo $row["fakultas"] ?></td>
				 	<td><?php echo $row["asal"] ?></td>
				 	<td><?php echo $row["moto"] ?></td>
				 	<td> <a href='edit.php?nim=<?php echo $row['nim']?>'"> Edit </a>
				</tr>
				<?php
			}
		}else{
			echo "Data tidak tersedia";
		}
		mysqli_close($conn);
		?>
	</body>
</table