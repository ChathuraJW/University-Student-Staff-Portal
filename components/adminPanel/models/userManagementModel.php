<?php


	class UserManagementModel extends Model {
		public static function addNewStudentBulk($selectedGroup,$fileName,$filePath): bool {
			$dbInstance=new Database;
			//TODO change database credentials
			$dbInstance->establishTransaction('root','');

//			query for insert into user table
			$sqlQueryForUser="INSERT INTO user(userName, password, nic, firstName, lastName, fullName, dob, address, TPNO, personalEmail, role) VALUES";

//			query for insert data into student table
			$sqlQueryForStudent="INSERT INTO student(indexNo, regNo, studentGroup) VALUES";

//			open csv file
			$resultFile = fopen($filePath, "r");
			$isHeaderRow=true;
			while (!feof($resultFile)){
				$resultEntry = explode(",", fgets($resultFile));
				if($isHeaderRow){
//					ignore process header
					$isHeaderRow=false;
					continue;
				}else{
//					process with data fields
					if(isset($resultEntry[1])){
						if(count($resultEntry)!=10){
//							this error occur when format as not expected
							echo("<script>createToast('Warning (error code: #ADMIN-UM-02)','Invalid data format on data file.','W')</script>");
							$dbInstance->closeConnection();
							return false;
						}
//						create default password, including username as salt
						$userName=$resultEntry[1];
						$defaultPasswordHash=md5("ucsc@123$userName");

						$sqlQueryForUser.=" ('".$resultEntry[1]."','$defaultPasswordHash','".$resultEntry[5]."','".$resultEntry[2]."','".$resultEntry[3]."','".$resultEntry[4]."','".$resultEntry[6]."','".$resultEntry[7]."','".$resultEntry[8]."','".$resultEntry[9]."','ST'),";
						$sqlQueryForStudent.=" (".$resultEntry[0].",'".$resultEntry[1]."','$selectedGroup'),";
					}
				}
			}
			$sqlQueryForUser = trim($sqlQueryForUser, ",");
			$sqlQueryForStudent = trim($sqlQueryForStudent, ",");

//			query run and audit for user table
			$dbInstance->executeTransaction($sqlQueryForUser);
			$dbInstance->transactionAudit($sqlQueryForUser,'user','INSERT',"Add student as bulk for group $selectedGroup.");

//			query run and audit for student table
			$dbInstance->executeTransaction($sqlQueryForStudent);
			$dbInstance->transactionAudit($sqlQueryForStudent,'student','INSERT',"Add student as bulk for group $selectedGroup.");

//			close file
			fclose($resultFile);

			if($dbInstance->getTransactionState()){
				if($dbInstance->commitToDatabase()){
					echo("<script>createToast('Success','Student data uploaded successfully.','S')</script>");
					$dbInstance->closeConnection();
					return true;
				}else{
					echo("<script>createToast('Warning (error code: #ADMIN-UM-03)','Operation Failed.','W')</script>");
					$dbInstance->closeConnection();
					return false;
				}
			}else{
				echo("<script>createToast('Warning (error code: #ADMIN-UM-03)','Operation Failed.','W')</script>");
				$dbInstance->closeConnection();
				return false;
			}
		}
	}