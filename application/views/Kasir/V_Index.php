    <!-- MAIN -->
    <?php 
        $idp = '';
        $point = "";
        if(!empty($current_antrian[0]['id_antrian'])){
            $idp = $current_antrian[0]['id_antrian'];
            $point = "";
        }else{
            $point =  "disabled";
        }	
        
        ?>
    <span class="number">
        <h3>
            Antrian Saat ini : 
            <?php 
                if(!empty($current_antrian[0]['antrian'])){
                    echo $current_antrian[0]['antrian'];
                }else{
                    echo " - ";
                }	 
            ?>
        
        </h3> <span>
    <input type="text" id="idAntrian" value="<?= $idp ?>" hidden>
    <a href="<?php echo base_url(); ?>Kasir/kasir/skipAntrian/<?= $idp ?>" class="btn btn-success btn-large"><span class="title fa fa-play"></span> &nbsp; Next</a>
    <div class="row">
        <div class="col">
            <div class="card bg-light mb-3">
                <div class="card-header"><h3>Transaksi Kasir</h3></div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data_barang as $br): ?>
                            <tr>
                                <td id="id_barang"><?= $br->id ?></td>
                                <td id="nama"><?= $br->nama_barang ?></td>
                                <td id="stok"><?= $br->stok ?></td>
                                <td id="jenis"><?= $br->jenis_barang ?></td>
                                <td id="harga"><?= 'Rp'.number_format($br->harga) ?></td>
                                <td><input type="number" name="quantity" id="<?= $br->id;?>" min="1" value="1" class="quantity form-control"></td>
                                <td>
                                    <buttton class="add_cart btn btn-info" data-produkid="<?= $br->id ?>" data-produknama="<?= $br->nama_barang ?>" data-produkstok="<?= $br->stok ?>" data-produkharga="<?= $br->harga ?>">ambil</button>
                                </td>
                            </tr>
                            <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card bg-light mb-3">
                <div class="card-header"><h3>TOTAL</h3></div>
                <div class="card-body" id="box">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="detail_cart">
                        
                    </tbody>
                </table>
                <h5 class="font-weight-bold mb-2">Masukan Uang</h5>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="bayar" placeholder="Masukan Jumlah Uang" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><button class="kembalian badge bagde-secondary btn btn-primary float-right mb-1" > Proses </button></span>
                    </div>
                </div>
                <h5 class="font-weight-bold mt-3" >Kembalian : <span id="naon"></span> </h5>
                <button class="end_cart btn btn-warning mb-3"> Checkout </button>
                </div>
            </div>
        </div>

    </div>

    <!-- END OF MAIN -->
    
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</div>