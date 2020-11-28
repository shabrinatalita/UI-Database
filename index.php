<?php
    include 'db.php';
    $mimin = mysqli_query($conn, "SELECT admin_telpon, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($mimin);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Baju</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
   <!-- Header -->
    <header>
        <div class="container">
        <h1><a href="index.php">Toko Baju</a></h1>
        <ul>
            <li><a href="baju.php">Produk</a></li>
        </ul>
        </div>
    </header>

    <!--Pencarian-->
    <div class="cari">
        <div class="container">
            <form action="baju.php">
                <input type="text" name="cari" placeholder="Cari Baju">
                <input type="submit" name="search" value="Cari Baju">
            </form>
        </div>
    </div>

    <!--Kategori-->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if(mysqli_num_rows($kategori) > 0) {
                        while($k = mysqli_fetch_array($kategori)) {
                ?>
                    <a href="baju.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-5">
                            <img src="img/list.png" width="50px" style="margin-bottom:5px;">
                            <p><?php echo $k['category_name'] ?></p>
                        </div>
                        </a>
                <?php }}else { ?>
                    <p>Kategori Tidak Ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--Produk Baru-->
    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                <?php 
                    $baju = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                    if(mysqli_num_rows($baju) > 0){
                        while($p = mysqli_fetch_array($baju)){
                ?>
                    <a href="detail-baju.php?id=<?php echo $p['product_id'] ?>">
                        <div class="col-4">
                            <img src="baju/<?php echo $p['product_image'] ?>">
                            <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>   
                            <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                        </div>
                    </a>
                <?php }}else { ?>
                    <p>Baju Tidak Tersedia</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--footer-->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>

            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>

            <h4>Telepon</h4>
            <p><?php echo $a->admin_telpon ?></p>

            <small>Copyright &copy; 2020 - Toko Baju.</small>
        </div>
    </div>
</body>
</html>