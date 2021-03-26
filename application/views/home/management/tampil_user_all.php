<div class="table-responsive">
	<table id="add-row" class="display table table-striped table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama User</th>
				<th>Username</th>
				<th>Email</th>
				<th>Level User</th>
				<th>Status User</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($viewUser as $vm): ?>
				<tr>
					<td><?= $i++ ;?></td>
					<td><?= ucwords($vm['namaUser']) ;?></td>
					<td><?= ucwords($vm['username']) ;?></td>
					<td><?= ucwords($vm['emailUser']) ;?></td>
					<td><?= ucwords($vm['member']) ;?></td>
					<td><div class="custom-control custom-switch">
						<input type="checkbox" name="statusUser" value="<?= $vm['statusUser'] ;?>" class="custom-control-input checkStatusUser" id="<?= $vm['idUser'] ;?>" <?= $vm['statusUser'] == 'aktif' ? 'checked' : '' ;?>>
						<label class="custom-control-label" for="<?= $vm['idUser'] ;?>"><?= ucwords($vm['statusUser']) ;?></label>
					</div></td>
					<td>
						<a href="" class="text-warning mr-2" data-toggle="modal" data-target="#infoUser<?= $vm['idUser'] ;?>"><i class="fa fa-info-circle"></i></a>
						<a href="<?= base_url('editDataUser/') . $vm['idUser'] ;?>" class="text-primary mr-2"><i class="fa fa-edit"></i></a>
						<a href="<?= base_url('hapusDataUser/') . $vm['idUser'] ;?>" class="text-danger mr-2"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>



