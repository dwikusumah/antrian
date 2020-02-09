<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
			<li><a href="<?php echo base_url('DashboardAdmin'); ?>" ><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
				<!-- <li><a href="<?php echo base_url('Admin/pegawai'); ?>" class=""><i class="lnr lnr-users"></i> <span>Atur Staff</span></a></li> -->
				<li><a href="<?php echo base_url('User/index'); ?>" id="userMenu" class=""><i class="lnr lnr-user"></i> <span>Atur Pegawai</span></a></li>
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
			<div class="row">
				<div class="col-md-10">
					<h3 class="page-title">Daftar Barang</h3>
				</div>
				<div class="col-md-2" align="right">
        			<a href="<?php echo base_url('DataBarang/inputBarang'); ?>" class="btn btn-raised btn-primary"><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah</a>
				</div>
				<div class="col-md-2" align="right">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('success')){  ?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php }elseif($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="false fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php } ?>
					<div class="panel">
						<div class="panel-body">
							<table id="doctor-table" class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Barang</th>
										<th>Jenis Barang</th>
										<th>Stok</th>
										<th>Harga</th>
										<th style="text-align: center;">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach($barang as $brg):  ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $brg->nama_barang ?></td>
											<td><?= $brg->jenis_barang ?></td>
											<td><?= $brg->stok ?></td>
											<td><?= 'Rp. '.number_format($brg->harga) ?></td>
											<td class="text-center"><a href="<?= base_url('DataBarang/editBarang/'.$brg->id) ?>" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a>
											<a href="<?= base_url('DataBarang/deleteBarang/'.$brg->id) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="lnr lnr-trash" ></i></a></td>
										</tr>
									<?php $no++; endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>