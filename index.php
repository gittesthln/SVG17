<?php
$ruler = '\ItemRuler ';
$dic =array();
$fp = fopen('yomi.dic','r');
while($line = fgets($fp)) {
  $d = mb_split(" ", trim($line),2);
  if(count($d) >1 ) {
    $dic[$d[1]] = $d[0];
  }
 }
fclose($fp);
$fp = fopen($argv[1],"r");
$fpo = fopen("ttt","w");
while(!feof($fp)) {
  $line = fgets($fp,1024);
  $data=mb_split('::', $line);
  if(count($data)==1) {
    fputs($fpo, $line);
    continue;
  }
  //    print $line;
  if($data[2] == '') {
    if(count(mb_split('@',$data[1]))>1)
      fputs($fpo, "$data[0]$data[1]$data[6]");
    else {
      if(array_key_exists($data[1],$dic)) {
        fputs($fpo, $data[0].$dic[$data[1]]."@".$data[1].$data[6]);
      } else 
        fputs($fpo, $data[0].$data[1].$data[6]);
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
      $mes .=  $data[1] . $data[6];
      break;
    case 'E':
      if(array_key_exists($data[2],$dic)) {
        $mes .= $dic[$data[2]] . '@';
      }
      $mes .=  $data[2] . '!';
      if(array_key_exists($data[1],$dic)) {
        $mes .= $dic[$data[1]] . '@';
      }
      $mes .= $data[1] . $data[4] . $ruler . $data[6];
      break;
    case 'T':
      if(array_key_exists($data[2],$dic)) {
        $mes .= $dic[$data[2]] . '@';
      }
      $mes .=  $data[2] . '!';
      if(array_key_exists($data[1],$dic)) {
        $mes .= $dic[$data[1]] . '@';
      }
      $mes .= $ruler . $data[4] . $data[1] . $data[6];
      break;
    }
  fputs($fpo, $mes);
}
fclose($fp);
fclose($fpo);

?>
