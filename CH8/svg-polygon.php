<?php
require_once('svg-func.php');//// ref="requireonece"
function drawPath() {//// ref="drawPathS"
  $N = $_GET['N'];   //// ref="GET"
  $pathString = MaxSize . ',0';  //// ref="initString"
  for( $i = 1; $i < $N; $i++) {  //// ref="calcS"
    $Angle = M_PI*(2.0*$i/$N);   //// ref="toRad"
    $pathString .= 
      sprintf(' %.4f,%.4f', MaxSize*cos($Angle), MaxSize*sin($Angle));  //// ref="toString"
  }                               //// ref="calcE"
  outputTag('polygon',             //// ref="calloutputTagS"
	    array('points'=>$pathString, 'fill'=>'blue', 
		  'stroke-width'=>4, 'stroke'=>'red')); //// ref="calloutputTagE"
}                  //// ref="drawPathE"
define("MaxSize",200);//// ref="define"
header("Content-type: image/svg+xml");//// ref="header"
printHeader('100%','100%');           //// ref="startSVG"
outputTag('g', array('transform'=>'translate(210,210)'));//// ref="outputG"
drawPath();//// ref="callPolygon"
closeSVG(); //// ref="closeTag"
?>