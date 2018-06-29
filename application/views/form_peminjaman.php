<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Form Peminjaman</title>

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
		<div class="container-fluid">
 				<div class="col-md-4"></div>
 				<div class="col-md-4">
 					<h1>Form Peminjaman</h1>
 					<?php 
 						echo form_open('peminjaman/pinjam/'.$this->uri->segment(3)); 
 						echo validation_errors();

 					?>

 					<?php foreach ($barang as $barang) {
 					?>
 					
 					<div class="form-group">
 						<input type="hidden" class="form-control" id="id_barang" name="id_barang" value="<?php echo $barang['id_barang'] ?>">
 						<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user ?>">
 					</div>
 					<div class="form-group">
 						<label>Nama Barang</label>
 						<input type="text" readonly="true" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $barang['nama_barang'] ?>">
 					</div>
 					<div class="form-group">
 						<label>Gambar</label><br>
 						<?php echo "<img src='".base_url('assets/uploads/').$barang['foto']."'width='100px;'>"; ?>
 					</div>

 					<div class="form-group">
 						<label>Stok Tersedia</label>
 						<input type="number" readonly="true" class="form-control" id="stok_tersedia" name="stok_tersedia" value="<?php echo $barang['stok_tersedia']; ?>">
 					</div>
 					<div class="form-group">
 						<label>Jumlah Pinjam<font color="red">*</font></label>
 						<input type="number" min="1" max="<?php echo $barang['stok_tersedia']; ?>" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" placeholder="Isikan jumlah yang akan dipinjam">
 					</div>
 					<font color="red"><i>* Wajib diisi</i></font>
					<br>
					<br>

 					<button type="submit" class="btn btn-primary">Submit</button>
 					<?php } ?>
 					<?php echo form_close(); ?>
 				</div>
 				<div class="col-md-4"></div>
 			</div>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>