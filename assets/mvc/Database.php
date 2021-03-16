<?php
	require_once('Model.php');

	class Database {

		private static string $serverStatic = "localhost";
		private static string $databaseStatic = "ussp";
		private string $server = "localhost";
		private string $database = "ussp";
		private bool $transactionState = true;
		private mysqli $connection;
		private string $auditDescription = "";
		private string $descriptionMessages = "";

		public static function getServerStatic(): string {
			return self::$serverStatic;
		}

		public static function getDatabaseStatic(): string {
			return self::$databaseStatic;
		}

		public static function executeQuery($userName, $password, $sqlQuery): bool|array {
			try {
				$connection = self::connect($userName, $password);
				$result = $connection->query($sqlQuery);
				//check weather query success
				if ($result) {
					if ($result !== TRUE) {
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
					} else {
						$data = TRUE;
					}
					$connection->close();
					return ($data);
				} else {
					throw new mysqli_sql_exception("Query Failed.");
				}
			} catch (Exception $exception) {
				echo("Exception ::: << " . $exception->getMessage() . " >>  " . $exception->getTraceAsString());
				return array();
			}
		}

		private static function connect($userName, $password): mysqli {
			//stop show warning
			error_reporting(E_ERROR | E_PARSE);
			$conn = new mysqli(self::$serverStatic, $userName, $password, self::$databaseStatic);
			if ($conn->connect_errno) {
				echo("Exception ::: << " . $conn->connect_error . " >>");
				exit();
			}
			return $conn;
		}

//        transaction management functions

		public function establishTransaction($userName, $password) {
			error_reporting(E_ERROR | E_PARSE);
			$conn = new mysqli($this->server, $userName, $password, $this->database);
			if ($conn->connect_errno) {
				echo("Exception ::: << " . $conn->connect_error . " >>");
				exit();
			} else {
//                assign connection values to variable
				$this->connection = $conn;
//                turn off auto commit
				$this->connection->autocommit(false);
			}
		}

		public function commitToDatabase($user = ''): bool {
//        take from cookies
			if (isset($_COOKIE['userName']))
				$user = $_COOKIE['userName'];
//        get log description
			$description = $this->auditDescription;
//			get current timestamp
			$timestamp = date("Y-m-d H:i:s");
//        create log
			$auditQuery = "INSERT INTO database_log(userID, executedQuery,
                        affectedTable, eventType, description, timestamp)
                        VALUES ('$user','TRANSACTION [Multiple Queries Possible]','TRANSACTION [Multiple Relations Possible]','TRANSACTION','$description','$timestamp')";
			$this->executeTransaction($auditQuery);
//			get transaction id back
			$sqlQuery = "SELECT eventID FROM database_log WHERE description='$description' AND userID='$user' AND timestamp='$timestamp'";
			$transactionID = $this->executeTransaction($sqlQuery)[0]['eventID'];
//        finally commit the transaction
			if ($this->getTransactionState())
				if ($this->connection->commit()) {
//				 	create log file entry
					Model::createLog($timestamp, $this->descriptionMessages, $transactionID);
					return true;
				} else {
					return false;
				}
			else
				return false;
		}

		public function executeTransaction($sqlQuery): bool|array {
			try {
				$result = $this->connection->query($sqlQuery);
				//check weather query success
				if ($result) {
					if ($result !== TRUE) {
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
					} else {
						$data = TRUE;
					}
					return ($data);
				} else {
					$this->transactionState = false;
					throw new mysqli_sql_exception("Query Failed.");
				}
			} catch (Exception $exception) {
				$this->transactionState = false;
				echo("Exception ::: << " . $exception->getMessage() . " >>  " . $exception->getTraceAsString());
				return array();
			}
		}

		public function getTransactionState(): bool {
			return $this->transactionState;
		}

		public function transactionAudit($sqlQuery, $affectedTable, $eventType, $description, $user = ''): bool|array {
//        take from cookies
			if (isset($_COOKIE['userName']))
				$user = $_COOKIE['userName'];
//        make log
			$timestamp = date("Y-m-d H:i:s");
			$executedQuery = explode($affectedTable, str_replace("'", "", $sqlQuery))[1];
			$auditQuery = "INSERT INTO database_log(userID, executedQuery,
                        affectedTable, eventType, description, timestamp)
                        VALUES ('$user','$executedQuery','$affectedTable','$eventType','$description','$timestamp')";
			$this->executeTransaction($auditQuery);
//			get transaction id back
			$sqlQuery = "SELECT eventID FROM database_log WHERE affectedTable='$affectedTable' AND eventType='$eventType' AND timestamp='$timestamp' AND userID='$user'";
			$transactionID = $this->executeTransaction($sqlQuery)[0]['eventID'];

//        add each query executions to description
			$this->auditDescription .= "
           ---------
           Timestamp= $timestamp\n
           Transaction ID= $transactionID\n
           Event type= $eventType\n
           Affected table= $affectedTable\n
           Query description= $executedQuery\n
           Description= $description\n
           ---------\n
        ";
//			add description messages to message list
			$this->descriptionMessages .= "[$description] ";
			return $this->executeTransaction($auditQuery);
		}

		public function closeConnection() {
			$this->connection->close();
		}
	}
