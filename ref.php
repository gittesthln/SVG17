<?php
$files = file($argv[1]);
for($i=0;$i<count($files);$i++) {
  $line = $files[$i];
  if($line == "") continue;
  list($data) = mb_split(' ',trim($line));
  if($data == "") continue;
  $dd = mb_split(',',trim($data));
  $filename = $dd[0];
  $fnrep = preg_replace('#[/.]#', '-', $filename);
  $lines = file($filename);
  if( count($dd) == 1) {
    if(file_exists("$filename.ref") &&
        filemtime($filename)<filemtime("$filename.ref")) continue;
    print "$filename\n";
    $fp0 = fopen("$filename.ref",'w');
    $GLOBALS['lineNo'] = 0;
    $GLOBALS['res'] = '';
    for($j=0;$j<count($lines);$j++) {
      $GLOBALS['lineNo']++;
      $nline = removeref($lines[$j]);
      fputs($fp0,$nline);
    }
    fclose($fp0);
    $fp = fopen("$filename.tex", 'w');
    fputs($fp,$GLOBALS['res']);
    fclose($fp);
  } else {
    $start = $dd[1];
    $end = $dd[2];
    if(file_exists("$filename.$start-$end") &&
       filemtime($filename)<filemtime("$filename.$start-$end")) continue;
    print "$filename.$start-$end\n";
    $fp = fopen("$filename", 'r');
    $fp0 = fopen("$filename.$start-$end",'w');
    $search = '/\sref.*="' . $start . '"/';
    while(!feof($fp)) {
      $line = fgets($fp,1024);
      if(preg_match($search, $line)) break;
    }
    $nline = removeref($line);
    fputs($fp0,$nline);
    $search = '/\sref.*="' . $end . '"/';
    while(!feof($fp)) {
      $line = fgets($fp,1024);
      $nline = removeref($line);
      fputs($fp0,$nline);
      if(preg_match($search, $line)) break;
    }
    fclose($fp);
    fclose($fp0);
  }
}
function prout($s) {
  $n = mb_split('"', $s[0]);
  $GLOBALS['res'] .= 
     sprintf("\DefLabel{%d}{%s-%s}\n",$GLOBALS['lineNo'],
	      $GLOBALS['fnrep'],$n[1]);
  return '';
}
function removeref($L) {
  $nline = preg_replace_callback('/\sref\S*="[^"]*"/', 'prout', $L);
  $nline = preg_replace('/<!--\s*-->/', '', $nline);
  $nline = preg_replace('#/\*\s*\*/#', '', $nline);
  return preg_replace('#////#', '', $nline);
}
?>