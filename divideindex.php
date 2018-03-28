<?php

$indexfiles=array("","SVG","JS","HTML","PHP","XML");
$Files = array();
foreach($indexfiles as $v){
  $Files[$v] = fopen("index$v.idx","w");
}
$lines = file("{$argv[1]}.idx"); 
for($i=0;$i<count($lines);$i++) {
  $data=mb_split("::",$lines[$i]);
  if(count($data) == 1) {
    fputs($Files[""], $lines[$i]);
    continue;
  }
//  print ":$i::".count($data);
  if(count($data) !=7) {
      print "$i\n";
      continue;
  }
  $ff = $Files[$data[5]];
  unset($data[5]);
  //  print "$i ";
  fputs($ff,implode("::",$data));
}

?>