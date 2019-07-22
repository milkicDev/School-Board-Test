<?php
	namespace School\StudentClass;

	require_once 'includes/db.class.php';
	use School\DbClass\connection as connection;

	class Student {
		private $ID;

		public function __construct($ID = null) {
			$this->ID = $ID;
		}

		public function getStudentData() {
			if (ISSET($this->ID)) {
				$query = sprintf("SELECT s.*, g.grades, g.description FROM student s INNER JOIN student_grades g ON g.student = s.ID WHERE s.ID = '%s' ORDER BY g.grades desc", $this->ID);
			} else {
				$query = sprintf("SELECT s.* FROM student s");
			}

			$result = connection::Select($query);
			return $result;
		}

		public function getStudentGrades() {
			if (ISSET($this->ID)) {
				$query = sprintf("SELECT grades, description FROM student_grades g WHERE g.student = '%s'", $this->ID);
			}

			$result = connection::Select($query);
			return $result;
		}
	}
?>