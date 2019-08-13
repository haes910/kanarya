<?php
$user=trim($_POST['user']);
$password=trim($_POST['password']);
$row=$users->login($user,$password);
if ($row!=0) {
	$_SESSION['user_id']=$row['id'];
	header('location:index.php?');
}else{
	echo 'yanlış kullanıcı bilgileri';
}

?>