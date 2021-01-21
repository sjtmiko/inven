<html>
<head>
	<title>Print by ID</title>
</head>
<body>
<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Barang</th>
		<th>Merk</th>
		<th>Port</th>
		<th>Kode Produk</th>
		<th>Tgl Masuk</th>
		<th>Keterangan</th>
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
			<?php } ?>
		</table>
</body>
</html>
