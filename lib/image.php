<?php
require_once('image_global.php');
define('DIR_IMAGE',$_SERVER['DOCUMENT_ROOT'].'/');

define('HTTPS_IMAGE','/');
define('HTTP_IMAGE','/');
class ModelToolImage{
	public function resize($filename, $width, $height, $max = false) {
		//return DIR_IMAGE.$filename;
		if (!file_exists(DIR_IMAGE . $filename) || !is_file(DIR_IMAGE . $filename)) {
			$filename = 'images/no_image.png';
			$max = false;
		} 
		
		$info = pathinfo($filename);
		$extension = $info['extension'];
		
		if ($filename[0]=='/'){
			$filename = mb_substr($filename, 1);
		}
		$old_image = $filename;
		$new_image = 'cache/' . mb_substr($filename, 0, mb_strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;
		if (!file_exists(DIR_IMAGE . $new_image) || (filemtime(DIR_IMAGE . $old_image) > filemtime(DIR_IMAGE . $new_image))) {
			$path = '';
			
			$directories = explode('/', dirname(str_replace('../', '', $new_image)));
			
			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;
				
				if (!file_exists(DIR_IMAGE . $path)) {
					@mkdir(DIR_IMAGE . $path, 0777);
				}		
			}

			list($width_orig, $height_orig) = getimagesize(DIR_IMAGE . $old_image);
			
			if ($height == 'auto') $height = $width/($width_orig/ $height_orig);
			if ($width == 'auto') $width = $height/($height_orig/ $width_orig);
			
			if ($width_orig != $width || $height_orig != $height) {
				$image = new Image(DIR_IMAGE . $old_image);
				
				$image->resize($width, $height, $max);
				
				$image->save(DIR_IMAGE . $new_image);
				
			} else {
				copy(DIR_IMAGE . $old_image, DIR_IMAGE . $new_image);
			}
		}
		
		if (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))) {
			return HTTPS_IMAGE . $new_image;
		} else {
			return HTTP_IMAGE . $new_image;
		}	
	}
}
?>