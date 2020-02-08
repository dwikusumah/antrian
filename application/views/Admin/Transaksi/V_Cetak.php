<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- <?php 
        if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
        }else if(!isset($_GET['bulan']) && isset($_GET['tahun'])){
            //$bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
        }
    ?> -->
    <div class="container">
        <h3 class="mb-5 mt-5 text-center">Transaksi Keseluruhan</h3>
        <table class="table dt-head-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Username</th>
                    <th>Total Transaksi</th>
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
                        <!-- <td><a href="<?= base_url('DataTransaksi/deleteTransaksi/'.$trk->id_transaksi) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="lnr lnr-trash" ></i></a></td> -->
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
                        <!-- <td><a href="<?= base_url('DataTransaksi/deleteTransaksi/'.$trk->id_transaksi) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="lnr lnr-trash" ></i></a></td> -->
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
</body>
</html>