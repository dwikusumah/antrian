<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
			<li><a href="<?php echo base_url('DashboardAdmin'); ?>" ><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
				<!-- <li><a href="<?php echo base_url('Admin/pegawai'); ?>" class=""><i class="lnr lnr-users"></i> <span>Atur Staff</span></a></li> -->
				<li><a href="<?php echo base_url('User/index'); ?>" id="userMenu" class=""><i class="lnr lnr-user"></i> <span>Atur Akun</span></a></li>
				<li><a href="<?php echo base_url('Antrian/index'); ?>" id="antrianMenu" class=""><i class="lnr lnr-eye"></i> <span>Lihat Antrian</span></a></li>
				<li><a href="<?php echo base_url('DataBarang/index'); ?>" id="barangMenu" class=""><i class="lnr lnr-list"></i> <span>Barang</span></a></li> 
				<li><a class="active" href="<?php echo base_url('DataTransaksi/index'); ?>" id="transaksiMenu" class=""><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
			</ul>
		</nav>
	</div>
</div>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<h3 class="page-title">Daftar Transaksi</h3>
				</div>
				<div class="col-md-2" align="right">
					<?php 
						if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
					?>
					<a href="<?= base_url() ?>DataTransaksi/cetak?bulan=<?= $_GET['bulan'] ?>&tahun=<?= $_GET['tahun'] ?>" class="btn btn-raised btn-primary" ><span class="fa fa-print" style="margin-right: 10px;"></span>CETAK</a>
						<?php }else if (!isset($_GET['bulan']) && isset($_GET['tahun'])) { ?>
							<a href="<?= base_url() ?>DataTransaksi/cetak?tahun=<?= $_GET['tahun'] ?>" class="btn btn-raised btn-primary" ><span class="fa fa-print" style="margin-right: 10px;"></span>CETAK</a>
						<?php } ?>
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
							<form method="get">
							<div class="form-group">
								<label for="bulan">Pilih Bulan</label>
								<select class="form-control" id="bulan" name="bulan">
									<option selected="" disabled>-- PILIH --</option>
									<option value="01">Januari</option>
									<option value="02">Februari</option>
									<option value="03">Maret</option>
									<option value="04">April</option>
									<option value="05">Mei</option>
									<option value="06">Juni</option>
									<option value="07">Juli</option>
									<option value="08">Agustus</option>
									<option value="09">September</option>
									<option value="10">Oktober</option>
									<option value="12">November</option>
									<option value="12">Desember</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tahun">Pilih Tahun </label>
								<select class="form-control" id="tahun" name="tahun">
									<option selected="" disabled>-- PILIH --</option>
								<?php
									$mulai= date('Y') - 10;
									for($i = $mulai;$i<$mulai + 11;$i++){
										$sel = $i == date('Y') ? : '';
										echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
									}
									?>
								</select>
							</div>
							<button type="submit" name="submit" value="submit" class="btn btn-primary mb-4">Submit</button>
							</form>
							<br>
							<h3>TRANSAKSI</h3>
							<br>
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
									<?php 
									if (isset($_GET['bulan']) && isset($_GET['tahun'])){
										$bulan = $_GET['bulan'];
										$tahun = $_GET['tahun'];
										$transaksi = $this->db->query("SELECT * FROM tbl_transaksi WHERE year(tanggal)='$tahun' AND month(tanggal)='$bulan'")->result();
										$no = 1; foreach($transaksi as $trk):  ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $trk->id_transaksi ?></td>
											<td><?= $trk->tanggal ?></td>
											<td><?= $trk->username ?></td>
											<td><?= 'Rp. '.number_format($trk->total) ?></td>
											<td><a href="<?= base_url('DataTransaksi/deleteTransaksi/'.$trk->id_transaksi) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="lnr lnr-trash" ></i></a></td>
										</tr>
									<?php $no++; endforeach;  
									}else if(isset($_GET['tahun']) && !isset($_GET['bulan'])){
										//$bulan = $_GET['bulan'];
										$tahun = $_GET['tahun'];
										$transaksi = $this->db->query("SELECT * FROM tbl_transaksi WHERE year(tanggal)='$tahun'")->result();
										$no = 1; foreach($transaksi as $trk):  ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $trk->id_transaksi ?></td>
											<td><?= $trk->tanggal ?></td>
											<td><?= $trk->username ?></td>
											<td><?= 'Rp. '.number_format($trk->total) ?></td>
											<td><a href="<?= base_url('DataTransaksi/deleteTransaksi/'.$trk->id_transaksi) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="lnr lnr-trash" ></i></a></td>
										</tr>
									
									<?php $no++; endforeach; }
									?>
								</tbody>
							</table>
							<br>
							<?php
							if (isset($_GET['bulan']) && isset($_GET['tahun'])){
								$bulan = $_GET['bulan'];
								$tahun = $_GET['tahun'];
								$detail = $this->db->query("SELECT * FROM tbl_transaksi INNER JOIN tbl_transaksi_detail USING (id_transaksi) WHERE year(tanggal)='$tahun' AND month(tanggal)='$bulan'")->result();
								$jmlh = 0;
								$total = 0;
								foreach ($transaksi as $trk) {
									foreach ($detail as $dtl) {
										if($dtl->id_transaksi==$trk->id_transaksi){
											$jmlh += $dtl->jumlah;
										}
									}
									$total += $jmlh;
								}
								echo "<h3>Total Barang Yang Terjual : ".$total." Barang </h3>";
							}else if(!isset($_GET['bulan']) && isset($_GET['tahun'])){
								//$bulan = $_GET['bulan'];
								$tahun = $_GET['tahun'];
								$detail = $this->db->query("SELECT * FROM tbl_transaksi INNER JOIN tbl_transaksi_detail USING (id_transaksi) WHERE year(tanggal)='$tahun'")->result();
								$jmlh = 0;
								$total = 0;
								foreach ($transaksi as $trk) {
									foreach ($detail as $dtl) {
										if($dtl->id_transaksi==$trk->id_transaksi){
											$jmlh += $dtl->jumlah;
										}
									}
									$total += $jmlh;
								}
								echo "<h3>Total Barang Yang Terjual : ".$total." Barang </h3>";
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2019. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/klorofil-common.js');  ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.js'); ?>"></script>
  	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/toastr/toastr.min.js'); ?>"></script>

</body>
</html>