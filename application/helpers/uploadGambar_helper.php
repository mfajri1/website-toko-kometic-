<?php

	function _uploadGambar($folder){
		$CI = get_instance();

		$config['upload_path'] = './assets/admin/uploads/'.$folder.'/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '2048';
		$config['encrypt_name'] = true;
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';

		$CI->load->library('upload', $config);
	}

	function _createThumbs($uploadGambar, $sumberFile){
		$CI = get_instance();

		$thumbnail['image_library'] 	= 'gd2';
		$thumbnail['source_image']		= './assets/admin/uploads/'.$sumberFile.'/'.$uploadGambar['file_name'];
		$thumbnail['new_image'] 		= './assets/admin/uploads/thumbs/';
		$thumbnail['encrypt_name'] 		= TRUE; //enkripsi nama file
		$thumbnail['create_thumb']		= FALSE;
		$thumbnail['maintain_ratio'] 	= FALSE;
		$thumbnail['width']         	= 75;
		$thumbnail['height']       		= 50;

		$CI->load->library('image_lib', $thumbnail);
		$CI->image_lib->initialize($thumbnail);
		$CI->image_lib->resize();
	}

 ?>