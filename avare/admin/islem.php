<?php
session_start();
include "init.php";
$dersler=new Dersler;

if (isset($_POST['klasor']) and isset($_POST['islem'])) {
	$klasor=$_POST['klasor'];
	$islem=$_POST['islem'];
	include 'islem/'.$klasor.'/'.$islem.'.islem.php';
}
?>