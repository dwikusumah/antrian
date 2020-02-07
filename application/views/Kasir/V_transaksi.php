    <!-- MAIN -->

    <div class="row">
            <div class="card bg-light mb-3">
                <div class="card-header"><h3>Transaksi Kasir</h3></div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>ID Transaksi</th>
                                <th>Username</th>
                                <th>Total Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($transaksi as $tr): ?>
                            <tr>
                                <td id="id_barang"><?= $tr->tanggal ?></td>
                                <td id="nama"><?= $tr->id_transaksi ?></td>
                                <td id="stok"><?= $tr->username ?></td>
                                <td id="harga"><?= 'Rp'.number_format($tr->total) ?></td>
                            </tr>
                            <?php endforeach ?>
                    </table>
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