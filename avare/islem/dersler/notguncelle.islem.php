<?php
$dizi=array(trim($_POST['not_icerik']),
			$_POST['notID']);
$k=$dersler->notGuncelle($dizi);

if ($k==1) {
	header('location:index.php?dersID='.$_POST['dersID'].'&konuID='.$_POST['konuID']);
}
?>