<?php
$dizi=array($_POST['dersID'],
			$_POST['konuAdi'],
			$_POST['ana_icerik']);
$eylem=new Dersler;
$k=$eylem->konuEkle($dizi);
if ($k==1) {
	echo 1;
}else{
	echo 0;
}

?>