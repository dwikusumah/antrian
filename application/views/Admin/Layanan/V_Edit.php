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
			<h3 class="page-title">Edit Layanan</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('Layanan/updateLayanan'); ?>" method="POST">
							
							<?php if($list){
								foreach ($list as $value) {
							?>
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input type="hidden" value="<?php echo $value["id_layanan"]; ?>" name="id_layanan">
									<input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" value="<?php echo $value['nama']; ?>" required="">
								</div>
								<div class="form-group">
									<label for="nama">Kode Layanan</label>
									<input id="nama" maxlength="3" name="nama" type="text" class="form-control" placeholder="Kode Layanan" value="<?php echo $value['code_layanan']; ?>" required="" style="width: 30%;">
								</div>
							</div>
							<?php
								}
							}
							?>
							<div class="col-md-12">
								<input class="btn btn-raised btn-primary" type="submit" value="Edit">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
