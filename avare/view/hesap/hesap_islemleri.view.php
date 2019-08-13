<div class="container">
	<div class="row">
		<div class="col-md-4">
			sol yan
		</div>
		<div class="col-md-8">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Ders Adı</th>
			      <th scope="col">İslemler</th>      
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  	$dersler=new Dersler;
			  	$dizi=$dersler->dersList();
			  	foreach ($dizi as  $value) { ?>
			  		 <tr>
			      <th scope="row">1</th>
			      <td><?php echo $value['dersAdi'];?></td>
			      <td>
			      	<button type="button" class="badge badge-danger btnSil" id="<?php echo $value['dersID'];?>" >Sil</button>					
			      </td>			      
			    </tr>
			  	<?php }
			  	?>			    
			  </tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('.btnSil').click(function(){
			var dersID=$(this).attr('id');
			var klasor='dersler';
			var islem='dersSil';
			
			$.ajax({
				url:'islem.php',
				type:'POST',
				data:{dersID:dersID,klasor:klasor,islem:islem},
				success:function(data){
					if (data==1) {
						location.reload();
						
					}
				}
			});
		});
	});
</script>