<!-- Sidebar -->
<div class="sidebar"  data-background-color="blue">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="<?= base_url('assets/admin/uploads/users/') . $konfigUser['fotoUser'];?>" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#dropdownProfile" aria-expanded="true">
						<span>
							<?= ucwords($konfigUser['namaUser']) ;?>
							<span class="user-level"><?= $konfigUser['member'] ;?></span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="dropdownProfile">
						<ul class="nav">
							<li>
								<a href="<?= base_url('profile') ;?>">
									<span class="link-collapse">View Profile</span>
								</a>
							</li>
							<li>
								<a href="<?= base_url('settingProfile') ;?>">
									<span class="link-collapse">Account Setting</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
				<ul class="nav nav-primary">
					<?php if ($this->uri->segment(1) == "home" && $this->uri->segment(2) == "" ): ?>
						<li class="nav-item active">
					<?php elseif($this->uri->segment(2) != "home"): ?>
						<li class="nav-item">
					<?php endif ?>
					<a href="<?= base_url('home') ;?>">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Daftar Menu</h4>
				</li>

				<?php foreach ($daftarMenu as $dm): ?>
					<!-- setting link aktif -->
					<?php if ($this->uri->segment(1) == $dm['linkDropdown']): ?>
						<li class="nav-item active">
							<a data-toggle="collapse" href="#<?= $dm['linkDropdown'] ;?>">
								<i class="<?= $dm['iconMenu'] ;?>"></i>
								<p><?= $dm['namaMenu'] ;?></p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="<?= $dm['linkDropdown'] ;?>">
					<?php else: ?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#<?= $dm['linkDropdown'] ;?>">
								<i class="<?= $dm['iconMenu'] ;?>"></i>
								<p><?= $dm['namaMenu'] ;?></p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="<?= $dm['linkDropdown'] ;?>">	
					<?php endif ?>
					<!-- akhir setting link aktif -->
							<?php 
								$idMenu = $dm['idMenu'];
								$querySubmenu = "
									SELECT * 
									FROM `t_submenu` AS `tsm`
									WHERE `tsm`.`menuId` = $idMenu && `tsm`.`statusSubmenu` = 'publish'
									GROUP BY `tsm`.`idSubmenu`
									ORDER BY `tsm`.`urutSubmenu` ASC
								";

								$daftarSubenu = $this->db->query($querySubmenu)->result_array();
							?>

							<?php if ($daftarSubenu != NULL): ?>
								<ul class="nav nav-collapse">
									<?php foreach ($daftarSubenu as $dsm): ?>
										<li>
											<a href="<?= base_url($dsm['urlSubmenu']) ;?>">
												<span class="sub-item"><?= $dsm['namaSubmenu'] ;?></span>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							<?php endif ?>

						</div>
					</li>
				<?php endforeach ?>

				<li class="nav-item">
					<a href="widgets.html">
						<i class="fas fa-desktop"></i>
						<p>Widgets</p>
						<span class="badge badge-success">4</span>
					</a>
				</li>
				
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->

<div class="main-panel">
	<div class="content">
		