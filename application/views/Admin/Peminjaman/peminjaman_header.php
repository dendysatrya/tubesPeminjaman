<div class="container">
	<div class="col-md-3">
		<h3 class="text-center">Permintaan</h3>
		<div class="text-center">
			<a href="<?php echo base_url('index.php/peminjaman/request') ?>" class="btn btn-success"><div class="glyphicon glyphicon-check"></div> Setujui Permintaan Peminjaman</a>
		</div>

	</div>
	<div class="col-md-9">
		<h3 class="text-center">Data Peminjaman</h3>
		<div class="text-center">
			<a href="<?php echo base_url('index.php/peminjaman/terpinjam/semua') ?>" class="btn btn-info"><div class="glyphicon glyphicon-book"></div> Semua Data Peminjaman</a>
			<a href="<?php echo base_url('index.php/peminjaman/terpinjam/sudah_kembali') ?>" class="btn btn-success"><div class="glyphicon glyphicon-ok"></div> Peminjaman Sudah Kembali</a>
			<a href="<?php echo base_url('index.php/peminjaman/terpinjam/belum_kembali') ?>" class="btn btn-danger"><div class="glyphicon glyphicon-remove"></div> Peminjaman Belum Kembali</a>
		</div>
	</div>
</div>