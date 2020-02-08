<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<h3 class="page-title">Daftar Barang</h3>
				</div>
				<div class="col-md-2" align="right">
        			<button class="btn btn-raised btn-primary" onclick="window.print();" ><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah</button>
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
							<table class="table dt-head-center">
								<thead>
									<tr>
										<th>No.</th>
										<th>ID Transaksi</th>
										<th>Tanggal</th>
										<th>Username</th>
										<th>Total Transaksi</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach($transaksi as $trk):  ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $trk->id_transaksi ?></td>
											<td><?= $trk->tanggal ?></td>
											<td><?= $trk->username ?></td>
											<td><?= 'Rp. '.number_format($trk->total) ?></td>
											<td><a href="<?= base_url('DataTransaksi/deleteTransaksi/'.$trk->id_transaksi) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="lnr lnr-trash" ></i></a></td>
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