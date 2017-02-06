<?php 
session_start();
include 'admin/php/control/koneksi.php';
include('php/control/cek-login.php');
$id = $_SESSION['id'];
$query = mysql_query("SELECT * FROM member WHERE id = $id");
$user = mysql_fetch_array($query);
$page = $_GET['page'];
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
        <li><a href="product.php?page=all-product">Produk</a></li>
        <li class="active">Akun Saya</li>
      </ul>
      <!-- BEGIN SIDEBAR & CONTENT -->
      <div class="row margin-bottom-40">
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar col-md-3 col-sm-3">
          <ul class="list-group margin-bottom-25 sidebar-menu">
            <!-- <li class="list-group-item clearfix <?php if ($page == 'profile') {echo 'active';} else{ echo '';} ?>"><a href="profile.php?page=profile"><i class="fa fa-angle-right"></i> Profile</a></li> -->
            <li class="list-group-item clearfix <?php if ($page == 'history-order') {echo 'active';} else{ echo '';} ?>"><a href="profile.php?page=history-order"><i class="fa fa-angle-right"></i> History Order</a></li>            
            <li class="list-group-item clearfix <?php if ($page == 'setting-profile') {echo 'active';} else{ echo '';} ?>"><a href="profile.php?page=setting-profile"><i class="fa fa-angle-right"></i> Setting Profile</a></li>
            <li class="list-group-item clearfix "><a href="php/control/logout.php"><i class="fa fa-angle-right"></i> Logout</a></li>
          </ul>
        </div>
        <!-- END SIDEBAR -->

        <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-12"> 
         <?php 
         error_reporting(0);
         if ($_GET['message'] == 'success') { ?>
         <div class="alert alert-success" id="alert">
          <strong>Selamat datang <?php echo $user['nama']; ?> </strong>
        </div>
        <?php 
      }                   
      elseif ($_GET['message'] == 'success-cart') { ?>
      <div class="alert alert-success" id="alert">
        <strong>Berhasil melakukan checkout</strong>
      </div>
      <?php
    }
    elseif ($_GET['bukti'] == 'success-checkout') { ?>
    <div class="alert alert-success" id="alert">
      <strong>Berhasil Upload Bukti Pembayaran</strong>
    </div>
    <?php
  }
  if ($page == 'profile') { ?>    
  <div class="content-page">
    <h3>My Orders</h3>
    <ul>
      <li><a href="javascript:;">View your order history</a></li>
      <li><a href="javascript:;">Downloads</a></li>
      <li><a href="javascript:;">Your Reward Points</a></li>
      <li><a href="javascript:;">View your return requests</a></li>
      <li><a href="javascript:;">Your Transactions</a></li>
    </ul>
  </div>
</div>
<!-- END CONTENT -->

<?php }
elseif($page == 'history-order'){ ?>

<div class="content-page">
  <table class="table table-hover text-center">
    <tr>
      <td class="text-center"><b>No</b></td>
      <td class="text-center"><b>Gambar</b></td>
      <td class="text-center"><b>Nama Barang</b></td>
      <td class="text-center"><b>Quantity</b></td>
      <td class="text-center"><b>Harga</b></td>
      <td class="text-center"><b>Status</b></td>
      <td class="text-center"><b>Tanggal</b></td>
      <td class="text-center"><b>Action</b></td>
    </tr>
    <?php 
    $query = mysql_query("SELECT pemesanan.id,barang.foto,barang.nama_barang,pemesanan.status,pemesanan.tanggal,pemesanan.bukti,pemesanan.harga AS total,pemesanan.qty AS quantity FROM pemesanan INNER JOIN barang ON pemesanan.id_barang=barang.id WHERE pemesanan.id_member='$id' ORDER BY pemesanan.status ASC");
    $cek = mysql_num_rows($query);
    if ($cek > 0) { 
      $no = 0;
      while ($array = mysql_fetch_array($query)) {
        $no = $no+1;
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><img src="img/produk/<?php echo $array['foto']; ?>" class="img-responsive" style="height:100px; border-radius: 5px;"></td>
          <td><?php echo $array['nama_barang']; ?></td>
          <td><?php echo $array['quantity']; ?></td>
          <td><?php echo $array['total']; ?></td>
          <td><?php if($array['status'] == '0'){ ?>
            <span class="btn btn-warning"><b>Pending</b></span>
            <?php
          } else{ ?>
          <span class="btn" style="background: #1ABC9C; color: white;"><b>Confirm</b></span>
          <?php
        } ?></td>
        <td><?php echo $array['tanggal']; ?></td>
        <td>
          <?php if (empty($array['bukti'])) { ?>
          <a href="profile.php?page=upload-pembayaran&&kode=<?php echo $array['id']; ?>" class="btn btn-danger" style="color: white;" >Check-Out</a>
          <?php
        } 
        elseif(!empty($array['bukti'])){ ?>
        <span class="btn" style="background: #3498DB; color: white;" ><i class="fa fa-check"></i> Done</span>
        <?php
      }
      ?>        
    </td>
  </tr>
  <?php
}
}
else{ ?>
<tr>
  <td colspan="8" style="background: #E74C3C; color: white;">DATA KOSONG</td>
</tr>
<?php
}
?>

</table>
</div>
</div>
<!-- END CONTENT -->
<?php } 
elseif($page == 'setting-profile'){
  ?>

  <!-- BEGIN CONTENT -->    
  <h1>Edit Profile</h1>
  <div class="content-page">

    <?php 
    error_reporting(0);
    if ($_GET['pesan'] == 'success') { ?>
    <div class="alert alert-success" id="alert">
      <strong>Profile anda berhasil di update</strong>
    </div>
    <?php 
  }
  elseif ($_GET['pesan'] == 'error') { ?>
  <div class="alert alert-danger" id="alert">
    <strong>Gagal untuk mengupdate profile anda</strong>
  </div>
  <?php
}
?>

<form action="php/control/update.php?id=<?php echo $user['id']; ?>" class="form-horizontal form-without-legend" method="POST" enctype="multipart/form-data">    
  <div class="form-group">
    <label class="col-lg-2 control-label" for="first-name">Nama Lengkap</label>
    <div class="col-lg-8">
      <input type="text" name="nama" class="form-control" value="<?php echo $user['nama']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label" for="last-name">Username</label>
    <div class="col-lg-8">
      <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label" for="email">Alamat</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" name="alamat" value="<?php echo $user['alamat']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label" for="email">E-Mail</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label" for="telephone">Telephone</label>
    <div class="col-lg-8">
      <input type="text" name="phone" class="form-control" value="<?php echo $user['email']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label" for="fax">Password</label>
    <div class="col-lg-8">
      <input type="password" name="password" class="form-control" value="<?php echo $user['password']; ?>">
    </div>
  </div>                 
  <div class="row">
    <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
      <button class="btn btn-primary" type="submit" name="update">Continue</button>
    </div>
  </div>
</form>
</div>
<!-- END CONTENT -->

<?php } 

elseif ($page == 'upload-pembayaran') { ?>
<?php $id = $_GET['kode'];  ?>

<h4><b>Upload Bukti Pemabayaran</b></h4>

<div class="content-page" style="margin-bottom: 45px;">
  <form action="php/control/upload.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="file" name="bukti" required>
    <br>
    <a href="profile.php?page=history-transaksi" class="btn btn-default">Back</a>
    <input type="submit" class="btn btn-success" name="upload" value="Upload">
  </form>
</div>
</div>
</div>
</div>
<?php
} 
?>

</div>
<!-- END SIDEBAR & CONTENT -->
</div>
</div>
<?php include 'php/footer.php'; ?>
</body>
<!-- END BODY -->
</html>