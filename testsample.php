<?php
$P=$_GET["p"];
for($i=$P*10;$i<$P*10+10;$i++){ ～ }
//解説(2)
if($P>0){
$Prev=$P-1;
$PrevPage="<a href='allitem.php?p={$Prev}'>前の10件</a>";
}
//解説(3)
$Size=sizeof($Data);
if($Size/10-1>$P){
$Next=$P+1;
$NextPage="<a href='allitem.php?p={$Next}'>次の10件</a>";
}
?>