<?php 
session_start();
include('php/control/cek-login.php');
$id = $_SESSION['id'];
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
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN CONTENT -->
      <div class="col-md-12 col-sm-12">
        <h2>Keranjang Belanja</h2>
        <?php 
        error_reporting(0);
        if ($_GET['message'] == 'success') { ?>
        <div class="alert alert-success" id="alert">
          <strong>Barang berhasil ditambahkan</strong>
        </div>
        <?php 
      } 
      elseif ($_GET['message'] == 'success-delete') { ?>
      <div class="alert alert-success" id="alert">
        <strong>Barang berhasil dihapus</strong>
      </div>
      <?php 
    }
    elseif ($_GET['message'] == 'error') {  ?>
    <div class="alert alert-error" id="alert">
      <strong>Barang gagal dihapus</strong>
    </div>
    <?php 
  }
  elseif ($_GET['message'] == 'error-checkout') { ?>
  <div class="alert alert-error" id="alert">
    <strong>Barang gagal masuk check-out</strong>
  </div>
  <?php
}
?>  
<div class="goods-page">
  <div class="goods-data clearfix">
    <div class="table-wrapper-responsive">
      <table summary="Shopping cart">
        <tr>
          <th>No</th>
          <th class="goods-page-image">Image</th>
          <th class="goods-page-description">Deskripsi</th>
          <th class="goods-page-quantity">Quantity</th>
          <th class="goods-page-price">Harga</th>          
          <th class="goods-page-price">Action</th>  
        </tr>

        <?php 
        $query = mysql_query("SELECT keranjang.id,barang.id AS id_barang,member.id AS id_user,barang.foto,barang.nama_barang,barang.deskripsi,keranjang.harga,keranjang.qty,keranjang.ukuran,keranjang.tanggal FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id INNER JOIN member ON keranjang.id_user=member.id WHERE member.id=$id");
        $no = 0;
        while ($cek = mysql_fetch_array($query)) {
          $no = $no+1;
          $harga = number_format($cek['harga']); 
          ?>

          <tr>
            <td><?php echo $no; ?></td>
            <td class="goods-page-image">
              <img src="img/produk/<?php echo $cek['foto']; ?>" style="width: 100%; height:100px; border-radius: 5px;">
            </td>
            <td class="goods-page-description">
              <p>
               <?php echo $cek['deskripsi']; ?>
             </p>
           </td>
           <td class="goods-page-quantity">
            <?php echo $cek['qty']; ?>
          </td>
          <td class="goods-page-price">
            <span style="font-size: 20px;">Rp <?php echo $harga; ?>,00</span>
          </td>      
          <td class="del-goods-col">
            <a class="del-goods" title="delete" href="php/control/delete.php?keranjang=<?php echo $cek['id']; ?>">&nbsp;</a>           
          </td>
        </tr>     
        <?php 
      }
      ?>        
    </table>
  </div>
  <div class="shopping-total">
    <ul>
      <li class="shopping-total-price">
        <em>Total</em>
        <?php 

        $query = mysql_query("SELECT SUM(harga) AS total , SUM(qty) AS Quantity ,id_barang FROM keranjang WHERE id_user = $id");
        $cek5 = mysql_fetch_array($query);                                
        $total = number_format($cek5['total']);
        ?>                        
        <strong class="price">Rp <?php echo $total; ?>,00</strong>
      </li>
    </ul>
  </div>
</div>
<a href="product.php?page=all-product" class="btn btn-default">Continue shopping <i class="fa fa-shopping-cart"></i></a>
<form action="php/control/check-out.php" method="POST">                    
  <input type="hidden" value="<?php echo $cek5['id_barang']; ?>" name="id_barang">
  <input type="hidden" value="<?php echo $cek5['Quantity']; ?>" name="qty">
  <input type="hidden" value="<?php echo $cek5['total']; ?>" name="harga">                      
  <button class="btn btn-primary" name="check-out" type="submit">Checkout <i class="fa fa-check"></i></button>
</form>  
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