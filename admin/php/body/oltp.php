 <?php 
 include 'php/control/koneksi.php';
 // $query = mysql_query("SELECT * FROM pemesanan");
 $tanggal=array();
 $jumlah=array();
 $kategori=array();
 $query = mysql_query("SELECT day(pemesanan.tanggal) AS tanggal,SUM(pemesanan.harga) AS total , barang.kategori AS kategori FROM pemesanan INNER JOIN barang ON pemesanan.id_barang = barang.id WHERE status = '1'  GROUP BY pemesanan.tanggal");
 while ($cek = mysql_fetch_array($query)) {
 	$tanggal[] = date($cek['tanggal']);
 	$jumlah[] = $cek['total'];
 	$kategori[] = $cek['kategori'];
 	$datetime = $tanggal; 
 }
 $tgl = join(",",$tanggal);
 $jml = join(",",$jumlah);
 $kat = join(",",$kategori);
 $date = $tgl;
 $jumlahx = $jml;
 $category = $kat;

 ?>
 <div class="right_col" role="main">
 	<div class="row">
 		<div class="col-md-12 col-sm-12 col-xs-12">
 			<div class="x_panel tile">

 				<div class="col-lg-12" style="margin-bottom: 30px;">
 					<form action="#" method="POST" class="form-inline">
 						<div >
 							<h4>Sort by Date :</h4>
 							<input type="date" class="form-control" name='awal'> 
 							s/d
 							<input type="date" class="form-control" name='akhir'> 
 							<input type='submit' class="btn btn-primary" name='src' value='SEARCH'>
 						</div>							
 					</form> 
 				</div>
 				<?php
 				if(isset($_POST['src'])){
 					if($_POST['awal'] != '' && $_POST['akhir'] != '' ){

 						if($_POST['awal'] < $_POST['akhir']){

 							$query = mysql_query("SELECT * FROM pemesanan WHERE tanggal BETWEEN '".$_POST['awal']."' AND '".$_POST['akhir']."' ORDER BY tanggal DESC");

 							$tanggal=array();
 							$jumlah=array();
 							$kategori=array();

 							$query2 = mysql_query("SELECT day(pemesanan.tanggal) AS tanggal,SUM(pemesanan.harga) AS total FROM pemesanan WHERE status = '1' AND tanggal BETWEEN '".$_POST['awal']."' AND '".$_POST['akhir']."' GROUP BY pemesanan.tanggal");
 							while ($cek2 = mysql_fetch_array($query2)) {
 								$tanggal[] = $cek2['tanggal'];
 								$jumlah[] = $cek2['total'];
 								$kategori[] = $cek['kategori'];
 								$datetime = $tanggal; 

 							}

 							$tgl = join(",",$tanggal);
 							$jml = join(",",$jumlah);
 							$kat = join(",",$kategori);
 							$date = $tgl;
 							$jumlahx = $jml;
 							$category = $kat;
 							if ($query) {
 								?>
 								<div class="col-lg-12 text-center" style="margin-bottom: 50px;">
 									<br><h4>Ini adalah grafik transaksi penjualan <br>dari tanggal <b><?php echo $_POST['awal'];  ?></b> sampai tanggal <b><?php echo $_POST['akhir'];  ?></b> </h4> 
 								</div> 						
 								<?php
 							}
 						}
 					}
 				}

 				?> 				
 				<div id="myChart" style="height:550px; width: 100%; overflow: hidden;"></div>
 				
 				<!-- <div id="myChart" style="margin: 50px auto;"></div> --> 			
 			</div>
 		</div>
 	</div>
 </div>
 <!-- ECharts -->
 <script src="../vendors/echarts/dist/echarts.min.js"></script>
 <script src="../vendors/echarts/map/js/world.js"></script>
 <script>
 	var theme = {
 		color: [
 		'#E74C3C', '#F4D03F', '#BDC3C7', '#3498DB' , '#3498DB'		
 		],

 		title: {
 			itemGap: 8,
 			textStyle: {
 				fontWeight: 'normal',
 				color: '#5DADE2'
 			}
 		},
 		grid: {
 			borderWidth: 0
 		},

 		categoryAxis: {
 			axisLine: {
 				lineStyle: {
 					color: '#408829'
 				}
 			}
 		},

 		valueAxis: {
 			axisLine: {
 				lineStyle: {
 					color: '#408829'
 				}
 			},
 			splitArea: {
 				show: true,
 				areaStyle: {
 					color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
 				}
 			},
 			splitLine: {
 				lineStyle: {
 					color: ['#eee']
 				}
 			}
 		},
 		textStyle: {
 			fontFamily: 'Arial, Verdana, sans-serif'
 		}
 	};

 	var echartBar = echarts.init(document.getElementById('myChart'), theme);

 	echartBar.setOption({
 		title: {
 			text: 'Grafik Penjualan',
 			subtext: 'Total'
 		},
 		tooltip: {
 			trigger: 'axis'
 		},
 		xAxis: [{
 			type: 'category',
 			data: [<?php echo $date; ?>]
 		}],
 		yAxis: [{
 			type: 'value'
 		}],
 		series: [{
 			name: 'Jumlah',
 			type: 'bar',
 			data: [<?php echo $jumlahx; ?>],
 		}]
 	});
 </script>