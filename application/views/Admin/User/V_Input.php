<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
			<li><a href="<?php echo base_url('DashboardAdmin'); ?>" ><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
				<!-- <li><a href="<?php echo base_url('Admin/pegawai'); ?>" class=""><i class="lnr lnr-users"></i> <span>Atur Staff</span></a></li> -->
				<li><a class="active" href="<?php echo base_url('User/index'); ?>" id="userMenu" class=""><i class="lnr lnr-user"></i> <span>Atur Akun</span></a></li>
				<li><a href="<?php echo base_url('Antrian/index'); ?>" id="antrianMenu" class=""><i class="lnr lnr-eye"></i> <span>Lihat Antrian</span></a></li>
				<li><a href="<?php echo base_url('DataBarang/index'); ?>" id="barangMenu" class=""><i class="lnr lnr-list"></i> <span>Barang</span></a></li> 
				<li><a href="<?php echo base_url('DataTransaksi/index'); ?>" id="transaksiMenu" class=""><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
			</ul>
		</nav>
	</div>
</div>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Tambah Akun</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('User/insertUser'); ?>" method="POST">
							<div class="col-md-6">
								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" name="username" type="text" class="form-control" placeholder="Username" required="">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" name="password" type="password" class="form-control" placeholder="Password" required="">
								</div>
								<div class="form-group">
									<label for="nama">Nama</label>
									<input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" required="">
								</div>
								<div class="form-group">
									<label for="akses">Hak Akses</label>
									<select name="akses" class="form-control">
										<option value="Kasir">Kasir</option>
									</select>
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
