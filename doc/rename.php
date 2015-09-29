<?php 

$dir = './';
if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
        if ($file == "." || $file == "..") continue;
        if(filetype($dir . $file) == 'file')
        {
            $newfile = str_replace('[1]', '', $file); 
			//新文件名等于 老文件名 0到— 和.到最后
			$firstp=strpos("$file","_");
			
			$lastp=strpos("$file",".");
			
			
            rename($dir . $file, $dir . substr($file,0,$firstp).substr($file,$lastp));
        }
    }
    closedir($dh);
}