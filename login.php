<?php session_start(); ?>
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
        <li class="active">Login</li>
      </ul>
      <!-- BEGIN SIDEBAR & CONTENT -->
      <div class="row margin-bottom-40">
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-12">
          <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
            <!-- BEGIN CHECKOUT -->
            <div class="panel panel-default">
              <div id="checkout-content" class="panel-collapse collapse in">
                <div class="panel-body row">
                  <div class="col-md-6 col-sm-6">
                    <h3>Login</h3>  

                    <?php 
                    error_reporting(0);
                    if ($_GET['message'] == 'success') { ?>
                    <div class="alert alert-success">
                      <strong>Akun anda berhasil di buat! Silahkan login</strong>
                    </div>
                    <?php 
                  }
                  elseif ($_GET['message'] == 'error') { ?>
                  <div class="alert alert-danger">
                    <strong>Kesalahan pada username atau password anda! Silahkan coba lagi</strong>
                  </div>
                  <?php
                }
                elseif ($_GET['message'] == 'akun') { ?>
                <div class="alert alert-warning">
                  <strong>Anda harus login terlebih dahulu unutuk melakukan pemesanan</strong>
                </div>
                <?php
              }
              ?>    

              <form role="form" action="php/control/login.php" method="POST">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" required>
                </div>
                <a href="javascript:;">Bikin akun baru ?</a>
                <div class="padding-top-20">                  
                  <button class="btn btn-primary" name="login" type="submit">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- END CHECKOUT -->
    </div>
    <!-- END CHECKOUT PAGE -->
  </div>
  <!-- END CONTENT -->
</div>
<!-- END SIDEBAR & CONTENT -->
</div>
</div>

<?php include 'php/footer.php';  ?>
</body>
<!-- END BODY -->
</html>