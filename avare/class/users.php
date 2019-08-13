<?php
/**
 * 
 */
class Users extends Dbh
{
	
	public function login($p1,$p2) {
		$sql='SELECT * FROM users
			  where user=? and password=?';
		$deyim=parent::db()->prepare($sql);
		$deyim->execute([$p1,$p2]);
		$row=$deyim->fetch(PDO::FETCH_ASSOC);
		if ($row) {
			return $row;
		}else{
			return 0;
		}
		
	}
}