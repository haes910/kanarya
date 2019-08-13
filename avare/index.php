
<?php
session_start();
include "init.php";
include "header.php";
if (isset($_SESSION['user_id'])) {
	
	include "view.php";
	
}else{
	include "login.php";
}
include "footer.php";

?>