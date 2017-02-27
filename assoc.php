<?php

print <<<_EOL_
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>連想配列</title>
</head>
<body>
_EOL_;
$name = {"red":"赤";"black":"黒"};

foreach($name as $key=>$value) {
  print "{$key}の意味は{$value}です。<br/>";
}
print <<<_EOL_
</body>
</html>
_EOL_;
?>
