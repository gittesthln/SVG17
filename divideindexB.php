<?php
$fp = fopen($argv[1].'00.idx',"w");
$fpin = fopen($argv[1].'.idx',"r"); 
while(!feof($fpin)) {
  $line = fgets($fpin,1024);
  $data=mb_split("::",$line);
  if(count($data) == 1) {
    fputs($fp, $line);
    continue;
  }
  $ff = "fp" . $data[5];
  unset($data[5]);
  fputs($fp,implode("::",$data));
}

?>