<?php
date_default_timezone_set("Asia/Tokyo");
$today = date("Y年n月j日改定");
$T = date("Y");
print <<<_EOL_
<!DOCTYPE html>
<head>
<meta charset="utf-8">
  <title>情報メディア演習I--SVGではじめるGraphical Web({$T}年度版)</title>
</head>
<body>
$today
<A href="http://www.hilano.org/hilano-lab">平野研究室トップへ</A>
<H1>授業配布資料</H1>
<p>pdfファイルからソースがコピーできます。
解答のほうは更新していません。</p>

<p>pdfファイルの中にリンクが張ってあります。</p>
<UL>
<LI><A href="00svg-all.pdf">授業配布資料</A></LI>
<LI><A href="00svg-all-ans.pdf">授業配布資料の解答</A></LI>
<LI><A href="media-enshuu.pdf">メディア演習Iの課題</A></LI>
</UL>
<H1>予習教材</H1>
<table>
<th><td>ビデオ教材</td><td>ビデオ内のPDFファイル</td></th>
<tr><td><a href="SVG16-01-1.mp4">SVGとは</a></td>
<td><a href="SVG16-01-1.pdf">SVGとは</a></td></tr>
<tr><td><a href="SVG16-01-2.mp4">SVGの例</a></td>
<td><td><a href="SVG16-01-2.pdf">SVGの例</a></td></tr>
</table>
<H1>SVGの例</H1>
授業用資料の中にあるSVGファイルの例を見ることができます。
_EOL_;

$files = file($argv[1]);
$OCH = "";
$CNT = -1;
for($i=0;$i<count($files);$i++) {
  $line = $files[$i];
  $line = mb_convert_encoding($line,"UTF-8","SJIS");
  if($line == "") continue;
  if(mb_strpos($line, '{lll}')=== false) {
    continue;
  }
  $dd = mb_split("{|(}{)",$line,5);
  list($kind,$No,$caption,$filename) = mb_split('::',$dd[4]);
  list($filename) = mb_split('}',$filename);
  //  print "$kind $No $caption $filename\n";
  //  continue;
  list($CH,$fn) = mb_split('/',$filename);
  if($OCH !== $CH) {
    if($OCH !== "") {
      if($CNT === 0) print "</tr>\n";
      print "</table>\n";
    }
    print "<h2>第" . mb_substr($CH,2)."章</h2>\n<table>\n";
    $OCH = $CH;
    $CNT = 0;
  }
  if(!file_exists("HP/$fn") ||
     filemtime("HP/$fn")<filemtime("$filename.ref")) {
    copy("$filename.ref", "HP/$fn");
//    print "$fn\n";
  }
  $caption = mb_ereg_replace("\\\\[A-Za-z]+\b","",$caption);
  $caption = mb_ereg_replace("{|}|(\\\\')|\$","",$caption);
  $caption = mb_ereg_replace("<","&lt;",$caption);
  $caption = mb_ereg_replace(">","&gt;",$caption);
  $caption = mb_ereg_replace("[$]","",$caption);
  switch($CNT) {
    case 0:
      $CNT = 1;
      print "<tr><td>リスト$No</td>";
      print "<td><a href=\"$fn\">$caption</a></td>\n";
      break;
    case 1:
      $CNT = 0;
      print "<td>リスト$No</td>";
      print "<td><a href=\"$fn\">$caption</a></td></tr>\n";
    }
}
if($CNT === 0) print "</tr>\n";
print "</table>\n";
print <<<_EOL_
<H1>授業用資料</H1>
<a href="svg-bezier-interact.xml">Bezier 曲線を操作する</a>
</body></html>
_EOL_;

?>