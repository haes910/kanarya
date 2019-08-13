<?php

$k=$dersler->konuSil($_POST['konuID']);
if ($k==1) {
	echo 1;
}else{
	echo 0;
}
?>