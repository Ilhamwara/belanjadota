<?php 
session_start(); 
include 'admin/php/control/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'php/head.php'; ?>
</head>
<style type="text/css">
  .active-page{
    background: #313030;
    color: #fff;
  }
</style>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
  <?php include 'php/topbar.php'; ?>

  <!-- BEGIN SLIDER -->
  <div class="page-slider margin-bottom-35">
    <div id="carousel-example-generic" class="carousel slide carousel-slider">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <!-- First slide -->
        <div class="item carousel-item-four active">
          <div class="container">
            <div class="carousel-position-four text-center">
              <h2 class="margin-bottom-20 animate-delay carousel-title-v3 border-bottom-title text-uppercase" data-animation="animated fadeInDown">
                Selamat Datang<br/>BELANJA DOTA<br/>
              </h2>
              <p class="carousel-subtitle-v2" data-animation="animated fadeInUp">
                Memberikan Produk Unggulan <br/>
                Harga Murah dan Terjangkau.</p>
              </div>
            </div>
          </div>

          <!-- Second slide -->
          <div class="item carousel-item-five">
            <div class="container">  

            </div>
          </div>

          <!-- Third slide -->
          <div class="item carousel-item-six">
            <div class="container">
              <div class="carousel-position-four text-center">
                <span class="carousel-subtitle-v3 margin-bottom-15" data-animation="animated fadeInDown">
                  Fast Respond
                </span>
                <p class="carousel-subtitle-v4" data-animation="animated fadeInDown">
                  Kami Selalu Siap Melayani Anda
                </p>                
              </div>
            </div>
          </div>

          <!-- Fourth slide -->
          <div class="item carousel-item-seven">
           <div class="center-block">
            <div class="center-block-wrap">
              <div class="center-block-body">
                <h2 class="carousel-title-v1 margin-bottom-20" data-animation="animated fadeInDown">
                  Best Seller <br/>
                  Action Figure DOTA II
                </h2>                
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
      </a>
      <a class="right carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </a>
    </div>
  </div>
  <!-- END SLIDER -->

  <div class="main">
    <div class="container">
      <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
      <div class="row margin-bottom-40">
        <!-- BEGIN SALE PRODUCT -->
        <div class="col-md-12 sale-product">
          <h2>New Product</h2>
          <div class="owl-carousel owl-carousel5">
            <?php 
            $query = mysql_query("SELECT * FROM barang ORDER BY tanggal DESC LIMIT 8");    
            while ($cek = mysql_fetch_array($query)) {
              $harga = number_format($cek['harga']);
              ?>
              <div>
               <div class="product-item">
                <div class="pi-img-wrapper">
                  <img src="img/produk/<?php echo $cek['foto']; ?>" class="img-responsive" style="height:135px;">
                  <div>
                    <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                  </div>
                </div>
                <h3><a href="shop-item.html"><?php echo $cek['nama_barang']; ?></a></h3>
                <div class="pi-price">Rp. <?php echo $harga; ?></div>
                <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
                <div class="sticker sticker-new"></div>
              </div>
            </div>
            <?php 
          }
          ?>
        </div>
      </div>
      <!-- END SALE PRODUCT -->
    </div>
    <!-- END SALE PRODUCT & NEW ARRIVALS -->

    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40 ">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar col-md-3 col-sm-4">
        <?php include 'php/sidebar-left.php'; ?>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN CONTENT -->
      <div class="col-md-9 col-sm-8">
        <h2>All Product</h2>

        <div class="row product-list">
          <?php 
          $per_page = 9;
          $page_query = mysql_query("SELECT COUNT(*) FROM barang");
          $pages = ceil(mysql_result($page_query, 0) / $per_page);

          $hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
          $start = ($hal - 1) * $per_page;


          $query = mysql_query("SELECT * FROM barang LIMIT $start, $per_page");    
          while ($cek = mysql_fetch_array($query)) {
            $harga = number_format($cek['harga']);
            ?>
            <div class="col-md-4 col-sm-6 col-xs-4">
             <div class="product-item">
              <div class="pi-img-wrapper">
                <img src="img/produk/<?php echo $cek['foto']; ?>" class="img-responsive" style="height:180px;">
                <div>
                  <a href="img/produk/<?php echo $cek['foto']; ?>" class="btn btn-default fancybox-button">Zoom</a>                    
                </div>
              </div>
              <h3><a href="shop-item.html"><?php echo $cek['nama_barang']; ?></a></h3>
              <div class="pi-price">Rp. <?php echo $harga; ?></div>
              <a href="detail.php?produk_key=<?php echo $cek['id']; ?>" class="btn btn-default add2cart">View Details</a>
            </div>
          </div>
          <?php 
        }
        ?>

        <div class="row pull-right" style="clear: both;">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <ul class="pagination">
              <?php
              if($pages >= 1 && $hal <= $pages)
              {
                for($x=1; $x<=$pages; $x++)
                {
                  if($x == $hal){
                    echo '  <li class="active"><a href="?hal='.$x.'" style="color:white !important; cursor:pointer;">'.$x.'</a></li> ';
                  }
                  else{
                    echo ' <li><a href="?hal='.$x.'">'.$x.'</a></li>';
                  }
                }
              }
              ?>
            </ul>
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
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/581c4e0918d9f16af026984d/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>
<!--End of Tawk.to Script-->
</body>
<!-- END BODY -->
</html>