<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/kasir.css">
    <title>KASIR</title>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="<?= base_url('Kasir/kasir');?>">KASIR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" ><?= $this->session->userdata('username') ?></a>
                <a class="nav-item nav-link" href="<?= base_url() ?>Kasir/kasir/transaksi">Transaksi</a>
                <a class="btn btn-danger" href="<?= base_url('Login_Staff/logout') ?>">Logout</a>
            </div>
        </div>
    </nav>