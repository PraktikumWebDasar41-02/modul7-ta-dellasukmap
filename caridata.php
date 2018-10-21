<?php
require_once("koneksidb.php");
$value = $_POST['cari'];
$query = "SELECT * FROM mahasiswa where nim like '%$value%'";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>

<head>

    <title>Pencarian Nim</title>

</head>

<body>
    <table>
        <tr>
            <th>Nama</th>
            <th>Nim</th>
            <th>Aksi</th>
        </tr>

        <?php
        $result = mysqli_query($conn, $query);
        $row = mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['nama']?></td>
                    <td><?php echo $row['nim']?></td>
                    <td> <a href="delete.php?nim=<?php echo $row['nim']?>">Delete</a>|<a href="detail.php?nim=<?php echo $row['nim']?>">Detail</a>


                </tr>
                        <?php
            }
        }else {
            echo "Tidak ada";
        }
        mysqli_close($conn);
        ?>

</table>

</body>

</html>