<?php
// postları yakala ve kontrol et
//print_r($_POST);
$dizi=array($_POST['konuID'],
			trim($_POST['not_icerik']));
$eylem=new Dersler;
$k=$eylem->notEkle($dizi);
if ($k==1) {
	header('location:index.php?dersID='.$_POST['dersID'].'&konuID='.$_POST['konuID']);
}

?>