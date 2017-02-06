<?php 

include 'php/control/koneksi.php';
$page = $_GET['page'];








//-------------------------------------SHOW DATA FASILITAS ROOM---------------------------------//
if ($page == 'chat') {
	?>

	<div class="">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<iframe src="https://dashboard.tawk.to/login" style="width: 100%;" height="550"></iframe>
				</div>
			</div>
		</div>

		<?php
	}
