  <?php   
  include("php/part/head-part.php");
  session_start();
  ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include("php/part/sidebar-part.php"); ?>
        <?php include 'php/part/top-bar.php'; ?>
        <?php 
        $page = $_GET['page'];
        if ($page == 'dashboard') {
          include 'php/body/dashboard.php';
        }
        elseif (($page == 'admin-control') || ($page == 'tambah-admin') || ($page == 'update-admin')) {
          include 'php/body/admin.php';
        }
        elseif (($page == 'pemesanan') || ($page == 'form-pemesanan')) {
          include 'php/body/pemesanan.php';
        }   
        elseif ($page == 'transaksi') {
          include 'php/body/transaksi.php';
        } 
        elseif ($page == 'laporan') {
          include 'php/body/laporan.php';
        } 
        elseif ($page == 'chat') {
          include 'php/body/chat.php';
        }   
        elseif ($page == 'member') {
          include 'php/body/member.php';
        }   
        elseif (($page == 'stok-barang') || ($page == 'update-barang') || ($page == 'tambah-barang')) {
          include 'php/body/stok.php';
        }   
        elseif ($page == 'olap') {
          include 'php/body/oltp.php';
        }      
        ?>
      </div>
    </div><!-- /.content-wrapper -->
  </div>
  <?php include("php/part/footer-part.php"); ?>
