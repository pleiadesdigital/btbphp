<?php 
	require_once(LIB_PATH.DS.'database.php');

	/**
	* 
	*/
	class User extends DatabaseObject {

		protected static $table_name = "users";
		public $id;
		public $username;
		public $password;
		public $first_name;
		public $last_name;

		public function full_name() {
			if (isset($this->first_name) && isset($this->last_name)) {
				return $this->first_name . " " . $this->last_name;
			} else {
				return "";
			}
		} /*full_name()*/ 

		public static function authenticate($username = "", $password = "") {
			global $database;
			$username = $database->escape_value($username);
			$password = $database->escape_value($password); 

			$sql = "SELECT * FROM users ";
			$sql .= "WHERE username = '{$username}' ";
			$sql .= "AND password = '{$password}' ";
			$sql .= "LIMIT 1";
			$result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
		} //function authenticate


		// Common database methods
		public static function find_all() {
			return self::find_by_sql("SELECT * FROM " . self::$table_name);
			// returns everything...	
		} //find_all()

		public static function find_by_id($id=0) {
			global $database;
			$result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE id={$id} LIMIT 1");
			return !empty($result_array) ? array_shift($result_array) : false;
		} //find_by_id($id=0)

		public static function find_by_sql($sql="") {
			global $database;
			$result_set = $database->query($sql);
			$object_array = array();
			while ($row = $database->fetch_array($result_set)) {
				$object_array[] = self::instantiate($row);
			} //endwhile
			return $object_array;
		} /*find_by_sql($sql="")*/

		private static function instantiate($record) {
			$object = new self;

			// Simple long-form approach

			/*$object->id 					= $record["id"];
			$object->username 		= $record["username"];
			$object->password 		= $record["password"];
			$object->first_name 	= $record["first_name"];
			$object->last_name 		= $record["last_name"];*/

			// More dynamic short-form approach

			foreach ($record as $attribute => $value) {
				if ($object->has_attribute($attribute)) {
					$object->$attribute = $value;
				} // endif
			} //endforeach


			return $object;
		} /*instantiate($record)*/

		private function has_attribute($attribute) {
			$object_vars = get_object_vars($this);
			return array_key_exists($attribute, $object_vars);
		} /*has_attribute($attribute)*/


	} //class User



