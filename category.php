<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
   <!-- Header -->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">Toko Buku</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="category.php">Kategori</a></li>
            <li><a href="clothes.php">Data Buku</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
        </div>
    </header>

    <!-- Content -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <p><a href="tambah-kategori.php">Tambah Kategori</a></p>
                <table border="1" cellspacing="0" class="tabel">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $num = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            if(mysqli_num_rows($kategori) > 0){
                            while($row = mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td><?php echo $num++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                                <a href="edit_category.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a href="delete-category.php?idc=<?php echo $row['category_id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else { ?>
                            <tr>
                                <td colspan="3">Tidak Ada Data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2020 - Toko Buku.</small>
        </div>
    </footer>
</body>
</html>