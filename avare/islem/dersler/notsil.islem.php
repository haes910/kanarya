<?php
$eylem=new Dersler;
$k=$eylem->notSil($_POST['notID']);
if ($k==1) {
	echo 1;
}else{
	echo 0;
}
?>