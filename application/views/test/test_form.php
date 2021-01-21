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
        <h2 style="margin-top:0px">Test <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Test <?php echo form_error('test') ?></label>
            <input type="text" class="form-control" name="test" id="test" placeholder="Test" value="<?php echo $test; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Test6 <?php echo form_error('test6') ?></label>
            <input type="text" class="form-control" name="test6" id="test6" placeholder="Test6" value="<?php echo $test6; ?>" />
        </div>
	    <input type="hidden" name="id_in" value="<?php echo $id_in; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('test') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>