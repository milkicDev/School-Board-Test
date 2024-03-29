<?php
	namespace School\DbClass;

	class connection {
		private static $conn, $db_name;

		public static function Insert($query, $database = db_name) {
			self::$db_name = $database;
			self::OpenConnection();

			self::$conn->query($query);

			self::CloseConnection();
		}

		public static function Select($query, $database = db_name) {
			self::$db_name = $database;
			self::OpenConnection();

			$result = self::$conn->query($query);

			self::CloseConnection();

			return $result;
		}

		public static function Update($query, $database = db_name) {
			self::$db_name = $database;
			self::OpenConnection();

			self::$conn->query($query);

			self::CloseConnection();
		}

		public static function Remove($query, $database = db_name) {
			self::$db_name = $database;
			self::OpenConnection();

			self::$conn->query($query);

			self::CloseConnection();
		}

		public static function OpenConnection() {
			self::$conn = new \mysqli(db_host, db_user, db_pass, db_name);

			if (self::$conn->connect_error) {
				die('FATAL ERROR MYSQLI: '. self::$conn->connect_errno .' - '. self::$conn->connect_error);
			}
		}

		public static function CloseConnection() {
			self::$conn->close();
		}
	}
?>