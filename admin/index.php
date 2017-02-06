<?php
include("php/part/head-part.php"); 

include 'php/control/koneksi.php';

session_start();
error_reporting(0);
?>
<body background="header.jpeg" class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">

        <?php 
        if(isset($_POST['submit'])){
          $username = $_POST['username'];
          $password = $_POST['password'];

          $query = mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
          $cek = mysql_fetch_array($query);

                  if ($cek) {
          $id_admin = $_SESSION['id'];
          header("location:main.php?page=dashboard");
        }
        }
        elseif(isset($_POST['username']) || isset($_POST['password'])){
          ?>
          <div class="alert alert-danger text-center" style="color: white;">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            Enter a valid email address
          </div>
          <a href="index.php" type="submit" class="btn btn-primary btn-block">Back to Login </a>
          <?php
        }
        else{
          ?>
          <section class="login_content">
            <form action="index.php" method="POST">
              <h1>Login <b>Admin</b>Panel</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required />
              </div>
              <div>
                <button class="btn btn-primary" name="submit">Log in</button>
              </div>
            </form>
          </section>
          <?php } ?>
        </div>
      </div>
    </div>
  </body>
  </html>
