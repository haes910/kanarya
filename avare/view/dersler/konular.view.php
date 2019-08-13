<div class="list-group">
<?php
if (isset($_GET['dersID'])) {
	echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konuEkleModal">
	  Yeni Konu Ekle
	</button>';
	$diziKonular=$dersler->konuList($_GET['dersID']);
	if (is_array($diziKonular)) {
		foreach ($diziKonular as  $value) {	
	echo ' <a href="?dersID='.$value['dersID'].'&konuID='.$value['konuID'].'" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">
	'.$value["konuAdi"].'
	</a>'; 
}
	}

}

?>

</div>

<!--Ders Ekleme Modal Bş-->	
	<div class="modal fade" id="konuEkleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Ders İçin Yeni Konu Ekle</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form2">
	  <div class="form-group">
	    <label for="konuAdi">Konu Adı</label>
	    <input type="text" name="konuAdi" class="form-control" id="konuAdi" >
	   </div>

	     <div class="form-group">
    <label for="ana_icerik">Konu İçeriği</label>
    <textarea class="form-control" name="ana_icerik" id="ana_icerik" rows="3"></textarea>
  </div>

	  <!--gizli input bloğu-->
	  <input type="hidden" name="klasor" value="dersler">
	  <input type="hidden" name="islem" value="form2">
	  <input type="hidden" name="dersID" value="<?php echo $_GET['dersID'];?>">

	  
	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
	        <button type="button" id="form2Btn" class="btn btn-primary">Kaydet</button>
	      </div>
	    </div>
	  </div>
	</div>
<!--Ders Ekleme Modal Bt-->
<script type="text/javascript">
	$(function(){
		$('#form2Btn').click(function(){
			$.ajax({
				url:'islem.php',
				type:'POST',
				data:$('#form2').serialize(),
				success:function(data){
					if (data==1) {
						alert('Konu Eklendi');
						location.reload();						
					}else{
						alert('Konu Eklenemedi');
						location.reload();
					}
				}
			});
		});
	});
</script>