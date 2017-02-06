<?php 
session_start(); 
include 'admin/php/control/koneksi.php';
$id = $_GET['produk_key'];
$query = mysql_query("SELECT * FROM barang WHERE id='$id'");
$cek = mysql_fetch_array($query);
$harga = number_format($cek['harga']);
$nama = $cek['nama_barang'];
$harga2 = $cek['harga'];
$foto = $cek['foto'];
$total = $cek['total'];
$deskripsi = $cek['deskripsi'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'php/head.php'; ?>
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
  <?php include 'php/topbar.php'; ?>

  <div class="main">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php?page=all-product">All Produk</a></li>
        <li class="active"><?php echo $nama; ?></li>
        <?php if ($_GET['message'] == 'stok-habis') { ?>
        <div class="alert alert-danger" id="alert">
          <strong>Maaf jumlah barang yang anda beli melebih stock kami</strong>
        </div>
        <?php } ?>
      </ul>
      <!-- BEGIN SIDEBAR & CONTENT -->
      <div class="row margin-bottom-40">
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-7">
          <div class="product-page">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="product-main-image">
                  <img src="img/produk/<?php echo $foto; ?>" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="img/produk/<?php echo $foto; ?>">
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <h1>Cool green dress with red bell</h1>
                <div class="price-availability-block clearfix">
                  <div class="price">
                    <strong>Rp <?php echo $harga; ?>,00</strong>                      
                  </div>                    
                </div>
                <div class="description">
                  <p>
                    <?php echo $deskripsi; ?>
                  </p>
                </div>
                <form action="php/control/pemesanan.php?produk_key=<?php echo $_GET['produk_key']; ?>" method="POST">
                  <div class="col-md-6">
                    <input type="number" name="qty" class="form-control input-sm" required>
                    <input type="hidden" name="harga" class="form-control input-sm" value="<?php echo $harga2; ?>">
                  </div>

                  <?php                                           
                  if ($total <= 0 ) { ?>
                  <br><br><br>
                  <div class="alert alert-danger" id="alert" style="overflow: hidden;">
                    <strong>Maaf Stock Barang Ini Sudah Habis</strong>
                  </div>
                  <?php
                }
                else{ ?>                
                <button class="btn btn-primary" type="submit" name="pesan">Masukan Keranjang</button>
                <?php } ?>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
  </div>
</div>
<?php include 'php/footer.php'; ?>
</body>
<!-- END BODY -->
</html>