<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <script src="<?php echo base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"> </script>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Stk_barang Read</h2>
        <table class="table">
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td>Merk</td><td><?php echo $merk; ?></td></tr>
	    <tr><td>Port</td><td><?php echo $port; ?></td></tr>
	    <tr><td>Kode Produk</td><td><?php echo $kode_produk; ?></td></tr>
	    <tr><td>Tgl Masuk</td><td><?php echo $tgl_masuk; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Qr Code</td><td><?php echo $qr_code; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('stk_barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>


</html>