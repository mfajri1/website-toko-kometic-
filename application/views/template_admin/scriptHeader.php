<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="<?= $konfig['metatext'] ;?>">
	<meta name="keywords" content="<?= $konfig['keywords'] ;?>">
	<meta name="description" content="<?= $konfig['description'] ;?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?= $title ;?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url('assets/admin/uploads/konfig/') . $konfig['imgIcon'] ;?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?= base_url('assets/admin/') ;?>js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url("assets/admin/") ;?>css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ;?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ;?>css/atlantis.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ;?>jquery-image-reader-master/example/stylesheets/stylesheet.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ;?>jquery-image-reader-master/example/stylesheets/normalize.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ;?>jquery-image-reader-master/example/stylesheets/github-light.css">
	
	<script src="<?= base_url('assets/admin/') ;?>js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url('assets/admin/') ;?>js/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ;?>css/jquery-ui.css">

	<!-- style buat sendiri -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ;?>css/style.css">

</head>