<?php
$lines = file("{$argv[1]}.aux");
$info = array();
for($i=0;$i<count($lines);$i++) {
  if(mb_ereg_match("^\\\\newlabel",$lines[$i])) {
    list($d1,$label,$no,$page) = mb_split("({+)|(}{+)",$lines[$i]);
    $info[$label] = array($no, $page);
  }
}
$data = file("{$argv[1]}-answer.tex");
for($i=0;$i<count($data);$i++) {
  if(mb_substr($data[$i],0,2) === "##") {
    list($d,$d2,$label) = mb_split("({+)|(}{+)",$data[$i]);
    printf("\ListFile%s{%s}{%s}\n",mb_substr($data[$i],2),$info[$label][0],$info[$label][1]);
  } else {
    print $data[$i];
  }
}
?>
