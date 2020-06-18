<?php

function UnsharpMask($img, $amount, $radius, $threshold)    {  

////////////////////////////////////////////////////////////////////////////////////////////////   
////   
////                  Unsharp Mask for PHP - version 2.1.1   
////   
////    Unsharp mask algorithm by Torstein Hønsi 2003-07.   
////             thoensi_at_netcom_dot_no.   
////               Please leave this notice.   
////   
///////////////////////////////////////////////////////////////////////////////////////////////   



    // $img is an image that is already created within php using  
    // imgcreatetruecolor. No url! $img must be a truecolor image.  

    // Attempt to calibrate the parameters to Photoshop:  
    if ($amount > 500)    $amount = 500;  
    $amount = $amount * 0.016;  
    if ($radius > 50)    $radius = 50;  
    $radius = $radius * 2;  
    if ($threshold > 255)    $threshold = 255;  
      
    $radius = abs(round($radius));     // Only integers make sense.  
    if ($radius == 0) {  
        return $img; imagedestroy($img); break;        }  
    $w = imagesx($img); $h = imagesy($img);  
    $imgCanvas = imagecreatetruecolor($w, $h);  
    $imgBlur = imagecreatetruecolor($w, $h);  
      

    // Gaussian blur matrix:  
    //                          
    //    1    2    1          
    //    2    4    2          
    //    1    2    1          
    //                          
    //////////////////////////////////////////////////  
          

    if (function_exists('imageconvolution')) { // PHP >= 5.1   
            $matrix = array(   
            array( 1, 2, 1 ),   
            array( 2, 4, 2 ),   
            array( 1, 2, 1 )   
        );   
        imagecopy ($imgBlur, $img, 0, 0, 0, 0, $w, $h);  
        imageconvolution($imgBlur, $matrix, 16, 0);   
    }   
    else {   

    // Move copies of the image around one pixel at the time and merge them with weight  
    // according to the matrix. The same matrix is simply repeated for higher radii.  
        for ($i = 0; $i < $radius; $i++)    {  
            imagecopy ($imgBlur, $img, 0, 0, 1, 0, $w - 1, $h); // left  
            imagecopymerge ($imgBlur, $img, 1, 0, 0, 0, $w, $h, 50); // right  
            imagecopymerge ($imgBlur, $img, 0, 0, 0, 0, $w, $h, 50); // center  
            imagecopy ($imgCanvas, $imgBlur, 0, 0, 0, 0, $w, $h);  

            imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 0, 1, $w, $h - 1, 33.33333 ); // up  
            imagecopymerge ($imgBlur, $imgCanvas, 0, 1, 0, 0, $w, $h, 25); // down  
        }  
    }  

    if($threshold>0){  
        // Calculate the difference between the blurred pixels and the original  
        // and set the pixels  
        for ($x = 0; $x < $w-1; $x++)    { // each row 
            for ($y = 0; $y < $h; $y++)    { // each pixel  
                      
                $rgbOrig = ImageColorAt($img, $x, $y);  
                $rOrig = (($rgbOrig >> 16) & 0xFF);  
                $gOrig = (($rgbOrig >> 8) & 0xFF);  
                $bOrig = ($rgbOrig & 0xFF);  
                  
                $rgbBlur = ImageColorAt($imgBlur, $x, $y);  
                  
                $rBlur = (($rgbBlur >> 16) & 0xFF);  
                $gBlur = (($rgbBlur >> 8) & 0xFF);  
                $bBlur = ($rgbBlur & 0xFF);  
                  
                // When the masked pixels differ less from the original  
                // than the threshold specifies, they are set to their original value.  
                $rNew = (abs($rOrig - $rBlur) >= $threshold)   
                    ? max(0, min(255, ($amount * ($rOrig - $rBlur)) + $rOrig))   
                    : $rOrig;  
                $gNew = (abs($gOrig - $gBlur) >= $threshold)   
                    ? max(0, min(255, ($amount * ($gOrig - $gBlur)) + $gOrig))   
                    : $gOrig;  
                $bNew = (abs($bOrig - $bBlur) >= $threshold)   
                    ? max(0, min(255, ($amount * ($bOrig - $bBlur)) + $bOrig))   
                    : $bOrig;  
                  
                  
                              
                if (($rOrig != $rNew) || ($gOrig != $gNew) || ($bOrig != $bNew)) {  
                        $pixCol = ImageColorAllocate($img, $rNew, $gNew, $bNew);  
                        ImageSetPixel($img, $x, $y, $pixCol);  
                    }  
            }  
        }  
    }  
    else{  
        for ($x = 0; $x < $w; $x++)    { // each row  
            for ($y = 0; $y < $h; $y++)    { // each pixel  
                $rgbOrig = ImageColorAt($img, $x, $y);  
                $rOrig = (($rgbOrig >> 16) & 0xFF);  
                $gOrig = (($rgbOrig >> 8) & 0xFF);  
                $bOrig = ($rgbOrig & 0xFF);  
                  
                $rgbBlur = ImageColorAt($imgBlur, $x, $y);  
                  
                $rBlur = (($rgbBlur >> 16) & 0xFF);  
                $gBlur = (($rgbBlur >> 8) & 0xFF);  
                $bBlur = ($rgbBlur & 0xFF);  
                  
                $rNew = ($amount * ($rOrig - $rBlur)) + $rOrig;  
                    if($rNew>255){$rNew=255;}  
                    elseif($rNew<0){$rNew=0;}  
                $gNew = ($amount * ($gOrig - $gBlur)) + $gOrig;  
                    if($gNew>255){$gNew=255;}  
                    elseif($gNew<0){$gNew=0;}  
                $bNew = ($amount * ($bOrig - $bBlur)) + $bOrig;  
                    if($bNew>255){$bNew=255;}  
                    elseif($bNew<0){$bNew=0;}  
                $rgbNew = ($rNew << 16) + ($gNew <<8) + $bNew;  
                    ImageSetPixel($img, $x, $y, $rgbNew);  
            }  
        }  
    }  
    imagedestroy($imgCanvas);  
    imagedestroy($imgBlur);  
      
    return $img;  

}


class Image {
    private $file;
    private $image;
    private $info;
		
	public function __construct($file) {
		if (file_exists($file)) {
			$this->file = $file;

			$info = getimagesize($file);

			$this->info = array(
            	'width'  => $info[0],
            	'height' => $info[1],
            	'bits'   => $info['bits'],
            	'mime'   => $info['mime']
        	);
        	
        	$this->image = $this->create($file);
    	} else {
      		exit('Error: Could not load image ' . $file . '!');
    	}
	}
		
	private function create($image) {
		$mime = $this->info['mime'];
		
		if ($mime == 'image/gif') {
			return imagecreatefromgif($image);
		} elseif ($mime == 'image/png') {
			return imagecreatefrompng($image);
		} elseif ($mime == 'image/jpeg') {
			return imagecreatefromjpeg($image);
		}
    }	
	
    public function save($file, $quality = 90) {
		$info = pathinfo($file);
       
		$extension = strtolower($info['extension']);
   		//$this->image = UnsharpMask($this->image, 80, 0.5, 3);
		if (is_resource($this->image)) {
			if ($extension == 'jpeg' || $extension == 'jpg') {
				imagejpeg($this->image, $file, $quality);
			} elseif($extension == 'png') {
				imagepng($this->image, $file);
			} elseif($extension == 'gif') {
				imagegif($this->image, $file);
			}
			   
			imagedestroy($this->image);
		}
		//$im = new Imagick($file); 
		//$im->resizeImage($this->info['width'],$this->info['height'],Imagick::FILTER_LANCZOS,0.8); 
		//$im->writeimage($file); 
    }	    
	
    public function resize($width = 0, $height = 0, $max = false) {
    	if (!$this->info['width'] || !$this->info['height']) {
			return;
		}

		$xpos = 0;
		$ypos = 0;
		
		if ($max)
		 $scale = max($width / $this->info['width'], $height / $this->info['height']);
		else
		 $scale = min($width / $this->info['width'], $height / $this->info['height']);
		
		if ($scale == 1 && $this->info['mime'] != 'image/png' && !$max) {
			return;
		}
		//echo $width.' '.$height; die;
		if ($width>$this->info['width'] && $height>$this->info['height'])
		$scale = 1;
		
		$new_width = (int)($this->info['width'] * $scale);
		$new_height = (int)($this->info['height'] * $scale);			

    	$xpos = (int)(($width - $new_width) / 2);
   		$ypos = (int)(($height - $new_height) / 2);
        		        
       	$image_old = $this->image;
        $this->image = imagecreatetruecolor($width, $height);
			
		if (isset($this->info['mime']) && $this->info['mime'] == 'image/png') {		
			imagealphablending($this->image, false);
			imagesavealpha($this->image, true);
			$background = imagecolorallocatealpha($this->image, 255, 255, 255, 127);
			imagecolortransparent($this->image, $background);
		} else {
			$background = imagecolorallocate($this->image, 255, 255, 255);
		}
		
		imagefilledrectangle($this->image, 0, 0, $width, $height, $background);
	
        imagecopyresampled($this->image, $image_old, $xpos, $ypos, 0, 0, $new_width, $new_height, $this->info['width'], $this->info['height']);
        imagedestroy($image_old);
           
        $this->info['width']  = $width;
        $this->info['height'] = $height;
    }
    
    public function watermark($file, $position = 'bottomright') {
        $watermark = $this->create($file);
        
        $watermark_width = imagesx($watermark);
        $watermark_height = imagesy($watermark);
        
        switch($position) {
            case 'topleft':
                $watermark_pos_x = 0;
                $watermark_pos_y = 0;
                break;
            case 'topright':
                $watermark_pos_x = $this->info['width'] - $watermark_width;
                $watermark_pos_y = 0;
                break;
            case 'bottomleft':
                $watermark_pos_x = 0;
                $watermark_pos_y = $this->info['height'] - $watermark_height;
                break;
            case 'bottomright':
                $watermark_pos_x = $this->info['width'] - $watermark_width;
                $watermark_pos_y = $this->info['height'] - $watermark_height;
                break;
        }
        
        imagecopy($this->image, $watermark, $watermark_pos_x, $watermark_pos_y, 0, 0, 120, 40);
        
        imagedestroy($watermark);
    }
    
    public function crop($top_x, $top_y, $bottom_x, $bottom_y) {
        $image_old = $this->image;
        $this->image = imagecreatetruecolor($bottom_x - $top_x, $bottom_y - $top_y);
        
        imagecopy($this->image, $image_old, 0, 0, $top_x, $top_y, $this->info['width'], $this->info['height']);
        imagedestroy($image_old);
        
        $this->info['width'] = $bottom_x - $top_x;
        $this->info['height'] = $bottom_y - $top_y;
    }
    
    public function rotate($degree, $color = 'FFFFFF') {
		$rgb = $this->html2rgb($color);
		
        $this->image = imagerotate($this->image, $degree, imagecolorallocate($this->image, $rgb[0], $rgb[1], $rgb[2]));
        
		$this->info['width'] = imagesx($this->image);
		$this->info['height'] = imagesy($this->image);
    }
	    
    private function filter($filter) {
        imagefilter($this->image, $filter);
    }
            
    private function text($text, $x = 0, $y = 0, $size = 5, $color = '000000') {
		$rgb = $this->html2rgb($color);
        
		imagestring($this->image, $size, $x, $y, $text, imagecolorallocate($this->image, $rgb[0], $rgb[1], $rgb[2]));
    }
    
    private function merge($file, $x = 0, $y = 0, $opacity = 100) {
        $merge = $this->create($file);

        $merge_width = imagesx($image);
        $merge_height = imagesy($image);
		        
        imagecopymerge($this->image, $merge, $x, $y, 0, 0, $merge_width, $merge_height, $opacity);
    }
			
	private function html2rgb($color) {
		if ($color[0] == '#') {
			$color = substr($color, 1);
		}
		
		if (strlen($color) == 6) {
			list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);   
		} elseif (strlen($color) == 3) {
			list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);    
		} else {
			return false;
		}
		
		$r = hexdec($r); 
		$g = hexdec($g); 
		$b = hexdec($b);    
		
		return array($r, $g, $b);
	}	
}
?>