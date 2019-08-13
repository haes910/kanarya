<?php 
if (isset($_GET['konuID'])) {
	$icerik=$dersler->icerik($_GET['konuID']);
	$notlar=$dersler->notlar($_GET['konuID']);
}

//

?>

<div id="anaİcerik">
	
  <?php 
if (isset($icerik)) {
	echo '<div class="alert alert-secondary" role="alert">'.$icerik['ana_icerik'].'
	<div class="nav justify-content-end">
<a href="#" class="badge badge-primary" data-toggle="modal" data-target="#notEkle">Not Ekle</a>
<a href="#" class="badge badge-secondary icerikGuncelleBtn" data-toggle="modal"  data-target="#icerikGuncelleModal">İceriği Güncelle</a>
<a href="#" class="badge badge-danger konuSilBtn" id="'.$icerik['konuID'].'">Konuyu Sil</a>
  </div></div>';	
}?>
  <!--buttonlar-->
 
	
</div>
<h4>Notlar</h4>
<div id="icerikNotları">
		<?php 
if (isset($notlar)) {
	foreach ($notlar as  $value) {
			echo '<div class="alert alert-dark" role="alert">
  '.$value["not_icerik"].'<div class="nav justify-content-end">
<a href="#" class="badge badge-secondary notGuncelleBtn" id="'.$value['notID'].'" data-toggle="modal" data-target="#notGuncelleModal">Notu Güncelle</a>
<a href="#" class="badge badge-danger notSilBtn" id="'.$value['notID'].'">Sil</a>


  </div>
</div>';
		}	
}

//

?>
</div>

<!--not ekleme modal bş-->
	<div class="modal fade" id="notEkle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konu İçin Yeni Not Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="islem.php" method="POST">
        	<!--GİZLİ İNPUT BLOĞU-->
        	<input type="hidden" name="klasor" value="dersler">
        	<input type="hidden" name="islem" value="form3">
        	<input type="hidden" name="konuID" value="<?php echo $_GET['konuID'];?>">
        	<input type="hidden" name="dersID" value="<?php echo $_GET['dersID'];?>">
        	 <div class="form-group">
    <label for="not_icerik">Not İçeriğini Giriniz</label>
    <textarea class="form-control" name="not_icerik" id="not_icerik" rows="3"></textarea>
  	        <button type="submit" class="btn btn-primary">Kaydet</button>

  </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
	</div>
<!--not ekleme modal bt-->

<!--not güncelleme modal bş-->
	<div class="modal fade" id="notGuncelleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notu Güncelle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="islem.php" method="POST">
    
        <div class="form-group">
    <label for="not15">Not İçeriği</label>
    <textarea class="form-control"  name="not_icerik" id="not15" rows="3"></textarea>
  </div>
  <!--GİZLİ İNPUT BLOĞU-->
  <input type="hidden" name="islem" value="notGuncelle">
  <input type="hidden" name="klasor" value="dersler">
  <input type="hidden" name="notID" id="not16">
  <input type="hidden" name="dersID" value="<?php echo $icerik['dersID'];?>">
  <input type="hidden" name="konuID" value="<?php echo $icerik['konuID'];?>">


        <button type="submit"  class="btn btn-primary">Güncelle</button>
	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
      </div>
    </div>
  </div>
	</div>
<!--not güncelleme modal bt-->

<!--ana içeriği güncelle bş-->
<div class="modal fade" id="icerikGuncelleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">İçeriği Güncelle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="islem.php" method="POST">
    
        <div class="form-group">
    <label for="icerik15">Not İçeriği</label>
    <textarea class="form-control"  name="ana_icerik" id="icerik15" rows="4"><?php echo $icerik['ana_icerik'] ;?></textarea>
  </div>
  <!--GİZLİ İNPUT BLOĞU-->
  <input type="hidden" name="islem" value="icerikGuncelle">
  <input type="hidden" name="klasor" value="dersler">
 
  <input type="hidden" name="dersID" value="<?php echo $icerik['dersID'];?>">
  <input type="hidden" name="konuID" value="<?php echo $icerik['konuID'];?>">


        <button type="submit"  class="btn btn-primary">Güncelle</button>
	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
      </div>
    </div>
  </div>
</div>
<!--ana içeriği güncelle bt-->
<script type="text/javascript">//noto silmek içim kullanılır
	$(function(){
		$('.notSilBtn').click(function(){
			var notID=$(this).attr('id');
			var klasor='dersler';
			var islem='notSil';
		
			$.ajax({
				url:'islem.php',
				type:'POST',
				data:{notID:notID,klasor:klasor,islem:islem},
				success:function(data){
					
					if (data==1) {
						alert('seçili not silindi');
						location.reload();
					}else{
						alert('seçili not silinemedi');
						location.reload();
					} 
				}
			});
		});
	});
</script>

<script type="text/javascript">//konu silmek içim kullanılır
	$(function(){
		$('.konuSilBtn').click(function(){
			var konuID=$(this).attr('id');
			var klasor='dersler';
			var islem='konuSil';
		
			$.ajax({
				url:'islem.php',
				type:'POST',
				data:{konuID:konuID,klasor:klasor,islem:islem},
				success:function(data){
					
					if (data==1) {
						alert('seçili konu silindi');
						location.reload();
					}else{
						alert('seçili konu silinemedi');
						location.reload();
					} 
				}
			});
		});
	});
</script>

<script type="text/javascript">//tek noto getir güncellemek içim kullanılır
	$(function(){
		//önce id kullarak notun içeriğini tespit ederim
		$('.notGuncelleBtn').click(function(){
			var notID=$(this).attr('id');
			var klasor='dersler';
			var islem='tekGetir';
			var getir='not';
			$.ajax({
				url:'islem.php',
				type:'POST',
				dataType:'JSON',
				data:{notID:notID,klasor:klasor,islem:islem,getir:getir},
				success:function(data){					
					$('#not15').append(data['not_icerik']);
					$('#not16').val(data['notID']);
				}
			});
		});
		
		});
</script>