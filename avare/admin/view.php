
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<?php include 'view/navbar.view.php'; ?>
		</div>
	</div> 
</div>
<br>  

<div class="container">

	<div class="row">
		<?php
		if (isset($_GET['sayfa'])) {
			$sayfa=$_GET['sayfa'];
			include 'view/'.$sayfa.'.view.php';
		}else{ ?>
				<div class="col-md-2">
			<?php
				include 'view/dersler/dersler.view.php';
			?>
		</div>		
		<div class="col-md-3">
		<?php
				include 'view/dersler/konular.view.php';
			?>
		</div>		
		<div class="col-md-7">
		<?php
				include 'view/dersler/icerik.view.php';
			?>	
		</div>
		<?php }
		?>
			
	</div>
 
</div>




