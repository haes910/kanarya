<div class="list-group">
<?php
$dersler=new Dersler;
$diziDersler=$dersler->dersList();
if (is_array($diziDersler)) {
	foreach ($diziDersler as  $value) {
	echo ' <a href="?dersID='.$value['dersID'].'" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">
	'.$value["dersAdi"].'
	</a>';
}
}

?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dersEkleModal">
	  Yeni Ders Ekle
	</button>
</div>

<!--Ders Ekleme Modal Bş-->	
	<div class="modal fade" id="dersEkleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Yeni Ders Ekle</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form1">
	  <div class="form-group">
	    <label for="dersAd">Ders Adı</label>
	    <input type="text" name="dersAdi" class="form-control" id="dersAd" >
	    
	  </div>
	  <!--gizli input bloğu-->
	  <input type="hidden" name="klasor" value="dersler">
	  <input type="hidden" name="islem" value="form1">

	  
	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
	        <button type="button" id="form1Btn" class="btn btn-primary">Kaydet</button>
	      </div>
	    </div>
	  </div>
	</div>
<!--Ders Ekleme Modal Bt-->
<script type="text/javascript">
	$(function(){
		$('#form1Btn').click(function(){
			$.ajax({
				url:'islem.php',
				type:'POST',
				data:$('#form1').serialize(),
				success:function(data){
					if (data==1) {
						alert('Ders Eklendi');
						location.reload();						
					}else{
						alert('Ders Eklenemedi');
						location.reload();
					}
				}
			});
		});
	});
</script>