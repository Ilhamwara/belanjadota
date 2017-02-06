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
      <li class="active">Register</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN CONTENT -->
      <div class="col-md-12 col-sm-7">            
        <div class="content-form-page">
          <h1 class="text-center" style="padding: 20px;">Form Register</h1>
          <form role="form" action="php/control/register.php" method="POST" class="form-horizontal form-without-legend">
            <div class="form-group">
            <label class="col-lg-2 control-label" for="first-name">Nama <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="nama" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Username <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="username" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Alamat <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="alamat" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Phone <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="phone" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">E-mail <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" id="email" name="email" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Password <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="password" name="password" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
                <button class="btn btn-primary" name="reg" type="submit">Register</button>
              </div>
            </div>
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