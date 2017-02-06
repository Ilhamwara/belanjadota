<?php 

include 'php/control/koneksi.php';
$page = $_GET['page'];








//-------------------------------------SHOW DATA FASILITAS ROOM---------------------------------//
if ($page == 'fasilitas') {
	?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3 class="panel-title"><b>Fasilitas Kamar</b></h3>
					<br>
					<table class="table table-hover" style="text-align:center;">
						<tr>
							<th style="text-align:center;">No</th>
							<th style="text-align:center;">Nama Room</th>
							<th style="text-align:center;">AC</th>
							<th style="text-align:center;">TV</th>
							<th style="text-align:center;">Kulkas</th>
							<th style="text-align:center;">Kamar Tidur</th>
							<th style="text-align:center;">Kamar Mandi</th>
						</tr>

						<!-- DATA KOSONG -->
						<?php 
						$per_page = 100;

						$page_query = mysql_query("SELECT COUNT(*) FROM room");
						$pages = ceil(mysql_result($page_query, 0) / $per_page);

						$hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
						$start = ($hal - 1) * $per_page;

						$show = mysql_query("SELECT * FROM room LIMIT $start, $per_page");
						$row = mysql_num_rows($show);
						if ($row == 0) {
							?>						
							<tr>
								<td colspan="8" class="bg-red"><b>DATA KOSONG</b></td>
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
									<td><b><?php echo $cek['nama_room']; ?></b></td>
									<td><?php echo $cek['ac']; ?></td>
									<td><?php echo $cek['tv']; ?></td>
									<td><?php echo $cek['kulkas']; ?></td>
									<td><?php echo $cek['kmr_tidur']; ?></td>
									<td><?php echo $cek['kmr_mandi']; ?></td>
								</tr>
								<?php 
								$no++;
							} 

							?>
							<!-- SHOW DATA -->
						</table>		
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
										echo '  <li class="active"><a href="?page=fasilitas&&hal='.$x.'">'.$x.'</a></li> ';
									}
									else{
										echo ' <li><a href="?page=fasilitas&&hal='.$x.'">'.$x.'</a></li>';
									}
								}
							}
							?>
						</ul>
					</nav> 
				</div>
			</div>
		</div>

		<?php
	}
