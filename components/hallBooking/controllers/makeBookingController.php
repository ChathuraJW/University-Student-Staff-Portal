<?php

	class MakeBookingController extends Controller {
		public static function init() {
			$hallData = MakeBookingModel::getHallData();
			$reservationList = MakeBookingModel::getReservationRequestHistory();
			$passingData = [$hallData, $reservationList];
			self::createView('makeBookingView', $passingData);

//        handle create request operation
			if (isset($_POST['createRequest'])) {
				$newAllocation = new HallAllocation;
				$fromDate = $_POST['fromData'];
				$fromTime = $_POST['fromTime'];
				$toDate = $_POST['toData'];
				$toTime = $_POST['toTime'];
				$selectedHall = $_POST['selectedHallOrLab'];
//            create timestamps based on user input
				$fromTS = self::adjestTime(strtotime("$fromDate $fromTime"), false);
				$toTS = self::adjestTime(strtotime("$toDate $toTime"));

//				date input validation form backend
				if ((date_diff(date_create($fromTS), date_create($toTS))->format("%R%a") < 0) || (date_diff(date_create(date("Y-m-d")), date_create
						($toDate))->format("%R%a") < 0) || (date_diff(date_create(date("Y-m-d")), date_create($fromDate))->format("%R%a") < 0)) {
					echo("<script>createToast('Warning (error code: #HBM11)','Input dates not fit.','W');</script>");
					return;
				}
//				$fromDay = strtoupper(date('D', strtotime($fromDate)));
//				$toDay = strtoupper(date('D', strtotime($toDate)));

//	        check for same slot hall reservations
				if (!MakeBookingModel::sameSlotReservations($selectedHall, $fromTS, $toTS)) {
//            	can proceed to next step
//	            check weather there have same slot entries for timetable
					if (!MakeBookingModel::sameSlotTimetableEntry($selectedHall, $fromTS, $toTS)) {
//	            	can proceed
						$newAllocation->createBasicAllocation($_COOKIE['userName'], $selectedHall, $_POST['description'], $_POST['bookingType'], $fromTS, $toTS);
						MakeBookingModel::makeNewReservation($newAllocation);
					} else {
//	                display error by saying timetable entry is there
						echo("<script>createToast('Warning (error code: #HBM10)','Slot already reserved for timetable event.','W');</script>");
					}

				} else {
					echo("<script>createToast('Warning (error code: #HBM09)','Sorry to say that ,slot already occupied.','W');</script>");
//            	display error my saying slot is already occupy
				}
			}
		}

//		adjust user input time to the 30 minute scale
		private static function adjestTime($timeStampReading, $isEndTime = true): bool|string {
			$minuteReading = date('i', $timeStampReading);
			$addingValue = 0;
			if ($isEndTime) {
				if ($minuteReading >= 30) {
//	    	set to 00 minute
					$addingValue = 60 - $minuteReading;
				} else {
//	    	set to 30 minute
					$addingValue = 30 - $minuteReading;
				}
				$addingValue = $addingValue * 60;
				return date('Y-m-d H:i:s', $timeStampReading + $addingValue);
			} else {
				if ($minuteReading >= 30) {
//	    	set to 30 minute
					$addingValue = (30 - $minuteReading);
				} else {
//	    	set to 00 minute
					$addingValue = -$minuteReading;
				}
				$addingValue = $addingValue * 60;
				return date('Y-m-d H:i:s', $timeStampReading + $addingValue);
			}
		}
	}