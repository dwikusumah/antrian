<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Edit Akun</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('DataBarang/updateBarang'); ?>" method="POST">
								<div class="col-md-6">
									<?php 
									if($list){
										foreach ($list as $value) {
											?>
											<div class="form-group">
                                                <label for="username">Nama Barang</label>
                                                <input type="text" name="id" value="<?= $value['id'] ?>" hidden>
                                                <input id="username" name="nama_barang" type="text" class="form-control" placeholder="Masukan Nama Barang" value="<?= $value['nama_barang'] ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Stok</label>
                                                <input id="password" name="stok" type="number" min="1" class="form-control" placeholder="Masukan Stok Barang" value="<?= $value['stok'] ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Jenis Barang</label>
                                                <input id="nama" name="jenis_barang" type="text" class="form-control" placeholder="Masukan Jenis Barang seperti : Makanan, Minuman, Snack dll" value="<?= $value['jenis_barang'] ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Harga</label>
                                                <input id="nama" name="harga" type="text" class="form-control" placeholder="Masukan Harga" value="<?= $value['harga'] ?>" required="">
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
	</div>
