<?php  ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>List Barang</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="container">
		<h1 class="text-center">List Barang</h1>
		
		<table class="table table-hover">
				<thead>
					<tr>
						<th>Nama Barang</th>
						<th>Stok Barang</th>
						<th>Foto</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($barang_list as $row) {
						echo "<tr><td>";
						echo $row['nama_barang'];
						echo "</td><td>";
						echo $row['stok_barang'];
						echo "</td><td>";
						echo "<img src='".base_url('assets/uploads/').$row['foto']."'width='100px;'>";
						echo '</td><td>';
						echo "<a href='".base_url()."index.php/peminjaman/pinjam/".$row['id_barang']."' class='btn btn-primary'>Pinjam</a>";
						echo "</td></tr>";
					}



					?>
				</tbody>
			</table>
			</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>