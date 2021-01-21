<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Stk_barang <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Merk <?php echo form_error('merk') ?></label>
            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?php echo $merk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Port <?php echo form_error('port') ?></label>
            <input type="text" class="form-control" name="port" id="port" placeholder="Port" value="<?php echo $port; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Produk <?php echo form_error('kode_produk') ?></label>
            <input type="text" class="form-control" name="kode_produk" id="kode_produk" placeholder="Kode Produk" value="<?php echo $kode_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Masuk <?php echo form_error('tgl_masuk') ?></label>
            <input type="text" class="form-control" name="tgl_masuk" id="tgl_masuk" placeholder="Tgl Masuk" value="<?php echo $tgl_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Qr Code <?php echo form_error('qr_code') ?></label>
            <input type="text" class="form-control" name="qr_code" id="qr_code" placeholder="Qr Code" value="<?php echo $qr_code; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('stk_barang') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>