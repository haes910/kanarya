<?php
if (isset($_POST['getir'])) {

	$eylem=new Dersler;	
	$getir=$_POST['getir'];

	switch ($getir) {
		case 'not':		
			$dizi=$eylem->tekGetir('konunotlari','notID',$_POST['notID']);
			echo json_encode($dizi);
			break;
		
		default:
			# code...
			break;
	}
}
?>