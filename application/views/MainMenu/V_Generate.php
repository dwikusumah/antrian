<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Nomor Antrian</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-icons.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
  <link href="<?php echo base_url('assets/css/material-kit.css?v=2.0.4');?>" rel="stylesheet" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.webp'); ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.webp'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.css'); ?>">
  <style type="text/css">
  @media print {
    body * {
      visibility: hidden;
    }
    #section-to-print,
    #section-to-print * {
      visibility: visible;
    }
    #section-to-print {
      position: absolute;
      left: 0;
      top: 0;
    }
  }
  </style>
</head>
<body class="landing-page sidebar-collapse">
  <nav class="navbar  fixed-top navbar-expand-lg" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate"> <a class="navbar-brand" href="#">
          Aplikasi Antrian </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="sr-only">Toggle navigation</span> <span class="navbar-toggler-icon"></span> <span class="navbar-toggler-icon"></span> <span class="navbar-toggler-icon"></span> </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(''); ?>C_Login_c/logout"> <i class="material-icons"></i> Logout </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php foreach ($list as $ls) :?>
    <div class="main main-raised" id="section-to-print" style="margin-top: 1%;">
      <div class="container">
        <div class="section text-center">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
              <h3 class="title">Nomor Antrian Anda</h3>
              <hr> </div>
          </div>
          <div class="col-md-8 ml-auto mr-auto">
            <h1 class="title"><?php echo $ls->antrian; ?></h1> </div>
          <div class="row">
            <div class="col-md-4 ml-auto mr-auto">
              <button class="btn button btn-success" onclick="printToImage()">Simpan sebagai dokumen</button>
              <button class="btn button btn-warning" onclick="window.print();">Cetak</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach ?>
      
      <script src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/js/core/popper.min.js'); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js'); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/js/plugins/moment.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/plugins/bootstrap-datetimepicker.js'); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/js/plugins/nouislider.min.js'); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/js/plugins/jquery.sharrre.js'); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/js/material-kit.js?v=2.0.4'); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/html2canvas.min.js'); ?>"></script>
      <script type="text/javascript">
      function printToImage() {
        html2canvas(document.querySelector("#section-to-print")).then(canvas => {
          window.open(canvas.toDataURL("image/png"), '_blank');
        });
      }
      </script>
</body>

</html>