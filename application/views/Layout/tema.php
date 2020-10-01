<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?= base_url(); ?>assets/dist/img/e.png">

        <title><?= ucwords($title); ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="<?= base_url(); ?>assets/dist/css/sticky-footer-navbar.css" rel="stylesheet" />
        <link href="<?= base_url(); ?>assets/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                background-image: url('<?= base_url(); ?>assets/dist/img/bg-green.jpg');
            }
        </style>
    </head>
    <body>
        <?php $this->load->view('layout/dashboard_v') ?>
        <?php $this->load->view($isi) ?>
        <?php $this->load->view('layout/footer_v') ?>

        <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/dist/js/bootstrap.min.js"></script>      
        <script src="<?= base_url(); ?>assets/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>assets/datatables/media/js/dataTables.bootstrap.min.js"></script>
    </body>
</html>