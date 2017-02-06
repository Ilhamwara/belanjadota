<?php 
include 'php/control/koneksi.php';
?>
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel tile">
				<h3 class="panel-title"><b>Data Pemesanan</b></h3>
				<br>
				<div class="table-responsive">
					<table class="table table-hover" style="text-align:center;">
						<tr>
							<th style="text-align:center;">No</th>								
							<th style="text-align:center;">Nama</th>
							<th style="text-align:center;">Nama Barang</th>
							<th style="text-align:center;">Harga</th>
							<th style="text-align:center;">Quantity</th>													
							<th style="text-align:center;">Status</th>															
							<th style="text-align:center;">Tanggal</th>
							<th style="text-align:center; width: 10%;">Action</th>
						</tr>

						<!-- DATA KOSONG -->
						<?php 
						$per_page = 100;

						$page_query = mysql_query("SELECT COUNT(*) FROM pemesanan");
						$pages = ceil(mysql_result($page_query, 0) / $per_page);

						$hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
						$start = ($hal - 1) * $per_page;

							// $show = mysql_query("SELECT * FROM pemesanan LIMIT $start, $per_page");
						$show = mysql_query("SELECT pemesanan.id, member.nama,barang.nama_barang,pemesanan.harga,pemesanan.qty,pemesanan.status, pemesanan.tanggal FROM pemesanan INNER JOIN member ON pemesanan.id_member=member.id INNER JOIN barang ON pemesanan.id_barang=barang.id WHERE pemesanan.status='1' LIMIT $start, $per_page");

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
									<td><?php echo $cek['nama']; ?></td>
									<td><?php echo $cek['nama_barang']; ?></td>
									<td><?php echo $cek['harga']; ?></td>
									<td><?php echo $cek['qty']; ?></td>
									<td><?php if($cek['status'] == '0'){ ?>
										<span class="btn btn-warning"><b>Pending</b></span>
										<?php
									} else{ ?>
									<span class="btn btn-success"><b>Confirm</b></span>
									<?php
								} ?></td>
								<td><?php echo $cek['tanggal']; ?></td>
								<td>
									<a href="main.php?page=form-pemesanan&&key=<?php echo $cek['id']; ?>" class="btn btn-default" data-toggle="tooltip" title="View Checkout"><i class="fa fa-eye"></i></a>
									<!-- <a onclick="return confirm('Apa Anda yakin ingin menghapus pemesanan ini ?');" href="php/control/delete.php?page=delete-pemesanan&&key=<?php echo $cek['id']; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a> -->
								</td>
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
								echo '  <li class="active"><a href="?page=transaksi&&hal='.$x.'">'.$x.'</a></li> ';
							}
							else{
								echo ' <li><a href="?page=transaksi&&hal='.$x.'">'.$x.'</a></li>';
							}
						}
					}
					?>
				</ul>
			</nav> 
		</div>
	</div>
</div>