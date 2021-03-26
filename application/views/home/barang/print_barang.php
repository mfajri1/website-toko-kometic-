<h2><center>Data Barang</center></h2>
<hr/>
<table border="2px" style="border : 2px solid black; width: 100%">
	<tr style="text-align:center;">
		<th>No</th>
		<th>Nama</th>
		<th>Kategori</th>
		<th>Suplier</th>
		<th>Ukuran</th>
		<th>Modal</th>
		<th>Diskon</th>
		<th>Satuan</th>
	</tr>
	<?php $i = 0; ?>
	<?php foreach ($printData as $pd): ?>
		<tr style="text-align:center;">
			<td style="text-align:center;"><?= $i++; ?></td>
			<td style="text-align:center;"><?= $pd['namaBarang']; ?></td>
			<td style="text-align:center;"><?= $pd['namaKategori']; ?></td>
			<td style="text-align:center;"><?= $pd['namaSuplier']; ?></td>
			<td style="text-align:center;"><?= $pd['ukuran']; ?></td>
			<td style="text-align:center;"><?= $pd['hargaModal']; ?></td>
			<td style="text-align:center;"><?= $pd['diskon']; ?></td>
			<td style="text-align:center;"><?= $pd['hargaBarang']; ?></td>
		</tr>
	<?php endforeach ?>
</table>