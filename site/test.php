<?php
$r = "5.4/10";
$r1 = substr($r, 0, 1);
$r2 = substr($r, 2, 1);

$i = 0;
while($i < (int)$r1){
    echo "<img src='src/style/grphx/stars/star.png'/>";
    $i++;
}
echo "<img src='src/style/grphx/stars/,".(int)$r2.".png'/>";

$r3 = 9 - (int)$r1;

$i = 0;
while($i < $r3){
    echo "<img src='src/style/grphx/stars/,0.png'/>";
    $i++;
}

?>
