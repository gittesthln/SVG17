<?php
    $L1 = <<<_EOF_
%!PS-Adobe-3.0 EPSF-3.0
%%BoundingBox: 7 7 33 33
%%Title: C:\\usr\\local\\home\\tel\\JTEXFILE\\SVG08\\Appendix\\colorex.ps
%%Creator: GSview from C:\\usr\\local\\home\\tel\\JTEXFILE\\SVG08\\Appendix\\colorex.ps
%%CreationDate: Mon Feb 11 22:06:48 2008
%%Pages: 1
%%EndComments
%%Page: 1 1
%%BeginDocument: C:\\usr\\local\\home\\tel\\JTEXFILE\\SVG08\\Appendix\\colorex.ps
/S 20 def
10 10 translate
3 setlinewidth
0 0 moveto S 0 lineto S S lineto 0 S lineto closepath
gsave
stroke
grestore

_EOF_;
    //1 0 0 setrgbcolor fill
$L2= <<<_EOF_
%%EndDocument
%%Trailer
_EOF_;
$fp = fopen("color2.tex",'r');
$fpout = fopen("color-f.tex",'w');
while(!feof($fp)) {
  $line = trim(fgets($fp,1024));
  if($line !="") {
    preg_match('/^([a-z]+)\s.*?(\d+),.*?(\d+),.*?(\d+)/',$line,$match);
    fprintf($fpout,"\\G{%s}&%s& \\texttt{rgb(%3d,%3d,%3d)}& \\texttt{\\#%1X%1X%1X%1X%1X%1X}\\\\\\hline\n",
        $match[1],$match[1],$match[2],$match[3],$match[4],
	   $match[2]>>4,$match[2]&0xF,
           $match[3]>>4,$match[3]&0xF,
           $match[4]>>4,$match[4]&0xF);
    $fp2 = fopen($match[1].'.eps','w');
    fputs($fp2,$L1);
    fputs($fp2,sprintf("%.3f %.3f %.3f setrgbcolor fill\n",
		       $match[2]/255,$match[3]/255,$match[4]/255));
    fputs($fp2,$L2);
    fclose($fp2);
  }
}
?>