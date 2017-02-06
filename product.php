<?php 
session_start(); 
include 'admin/php/control/koneksi.php';
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

  <div class="title-wrapper">
    <div class="container"><div class="container-inner">
      <h1><span>MEN</span> CATEGORY</h1>
      <em>Over 4000 Items are available here</em>
    </div></div>
  </div>

  <div class="main">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">All Product</li>
      </ul>
      <!-- BEGIN SIDEBAR & CONTENT -->
      <div class="row margin-bottom-40">
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar col-md-3 col-sm-5">
          <?php include'php/sidebar-left.php'; ?>          
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="col-md-9 col-sm-7">
          <!-- BEGIN PRODUCT LIST -->
          <div class="row product-list">
            <?php 
            $page = $_GET['page'];



              /////////// ALL ////////////////
            if ($page == 'all-product') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>

              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=all-product&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=all-product&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->

              <?php
            }


            /////////// BAAJJUUUU ////////////////
            elseif ($page == 'baju') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Baju'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Baju' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>

              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=baju&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=baju&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }

            /////////// SEPATUUUUU ////////////////
            elseif ($page == 'sepatu') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Sepatu'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Sepatu' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>
              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=sepatu&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=sepatu&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }


   /////////// TOPI ////////////////
            elseif ($page == 'topi') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Topi'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Topi' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>
              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=topi&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=topi&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }

/////////// TAAASSSS ////////////////
            elseif ($page == 'tas') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Tas'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Tas' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>
              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=tas&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=tas&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }



 /////////// GANTUNGAN ////////////////
            elseif ($page == 'gantungan') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Gantungan'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Gantungan' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>
              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=gantungan&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=gantungan&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }


/////////// ACTION FIGURE ////////////////
            elseif ($page == 'figure') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Figure'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Figure' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>
              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=figure&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=figure&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }


/////////// ACTION MOUSE ////////////////
            elseif ($page == 'mouse') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Mouse'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Mouse' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>
              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=mouse&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=mouse&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }



/////////// ACTION KEYBOARD ////////////////
            elseif ($page == 'keyboard') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Keyboard'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Keyboard' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>
              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=keyboard&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=keyboard&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }


/////////// ACTION STIK ////////////////
            elseif ($page == 'stick') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Stick'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Stick' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>
              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=stick&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=stick&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }


/////////// ACTION HEADSET ////////////////
            elseif ($page == 'headset') { 
              $per_page = 9;
              $page_query = mysql_query("SELECT COUNT(*) FROM barang WHERE kategori = 'Headset'");
              $pages = ceil(mysql_result($page_query, 0) / $per_page);

              $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $start = ($hal - 1) * $per_page;


              $query = mysql_query("SELECT * FROM barang WHERE kategori = 'Headset' LIMIT $start, $per_page");    
              while ($cek = mysql_fetch_array($query)) {
                $harga = number_format($cek['harga']);
                ?>

                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-4">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="img/produk/<?php echo $cek['foto']; ?>" style="height: 180px;" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                      </div>
                    </div>
                    <h3><a href="detail.php?produk_key=<?php echo $cek['id']; ?>"><?php echo $cek['nama_barang']; ?></a></h3>
                    <div class="pi-price">Rp. <?php echo $harga; ?></div>
                    <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                  </div>
                </div>
                <!-- PRODUCT ITEM END -->
                <?php
              } ?>
              <!-- BEGIN PAGINATOR -->
              <div class="row">
                <div class="col-md-8 col-sm-3 col-xs-12">
                  <ul class="pagination pull-right">
                    <?php
                    if($pages >= 1 && $hal <= $pages)
                    {
                      for($x=1; $x<=$pages; $x++)
                      {
                        if($x == $hal){
                          echo '  <li class="active"><a href="?page=headset&&hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                        }
                        else{
                          echo ' <li><a href="?page=headset&&hal='.$x.'">'.$x.'</a></li>';
                        }
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- END PAGINATOR -->
              <?php
            }
            ?>


          </div>
          <!-- END PRODUCT LIST -->
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