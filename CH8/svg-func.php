<?php
function printHeader($width, $height) {//// ref="printHeaderS"
  print<<<_EOF_
<?xml version="1.0" encoding="utf-8" ?>
   <svg xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        height="$height" width="$width">
   <title>正n角形の表示</title>
_EOF_;//// ref="hereDocumentE"
  $GLOBALS['setTags'] = array("svg");//// ref="initStack"
}//// ref="printHeaderE"
function outputSpaces($n) {//// ref="outputSpacesS"
    print str_repeat('  ', $n);
}                         //// ref="outputSpacesE"

function outputTag($tagName, $attributes, $close=false){//// ref="outputTagS"
  outputSpaces(count($GLOBALS['setTags']));  //// ref="calloutputSpaces0"
  print "<$tagName ";                        //// ref="printOpenTag"
  foreach($attributes as $key => $value ) {  //// ref="printAttribsS"
    print "$key=\"$value\" ";       //// ref="outputKeyVal"
  }                                          //// ref="printAttribsE"
  if($close) {                               //// ref="CheckCloseS"
    print '/';                               //// ref="CheckClose1"
  } else {
    array_push($GLOBALS['setTags'],$tagName);//// ref="pushTag"
  }                                          //// ref="CheckCloseE"
  print ">\n";
}                         //// ref="outputTagE"

function closeTag() {                        //// ref="closeTagS"
  outputSpaces(count($GLOBALS['setTags'])-1);//// ref="calloutputSpaces"
  print '</' . array_pop($GLOBALS['setTags']) . ">\n"; //// ref="printCloseTag"
}                                            //// ref="closeTagE"

function closeSVG() {                        //// ref="closeSVGS"
  while (count($GLOBALS['setTags'])>0) {     //// ref="closeSVG1"
    closeTag();
  }
}                                            //// ref="closeSVGE"
?>