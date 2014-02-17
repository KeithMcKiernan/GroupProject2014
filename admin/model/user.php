<?php 

class ModelUser extends Model {

	// Not finished
	public function addUser() {
		$this->$db->query("INSERT INTO '" . DB_NAME . "members'");
	}
	// Not finished
	public function deleteUser() {
		$this->$db->query("DELETE FROM '" . DB_NAME . "members' WHERE user_id = '");
	}


}