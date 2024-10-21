<?php
require ("koneksi.php");
$email = isset($_GET['user_email']) ? $_GET['user_email'] : "";
?>

<html>
    <head>
        <title>Home</title>
    </head>

    <body>
        <h1>Selamat datang<?php echo $email;?></h1>
        <table border='1'>
            <tr>
                <td>No</td>
                <td>Email</td>
                <td>Nama</td>
                <td></td>
            </tr>
            <?php
            $query = "SELECT * FROM user_detail";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            while($row = mysqli_fetch_array($result)){
                $userMail=$row['user_email'];
                $userName=$row['nama'];
            ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $userMail; ?></td>
                <td><?php echo $userName; ?></td>
                <td><a href="edit.php?id=<?php echo $row['id'];?>">edit</td>
                <td><a href="delete.php?id=<?php echo $row['id'];?>">hapus</td>
            </tr>
            <?php
            $no++;
            }?>

        </table>
    </body>
</html>