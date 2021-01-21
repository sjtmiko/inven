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
        <h2 style="margin-top:0px">Stk_barang List</h2>
         <button type="button" class="tambah btn btn-primary" data-toggle="modal" data-target="#myModal">
       Tambah
        </button>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="judul"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('stk_barang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('stk_barang'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Barang</th>
		<th>Merk</th>
		<th>Port</th>
		<th>Kode Produk</th>
		<th>Tgl Masuk</th>
		<th>Keterangan</th>
		<th>Qr Code</th>
		<th>Action</th>
            </tr><?php
            foreach ($stk_barang_data as $stk_barang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $stk_barang->nama_barang ?></td>
			<td><?php echo $stk_barang->merk ?></td>
			<td><?php echo $stk_barang->port ?></td>
			<td><?php echo $stk_barang->kode_produk ?></td>
			<td><?php echo $stk_barang->tgl_masuk ?></td>
			<td><?php echo $stk_barang->keterangan ?></td>
			<td><?php echo $stk_barang->qr_code ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('stk_barang/read/'.$stk_barang->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('stk_barang/update/'.$stk_barang->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('stk_barang/delete/'.$stk_barang->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('stk_barang/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
            <!-- <script src="<?php echo base_url()('/assets/js/jquery-1.11.2.min.js')?>"></script> -->
   <script type="text/javascript">
         $(document).ready(function(){

                $('#myModal').click(function(){
               // var aksi = 'create';
                $.ajax({
                    url: '<?php echo base_url('/Stk_barang/test'); ?>',
                    method: 'post',
                    data: {aksi:aksi},
                    success:function(data){
                        $('#myModal').modal("show");
                        $('#tampil_modal').html(data);
                        document.getElementById("judul").innerHTML='Tambah Data';

                    }
                });
                });
         });
        </script>
</html>