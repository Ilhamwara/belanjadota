        		<?php 
        		include 'php/control/koneksi.php';
        		$page = $_GET['page'];

        		if ($page == 'admin-control') {
        			?>
        			<div class="right_col" role="main">
        				<div class="row">
        					<div class="col-md-12 col-sm-12 col-xs-12">
        						<div class="x_panel tile">
        							<h3 class="x-title"><b>Admin Control</b></h3>
        							<hr>
        							<div class="x_content">
        								<a href="main.php?page=tambah-admin" class="btn btn-primary" data-toggle="tooltip" title="Add New User"><i class="fa fa-user-plus"></i></a>
        								<br><br>
        								<table class="table table-bordered" style="text-align:center;">
        									<tr>
        										<th style="text-align:center;">Username</th>
        										<th style="text-align:center;">Password</th>
        										<th style="text-align:center;">Action</th>
        									</tr>

        									<!-- DATA KOSONG -->
        									<?php 
        									$show = mysql_query("SELECT * FROM admin");
        									$row = mysql_num_rows($show);
        									if ($row == 0) {
        										?>						
        										<tr>
        											<td colspan="3" class="bg-red"><b>DATA KOSONG</b></td>
        										</tr>
        										<?php } ?>
        										<!-- DATA KOSONG -->

        										<!-- SHOW DATA -->

        										<?php while ($cek = mysql_fetch_array($show)) {  
        											?>
        											<tr>
        												<td><?php echo $cek['username']; ?></td>
        												<td><i class="fa fa-lock fa-2x text-green"></i></td>
        												<td>
        													<a href="main.php?page=update-admin&&key=<?php echo $cek['id']; ?>" class="btn btn-warning" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o"></i></a> 
        													<a onclick="return confirm('Apa Anda yakin ingin menghapus admin ini ?');" href="php/control/delete.php?page=delete-admin&&key=<?php echo $cek['id']; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
        												</td>
        											</tr>
        											<?php } ?>
        											<!-- SHOW DATA -->
        										</table>	
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>

        					<?php
        				}
        				elseif (($page == 'tambah-admin') || ($page == 'update-admin')) { ?>


        				<div class="right_col" role="main">
        					<div class="row">
        						<div class="col-md-12 col-sm-12 col-xs-12">
        							<div class="x_panel tile">
        								<?php 
        								if ($page == 'tambah-admin') 
        									{ ?>
        								<h3 class="x-title"><b>Add Admin</b></h3>
        								<?php
        							}
        							elseif ($page = 'update-admin') 
        								{ ?>

        							<h3 class="x-title"><b>Update Admin</b></h3>
        							<?php
        						}
        						?>
        						<hr>
        						<?php 
        						if ($page == 'update-admin') {

        							if(isset($_GET['key'])){

        								$id_admin=$_GET['key'];
        								$query = mysql_query("SELECT username,password FROM admin WHERE id=$id_admin");
        								$cek = mysql_fetch_array($query);
        								if ($cek) {
        									$username = $cek['username'];
        								}
        							}
        						}
        						else{
        							$username = 'Username';
        						}
        						?>
        						<form class="form-horizontal" action="php/control/control_admin.php?&&key=<?php echo $id_admin; ?>" method="POST">
        							<div class="form-group">
        								<label class="col-sm-1 control-label">Username</label>
        								<div class="col-sm-4">
        									<input type="text" class="form-control radius" placeholder="<?php echo $username; ?>" name="username" required>
        								</div>
        							</div>
        							<div class="form-group">
        								<label class="col-sm-1 control-label">Password</label>
        								<div class="col-sm-4">
        									<input type="password" id="password" class="form-control radius" placeholder="Password" name="password" required> 
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-sm-offset-1 col-sm-10">
        									<div class="checkbox">
        										<label>
        											<input type="checkbox" id="checkbox"> Show Password
        										</label>
        									</div>
        								</div>
        							</div> 
        							<div class="form-group">
        								<div class="col-sm-offset-1 col-sm-10">
        									<a class="btn btn-success" href="main.php?page=admin-control"><i class="fa fa-arrow-left" style="margin-right:10px;"></i>Back</a>
        									<?php 
        									if ($page == 'tambah-admin') 
        										{ ?>
        									<button type="submit" class="btn btn-primary" name="add">Create</button>
        									<?php
        								}
        								elseif ($page = 'update-admin') 
        									{ ?>

        								<button type="submit" class="btn btn-primary" name="updet">Update</button>
        								<?php
        							}
        							?>
        						</div>
        					</div>
        				</form>
        				<?php 
        				?>
        			</div>
        		</div>
        	</div>
        </div>

        <script type="text/javascript">
        	$(document).ready(function(){   
        		$('#checkbox').click(function(){
        			if($(this).is(':checked')){
        				$('#password').attr('type','text');
        			}else{
        				$('#password').attr('type','password');
        			}
        		});
        	});
        </script>

        <?php
    }
    ?>


