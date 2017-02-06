<?php 

include 'php/control/koneksi.php';
$page = $_GET['page'];

if ($page == 'member') {
	?>
	<div class="right_col" role="main">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x-content">
					<div class="x_panel tile">					
						<h3 class="panel-title"><b>Member</b></h3>
						<br>						
						<div class="table-responsive">
							<table class="table table-hover" style="text-align:center;">
								<tr>
									<th style="text-align:center;">No</th>								
									<th style="text-align:center;">Nama</th>
									<th style="text-align:center;">Username</th>								
									<th style="text-align:center;">Alamat</th>
									<th style="text-align:center;">Phone</th>
									<th style="text-align:center;">E-mail</th>	
									<th style="text-align:center;">Foto</th>															
								</tr>

								<!-- DATA KOSONG -->
								<?php 
								$per_page = 100;

								$page_query = mysql_query("SELECT COUNT(*) FROM barang");
								$pages = ceil(mysql_result($page_query, 0) / $per_page);

								$hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
								$start = ($hal - 1) * $per_page;

							// $show = mysql_query("SELECT * FROM pemesanan LIMIT $start, $per_page");
								$show = mysql_query("SELECT * FROM member LIMIT $start, $per_page");

								$row = mysql_num_rows($show);
								if ($row == 0) {
									?>						
									<tr>
										<td colspan="7" class="bg-red"><b>DATA KOSONG</b></td>
									</tr>
									<?php } ?>
									<!-- DATA KOSONG -->

									<!-- SHOW DATA -->

									<?php 
									$no=1;
									while ($cek = mysql_fetch_array($show)) { 
										?>
										<tr>
											<td><b><?php echo $no; ?></b></td>
											<td><?php echo $cek['nama']; ?></td>
											<td><?php echo $cek['username']; ?></td>
											<td><?php echo $cek['alamat']; ?></td>
											<td><?php echo $cek['phone']; ?></td>
											<td><?php echo $cek['email']; ?></td>
											<td><img src="../img/member/<?php if($cek['foto'] == ''){echo 'user.jpg';}else{echo $cek['foto'];}?>" width="50" height="50"></td>											
										</tr>
										<?php 
										$no++;
									} 

									?>
									<!-- SHOW DATA -->
								</table>		
							</div>
						</div> 
						<nav aria-label="Page navigation" style="text-align:center;">
							<ul class="pagination">
								<?php
								if($pages >= 1 && $hal <= $pages)
								{
									for($x=1; $x<=$pages; $x++)
									{
                                          //echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
										if($x == $hal){
											echo '  <li class="active"><a href="?page=stok-barang&&hal='.$x.'">'.$x.'</a></li> ';
										}
										else{
											echo ' <li><a href="?page=stok-barang&&hal='.$x.'">'.$x.'</a></li>';
										}
									}
								}
								?>
							</ul>
						</nav> 
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>