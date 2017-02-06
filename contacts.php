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
      <li class="active">Contact</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN CONTENT -->
      <div class="col-md-12 col-sm-12">
        <h1>Contact</h1>
        <div class="content-page">          
        <iframe style="height:400px;width:100%;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=UNAS,+Pasar+Minggu,+South+Jakarta+City,+Special+Capital+Region+of+Jakarta,+Indonesia&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
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