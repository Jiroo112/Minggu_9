<?php
require('koneksi.php');
require('query.php');

$obj = new crud;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    
    if ($obj->updateData($id, $email, $nama)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal mengupdate data";
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID not found.');
$data = $obj->getDataById($id);

if ($data->rowCount() > 0) {
    $row = $data->fetch(PDO::FETCH_ASSOC);
    $email = $row['user_email'];
    $nama = $row['nama'];
} else {
    echo "Data tidak ditemukan.";
    exit();
}
?>

<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br>
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>