 <?php 
	require_once('database.php');

	class DatabaseObject {


		// Common database methods
		public static function find_all() {
			return static::find_by_sql("SELECT * FROM " . static::$table_name);
			// returns everything...	
		} //find_all()

		public static function find_by_id($id=0) {
			global $database;    
			$result_array = static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE id={$id} LIMIT 1");
			return !empty($result_array) ? array_shift($result_array) : false;
		} //find_by_id($id=0)

		public static function find_by_sql($sql="") {
			global $database;
			$result_set = $database->query($sql);
			$object_array = array();
			while ($row = $database->fetch_array($result_set)) {
				$object_array[] = static::instantiate($row);
			} //endwhile
			return $object_array;
		} /*find_by_sql($sql="")*/

		private static function instantiate($record) {
			// another way to do it (below)
			/*
			$class_name = get_called_class();
			$object = new $class_name;
			*/
			$object = new static;

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

	} 