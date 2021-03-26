<form action="<?= base_url('hapusAllTransaksi') ;?>" method="POST" enctype="multipart/form-data" id="deleteAll">
	<table id="multi-filter-select" class="display table table-striped table-hover">
		<thead>
			<tr>
				<th><input type="checkbox" class="checkAll" name="idTransaksi[]"></th>
				<th>Perusahaan</th>
				<th>Kode Order</th>
				<th>Kode Transaksi</th>
				<th>Sales</th>
				<th>Total</th>
				<th>Pembayaran</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tTransaksi as $tt): ?>
				<tr>
					<td><input type="checkbox" class="check" name="idTransaksi[]" value="<?= $tt['idTransaksi'] ;?>"></td>
					<td><?= cetak(ucwords($tt['perusahaanId'])) ;?></td>
					<td><?= cetak(ucwords($tt['kodeOrder'])) ;?></td>
					<td><?= cetak(ucwords($tt['kodeTransaksi'])) ;?></td>
					<td><?= cetak(ucwords($tt['namaSales'])) ;?></td>
					<td class="totalSemua text-right"><?= cetak(number_format($tt['totalSemua'],0,',','.')) ;?></td>
					<td><?= cetak(ucwords($tt['pembayaran'])) ;?> </td>
					<td>
						<a href="" data-toggle="modal" data-target="#infobarang<?= $tt['idTransaksi'] ;?>"><i class="fa fa-info-circle text-warning"></i> </a>
						<a href="" data-toggle="modal" data-target="#modalEditBarang<?= $tt['idTransaksi'] ;?>"><i class="fa fa-edit"></i> </a>
						<a href="" data-toggle="modal" data-target="#modalHapusBarang<?= $tt['idTransaksi'] ;?>"><i class="fas fa-trash text-danger"></i> </a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<button type="submit" class="btn btn-danger btn-sm ml-3 mt-2" id="hapusAll">Hapus</button>
</form>

<script >
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
		});

		$('#multi-filter-select').DataTable( {
			"pageLength": 5,
			initComplete: function () {
				this.api().columns().every( function () {
					let column = this;
					let select = $('<select class="form-control"><option value=""></option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						let val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
							);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		});

		// Add Row
		$('#add-row').DataTable({
			"pageLength": 5,
		});

		let action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

		$('#addRowButton').click(function() {
			$('#add-row').dataTable().fnAddData([
				$("#addName").val(),
				$("#addPosition").val(),
				$("#addOffice").val(),
				action
				]);
			$('#addRowModal').modal('hide');

		});
	});
</script>