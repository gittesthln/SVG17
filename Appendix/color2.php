<?php
$fp = fopen("color.tex",'r');
$fpout = fopen("color-ff.tex",'w');
while(!feof($fp)) {
  $line = trim(fgets($fp,1024));
  if($line !="") {
    preg_match('/^([a-z]+)\s.*?(\d+),.*?(\d+),.*?(\d+)/',$line,$match);
    fprintf($fpout,"\\G{%s}{(%3d,%3d,%3d)}{\\#%1X%1X%1X%1X%1X%1X}{%5.3f,%5.3f,%5.3f}\n",
        $match[1],$match[2],$match[3],$match[4],
	   $match[2]>>4,$match[2]&0xF,
           $match[3]>>4,$match[3]&0xF,
	    $match[4]>>4,$match[4]&0xF,
	    $match[2]/255,$match[3]/255,$match[4]/255);
  }
}
?>