<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
			<li><a href="<?php echo base_url('DashboardAdmin'); ?>" ><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
				<!-- <li><a href="<?php echo base_url('Admin/pegawai'); ?>" class=""><i class="lnr lnr-users"></i> <span>Atur Staff</span></a></li> -->
				<li><a href="<?php echo base_url('User/index'); ?>" id="userMenu" class=""><i class="lnr lnr-user"></i> <span>Atur Akun</span></a></li>
				<li><a href="<?php echo base_url('Antrian/index'); ?>" id="antrianMenu" class=""><i class="lnr lnr-eye"></i> <span>Lihat Antrian</span></a></li>
				<li><a class="active" href="<?php echo base_url('DataBarang/index'); ?>" id="barangMenu" class=""><i class="lnr lnr-list"></i> <span>Barang</span></a></li> 
				<li><a href="<?php echo base_url('DataTransaksi/index'); ?>" id="transaksiMenu" class=""><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
			</ul>
		</nav>
	</div>
</div>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Tambah Barang</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('DataBarang/insertBarang'); ?>" method="POST">
							<div class="col-md-6">
								<div class="form-group">
									<?php $id=rand(100000,999999); ?>
									<label for="username">ID</label>
									<input id="username" name="id" type="text" class="form-control" placeholder="Masukan Nama Barang" value="<?= $id ?>" readonly required="">
								</div>
								<div class="form-group">
									<label for="username">Nama Barang</label>
									<input id="username" name="nama_barang" type="text" class="form-control" placeholder="Masukan Nama Barang" required="">
								</div>
								<div class="form-group">
									<label for="password">Stok</label>
									<input id="password" name="stok" type="number" min="1" class="form-control" placeholder="Masukan Stok Barang" required="">
								</div>
								<div class="form-group">
									<label for="nama">Jenis Barang</label>
									<input id="nama" name="jenis_barang" type="text" class="form-control" placeholder="Masukan Jenis Barang seperti : Makanan, Minuman, Snack dll" required="">
								</div>
								<div class="form-group">
									<label for="nama">Harga</label>
									<input id="nama" name="harga" type="text" class="form-control" placeholder="Masukan Harga" required="">
								</div>
							</div>
							<div class="col-md-12">
								<input class="btn btn-raised btn-primary" type="submit" value="Tambah">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
