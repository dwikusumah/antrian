<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
			<li><a href="<?php echo base_url('DashboardAdmin'); ?>" ><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
				<!-- <li><a href="<?php echo base_url('Admin/pegawai'); ?>" class=""><i class="lnr lnr-users"></i> <span>Atur Staff</span></a></li> -->
				<li><a class="active" href="<?php echo base_url('User/index'); ?>" id="userMenu" class=""><i class="lnr lnr-user"></i> <span>Atur Pegawai</span></a></li>
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
			<div class="row">
				<div class="col-md-10">
					<h3 class="page-title">Atur Pegawai</h3>
				</div>
				<div class="col-md-2" align="right">
        			<a href="<?php echo base_url('User/inputUser'); ?>" class="btn btn-raised btn-primary"><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('success')){  ?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php 
					} elseif ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="false fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php 
					} ?>
					<div class="panel">
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama</th>
										<th>Hak Akses</th>
										<th style="text-align: center;">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									if($user){
										foreach ($user as $value) {
											$id = $value['id_user'];
											if($value['akses']!="Admin"):
											?>

											<tr>
												<td><?php echo $i++ . "."; ?></td>
												<td><?php echo $value['nama']; ?></td>
												<td><?php echo $value['akses']; ?></td>
												<td align="center">
													<!-- <a href="<?php echo base_url('User/userDetail/'.$id); ?>" class="btn btn-sm btn-primary"><span class="fa fa-info"></span></a> -->
													<a href="<?php echo base_url('User/userEdit/'.$id); ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
													<a href="<?php echo base_url('User/deleteUser/'.$id); ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
												</td>
											</tr>
											<?php
											endif;
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>