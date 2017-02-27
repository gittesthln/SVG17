<?php
$ruler = '\ItemRuler ';
$dic =array();
$lines = file('yomi.dic');
for($i = 0; $i <count($lines); $i++){
  $d = mb_split("::", trim($lines[$i]),2);
  if(count($d) >1 ) {
    if(array_key_exists($d[1],$dic)) {
      print "$i--{$lines[$i]}";
    } else {
      $dic[$d[1]] = $d[0];
    }
  } else {
      print $i. $lines[$i];
  }
 }
$lines = file("ttt2");
$fp = fopen("ttt","w");
for($i=0; $i<count($lines);$i++) {
  $data=mb_split('::', $lines[$i]);
  if(count($data)==1) {
    fputs($fp, $lines[$i]);
    continue;
  }
  //  print $lines;
  if($data[2] == '') {
    if(count(mb_split('@',$data[1]))>1)
      fputs($fp, "$data[0]$data[1]$data[5]");
    else {
      if(array_key_exists($data[1],$dic)) {
        fputs($fp, $data[0].$dic[$data[1]]."@".$data[1].$data[5]);
      } else {
	//        print "$i---{$data[1]}\n";
        fputs($fp, $data[0].$data[1].$data[5]);
      }
    }
    continue;
  }
  $mes = $data[0];
  switch ($data[3]) {
    case '':
      if(array_key_exists($data[2],$dic)) {
        $mes .= $dic[$data[2]] . '@';
      }
      $mes .=  $data[2] . '!';
      if(array_key_exists($data[1],$dic)) {
        $mes .= $dic[$data[1]] . '@';
      }
      $mes .=  $data[1] . $data[5];
      break;
    case 'E':
      if(array_key_exists($data[2],$dic)) {
        $mes .= $dic[$data[2]] . '@';
      }
      $mes .=  $data[2] . '!';
      if(array_key_exists($data[1],$dic)) {
        $mes .= $dic[$data[1]] . '@';
      }
      $mes .= $data[1] . $data[4] . $ruler . $data[5];
      break;
    case 'T':
      if(array_key_exists($data[2],$dic)) {
        $mes .= $dic[$data[2]] . '@';
      }
      $mes .=  $data[2] . '!';
      if(array_key_exists($data[1],$dic)) {
        $mes .= $dic[$data[1]] . '@';
      }
      $mes .= $ruler . $data[4] . $data[1] . $data[5];
      break;
    }
  fputs($fp, $mes);
}
fclose($fp);

?>
