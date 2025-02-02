<?php


	class ViewPastPaperModel extends Model {
		public static function getSubjectData(): array|bool {
			$sqlQuery = "SELECT courseCode, name, semester FROM course_module ORDER BY semester";
			$subjects = Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery);

			//initialize the returning array
			if ($subjects) {
				$subjectList = array();
				foreach ($subjects as $row) {
					$newSubject = new courseModule();
					$newSubject->setCourseModule($row['courseCode'], $row['name'], $row['semester']);
					$subjectList[] = $newSubject;
				}
				return $subjectList;
			} else {
				return false;
			}
		}

		public static function getRecentUploads(): array|bool {
			$sqlQuery = "SELECT  subjectCode, yearOfExam, semester, fileName FROM pastpaper ORDER BY paperID DESC LIMIT 15;";
			$recentUploads = Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery);
//        print_r($recentUploads);
			//initialize the returning array
			if ($recentUploads) {
				$pastPaperList = array();
				foreach ($recentUploads as $row) {
					$subjectCode = $row['subjectCode'];
					$sqlQuery = "SELECT name FROM course_module WHERE courseCode='$subjectCode'";
					$subjectName = Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery)[0]['name'];

					if ($subjectName) {
						$newPastPaper = new PastPaper();
						$newPastPaper->setSubjectName($subjectName);
						$newPastPaper->setPastPaper($row['subjectCode'], $row['yearOfExam'], $row['semester'], $row['fileName']);
						$pastPaperList[] = $newPastPaper;
					} else {
						return false;
					}
				}
				return $pastPaperList;
			} else {
				return false;
			}

		}

		public static function showSearchResult($examinationYear, $semester, $subject, $academicYear): array|bool {

			$sqlQuery = "SELECT subjectCode, yearOfExam, semester, fileName FROM pastpaper WHERE";

			//expand the sql query when user entered subject code
			if ($examinationYear != '0') {
				$sqlQuery .= " yearOfExam = $examinationYear AND";
			}
			//out of 4 academic years 1,2 semesters belongs to first year like wise 3,4-> 2 year/ 5,6-> year 3/ 7,8-> year 4
			if ($academicYear == 1 and $semester == 0) {
				$sqlQuery .= " semester=1 OR semester=2 AND";
			} elseif ($academicYear == 2 and $semester == 0) {
				$sqlQuery .= " semester=3 OR semester=4 AND";
			} elseif ($academicYear == 3 and $semester == 0) {
				$sqlQuery .= " semester=5 OR semester=6 AND";
			} elseif ($academicYear == 4 and $semester == 0) {
				$sqlQuery .= " semester=6 OR semester=7 AND";
			}

			//out of 8 semesters 1,3,5,7 are first semesters and 2,4,6,8 considered as second semesters.
			if ($semester == 2 and $academicYear == 0) {
				$sqlQuery .= " semester=2 OR semester=4 OR semester=6 OR semester=8 AND";
			} elseif ($semester == 1 and $academicYear == 0) {
				$sqlQuery .= " semester=1 OR semester=3 OR semester=5 OR semester=7 AND";
			}

			//when search according to semester and academic year
			if ($semester == 1 and $academicYear == 1) {
				$sqlQuery .= " semester=1 AND";
			} elseif ($semester == 2 and $academicYear == 1) {
				$sqlQuery .= " semester=2 AND";
			} elseif ($semester == 1 and $academicYear == 3) {
				$sqlQuery .= " semester=3 AND";
			} elseif ($semester == 2 and $academicYear == 2) {
				$sqlQuery .= " semester=4 AND";
			} elseif ($semester == 1 and $academicYear == 3) {
				$sqlQuery .= " semester=5 AND";
			} elseif ($semester == 2 and $academicYear == 3) {
				$sqlQuery .= " semester=6 AND";
			} elseif ($semester == 1 and $academicYear == 4) {
				$sqlQuery .= " semester=7 AND";
			} elseif ($semester == 2 and $academicYear == 4) {
				$sqlQuery .= " semester=8 AND";
			}

			//expand the sql query when user entered subject code
			if ($subject != '0') {
				$sqlQuery .= " subjectCode = '$subject'";
			}

			//remove the "AND" and "WHERE" at the end of the query
			$sqlQuery = trim($sqlQuery, "AND");
			$sqlQuery = trim($sqlQuery, "WHERE");

			$searchResult = Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery);

			//initialize the returning array
			if ($searchResult) {
				$pastPaperList = array();
				foreach ($searchResult as $row) {
					$subjectCode = $row['subjectCode'];
					$sqlQuery = "SELECT name FROM course_module WHERE courseCode='$subjectCode'";
					$subjectName = Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery)[0]['name'];
					if ($subjectName) {
						$newPastPaper = new PastPaper();
						$newPastPaper->setSubjectName($subjectName);
						$newPastPaper->setPastPaper($row['subjectCode'], $row['yearOfExam'], $row['semester'], $row['fileName']);
						$pastPaperList[] = $newPastPaper;
					} else {
						return false;
					}
				}
				return $pastPaperList;
			} else {
				return false;
			}

		}

	}