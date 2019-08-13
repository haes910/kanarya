<?php
$dizi=array($_POST['dersAdi']);
$eylem=new Dersler;
$k=$eylem->dersEkle($dizi);
if ($k==1) {
	echo 1;
}else{
	echo 0;
}

?>