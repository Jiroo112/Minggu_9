<?php
require('koneksi.php');
require('query.php');
$email = isset($_GET["user_fullname"]) ? $_GET["user_fullname"] : "";
$obj = new crud;
?>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Selamat Datang <?php echo $email; ?></h1>
    <table border='1'>
        <tr>
            <td>No</td>
            <td>Email</td>
            <td>Nama</td>
            <td></td>
        </tr>
        <?php
        $data = $obj->lihatData();
        $no = 1;
        if ($data->rowCount() > 0) {
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>">hapus</a>
                    </td>
                </tr>
                <?php
                $no++;
            }
        }
        ?>
    </table>
</body>
</html>