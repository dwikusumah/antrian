<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
			<li><a href="<?php echo base_url('DashboardAdmin'); ?>" ><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
				<!-- <li><a href="<?php echo base_url('Admin/pegawai'); ?>" class=""><i class="lnr lnr-users"></i> <span>Atur Staff</span></a></li> -->
				<li><a href="<?php echo base_url('User/index'); ?>" class=""><i class="lnr lnr-user"></i> <span>Atur Akun</span></a></li>
				<!-- <li><a href="<?php echo base_url('Layanan/index'); ?>" class=""><i class="lnr lnr-book"></i> <span>Atur Layanan</span></a></li>
				<li><a class="active" href="<?php echo base_url('Jadwal/index'); ?>" class=""><i class="lnr lnr-clock"></i> <span>Atur Jadwal</span></a></li> -->
				<li><a href="<?php echo base_url('Antrian/index'); ?>" class=""><i class="lnr lnr-eye"></i> <span>Lihat Antrian</span></a></li>
			</ul>
		</nav>
	</div>
</div>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Tambah staff</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('Admin/insertPegawai'); ?>" method="POST">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama-staff">Nama staff</label>
										<input id="nama-staff" name="nama-staff" type="text" class="form-control" placeholder="Nama staff" required="">
									</div>

									<div class="form-group">
										<label for="tempat-lahir">Tempat Lahir</label>
										<input id="tempat-lahir" name="tempat-lahir" type="text" class="form-control" placeholder="Tempat Lahir" required="">
									</div>

									<div class="form-group">
										<label for="tanggal-lahir">Tanggal Lahir</label>
										<input id="tanggal-lahir" name="tanggal-lahir" type="text" class="form-control tanggal-lahir" placeholder="Tanggal Lahir" required="">
									</div>

									<div class="form-group">
										<label for="alamat">Alamat</label>
										<textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat" required="">
										</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="jenis-kelamin">Jenis Kelamin</label>
										<label class="fancy-radio">
											<input name="jenis-kelamin" value="male" type="radio" required="">
											<span><i></i>Laki - Laki</span>
										</label>
										<label class="fancy-radio">
											<input name="jenis-kelamin" value="female" type="radio" required="">
											<span><i></i>Perempuan</span>
										</label>

									</div>

									<div class="form-group">
										<label for="status">Status</label>
										<input id="status" name="status" type="text" class="form-control" placeholder="Status" required="">
									</div>

									<div class="form-group">
										<label for="pendidikan">Pendidikan Terakhir </label>
										<select name="pendidikan" class="form-control" placeholder="Pendidikan Terakhir" required="">
											<option disabled="" readonly>Pendidikan Terakhir</option>
											<option value="stafftor">stafftor (S3)</option>
											<option value="Magister">Magister (S2)</option>
											<option value="Sarjana">Sarjana (S1)</option>
											<option value="Diploma 3">Diploma 3</option>
											<option value="Diploma 2">Diploma 2</option>
											<option value="Diploma 1">Diploma 1</option>
											<option value="SMA">SMA</option>
											<option value="SMK">SMK</option>
											<option value="SMP">SMP</option>
											<option value="SD">SD</option>
										</select>
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
