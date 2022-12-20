<?php

	class RequestAppointmentModel extends Model {
		public static function insertData($lecturer, $typecode, $title, $timeDuration, $message, $studentID, $date, $time) {
			$databaseInstance = new Database;
			$databaseInstance->establishTransaction('root', '');
			$timestamp = date('Y-m-d H:i:s');

			$query = "INSERT INTO meeting_appointment(studentID,staffID, title, message, type, meetingDuration, timestamp,appointmentTIme,appointmentDate) VALUES ('$studentID','$lecturer','$title','$message',$typecode,'$timeDuration','$timestamp','$time','$date')";
			$databaseInstance->executeTransaction($query);
			if ($databaseInstance->getTransactionState()) {

				$databaseInstance->transactionAudit($query, 'meeting_appointment', "INSERT", "Insert a new Appointment Message into the system.");

				if ($databaseInstance->getTransactionState()) {
					if ($databaseInstance->commitToDatabase()) {
						//                display success message
						echo("<script>createToast('Success','Request a Meeting Appointment Message successfully.','S');</script>");
					}
				} else {
					//                display fail message
					echo("<script>createToast('Warning (error code: #APR02)','Failed to Request .','W')</script>");
				}
			} else {
				echo("<script>createToast('Warning (error code: #APR02)','Failed to Request  .','W')</script>");

			}
			$databaseInstance->closeConnection();

			// Database::executeQuery("student","student@16",$query);
			// self::createAudit($query, 'meeting_appointment', "INSERT", 'Insert a new Appointment Message into the system.');
		}

		public static function getData($studentID) {
			$appointmentList = array();
			$current = date("Y-m-d");
			$past = date('Y-m-d', strtotime('-2 week', strtotime($current)));
			$appointments = Database::executeQuery("student", "student@16", "SELECT * FROM meeting_appointment M,user U WHERE M.studentID='$studentID' and M.staffID=U.userName AND M.appointmentDate>='$past'");
			foreach ($appointments as $appointment) {
				$newAppointment = new AppointmentsForMeeting;
				$newUser = new User;
				$newUser->setUser($appointment['userName'], $appointment['nic'], $appointment['gender'], $appointment['salutation'], $appointment['firstName'], $appointment['lastName'], $appointment['fullName'], $appointment['TPNO'], $appointment['personalEmail'], $appointment['universityEmail'], $appointment['role'], $appointment['profilePicURL']);

				$newAppointment->setAppointment($appointment['appointmentID'], $appointment['studentID'], $appointment['title'], $appointment['message'], $appointment['type'], $appointment['appointmentDate'], $appointment['appointmentTime'], $appointment['meetingDuration'], $appointment['reply'], $appointment['timestamp'], $appointment['requesValidity'], $appointment['isApproved']);

				$newAppointment->setAppointmentFor($newUser);
				$appointmentList[] = $newAppointment;
			}
			return $appointmentList;
		}
//        TODO
//        public static function getProfile(){
//            $query="SELECT user.universityEmail,user.fullName,user.userName,user.salutation,academic_staff.availableFrom,academic_staff.availableTo,academic_staff.lastUpdateDate,academic_staff.availableLocation,academic_staff.availableDescription FROM user INNER JOIN academic_staff ON academic_staff.staffID=user.userName";
//            $profiles= Database::executeQuery("academicStaff","academicStaff@16",$query);
//            $profileList=array();
//            foreach($profiles as $profile){
//                $newProfile= new Staff;
//                $newProfile->setStaff($profile['universityEmail'],$profile['fullName'],$profile['userName'],$profile['salutation'],$profile['availableFrom'],$profile['availableTo'],$profile['availableLocation'],$profile['availableDescription'],$profile['lastUpdateDate']);
//                $profileList[]=$newProfile;
//            }
//            // print_r($profileList[0]);
//            return $profileList;
//        }
		public static function getLectures() {
			$query = "SELECT firstName,lastName,userName,salutation FROM user WHERE role='AS'";
			return Database::executeQuery("student", "student@16", $query);
		}


	}

?>