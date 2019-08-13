<?php
/**
 * 
 */
class Dersler extends Dbh

{
	//tekli ders sil bş
		public function dersSil($p1){

			//derse ait bütün konuları tespit et
			$dizi=self::konuList($p1);
			foreach ($dizi as $value) {
				self::konuSil($value['konuID']);
			}
			
		$sql='DELETE FROM dersler 
			  where dersID=?';
		$deyim=parent::db()->prepare($sql);
		$k=$deyim->execute([$p1]);
			
		if ($k==1) {
			return 1;
		}
		
	

	}
	//tekli ders sil bt
	//tekli konu sil bş
		public function konuSil($p1){
		$sql='DELETE FROM konular 
			  where konuID=?';
		$deyim=parent::db()->prepare($sql);
		$k=$deyim->execute([$p1]);
		//
		$sql='DELETE FROM konunotlari 
			  where konuID=?';
		$deyim=parent::db()->prepare($sql);
		$t=$deyim->execute([$p1]);

		if ($k==1 and $t==1) {
			return 1;
		}else{
			return 0;
		}
	}
	//tekli konu sil bt
	//konu icerik guncelle bş
	public  function konuGuncelle($dizi=[]){
		$sql='UPDATE konular
					set ana_icerik=?
				WHERE konuID=?';
		$deyim=parent::db()->prepare($sql);
		$k=$deyim->execute($dizi);
		if ($k==true) {
			return 1;
		}else{
			return 0;
		}
		
	}
	//konu icerik guncelle bt
	//not guncelle bş
	public  function notGuncelle($dizi=[]){
		$sql='UPDATE konunotlari
					set not_icerik=?
				WHERE notID=?';
		$deyim=parent::db()->prepare($sql);
		$k=$deyim->execute($dizi);
		if ($k==true) {
			return 1;
		}else{
			return 0;
		}
		
	}
	//not guncelle bt
	// tek getir bş
	public  function tekGetir($tablo,$kolon,$deger){
		$sql='SELECT * FROM '.$tablo.'
			  where '.$kolon.'=?';
		$deyim=parent::db()->prepare($sql);
		$deyim->execute([$deger]);
		$row=$deyim->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
	// tek getir bt
	//tekli not sil bş
		public function notSil($p1){
		$sql='DELETE FROM konunotlari 
				where notID=?';
		$deyim=parent::db()->prepare($sql);
		$k=$deyim->execute([$p1]);
		if ($k==1) {
			return 1;
		}else{
			return 0;
		}
	}
	//tekli not sil bt
	//not ekle bş
	public function notEkle($dizi=[]){
		$sql='INSERT INTO konunotlari 
				set	konuID=?,
					not_icerik=?';
		$deyim=parent::db()->prepare($sql);
		$k=$deyim->execute($dizi);
		if ($k==1) {
			return 1;
		}else{
			return 0;
		}
	}
	//not ekle bt
	//yeni konu ekle bş
		public function konuEkle($dizi=[]){
		$sql='INSERT INTO konular 
				set	dersID=?,
					konuAdi=?,
					ana_icerik=?';
		$deyim=parent::db()->prepare($sql);
		$k=$deyim->execute($dizi);
		if ($k==1) {
			return 1;
		}else{
			return 0;
		}
	}
	//yeni konu ekle bt
	// yeni ders ekle bş
	public function dersEkle($dizi=[]){
		$sql='INSERT INTO dersler 
				set	dersAdi=?';
		$deyim=parent::db()->prepare($sql);
		$k=$deyim->execute($dizi);
		if ($k==1) {
			return 1;
		}else{
			return 0;
		}
	}
	// yeni ders ekle bt
	//iceriğe ait notları al bş
	public  function notlar($p1){
		$sql='SELECT * FROM konunotlari
			  where konuID=?';
		$deyim=parent::db()->prepare($sql);
		$deyim->execute([$p1]);
		$adet=$deyim->rowCount();
		if ($adet>0) {
			$dizi=array();
			$x=0;
			while ($row=$deyim->fetch(PDO::FETCH_ASSOC)) {
				$dizi[$x]=$row;
				$x++;
			}
			return $dizi;
		}
	}
	//iceriğe ait notları al bt
	//icerik alma bş
	public  function icerik($p1){
		$sql='SELECT * FROM konular
			  where konuID=?';
		$deyim=parent::db()->prepare($sql);
		$deyim->execute([$p1]);
		$row=$deyim->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
	//icerik alma bt
	// konu listeleri bş
	public  function konuList($p1){
		$sql='SELECT * FROM konular
			  where dersID=?';
		$deyim=parent::db()->prepare($sql);
		$deyim->execute([$p1]);
		$adet=$deyim->rowCount();
		if ($adet>0) {
			$dizi=array();
			$x=0;
			while ($row=$deyim->fetch(PDO::FETCH_ASSOC)) {
				$dizi[$x]=$row;
				$x++;
			}
			return $dizi;
		}
	}
	// konu listeleri bt
	public  function dersList(){
		$sql='SELECT * FROM dersler';
		$deyim=parent::db()->prepare($sql);
		$deyim->execute();
		$adet=$deyim->rowCount();
		if ($adet>0) {
			$dizi=array();
			$x=0;
			while ($row=$deyim->fetch(PDO::FETCH_ASSOC)) {
				$dizi[$x]=$row;
				$x++;
			}
			return $dizi;
		}
	}
}