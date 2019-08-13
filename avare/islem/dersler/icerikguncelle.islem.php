<?php
$dizi=array(trim($_POST['ana_icerik']),
			$_POST['konuID']);
$k=$dersler->konuGuncelle($dizi);

if ($k==1) {
	header('location:index.php?dersID='.$_POST['dersID'].'&konuID='.$_POST['konuID']);
}
?>