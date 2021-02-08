<?php

	class ConfirmBookingController extends Controller {
		public static function init() {
			$reviewList = ConfirmBookingModel::loadReviewList();
//        if user press entry to review
			if (isset($_GET['operation']) && isset($_GET['requestID'])) {
				$requestID = $_GET['requestID'];
				$result = ConfirmBookingModel::loadSelectedRequest($requestID);
				if (!is_int($result)) {
//                load view with review section
					self::createView('confirmBookingView', [$reviewList, $result]);
				} else {
//                default view
					self::createView('confirmBookingView', [$reviewList]);
//                base on error code toast message creation
					switch ($result) {
						case 1:
							echo("<script>createToast('Warning (error code: #HBM01)','Unable to load request to review.','W')</script>");
							break;
						case 2:
							echo("<script>createToast('Warning (error code: #HBM02)','Unable to load request to review.','W')</script>");
							break;
						case 3:
							echo("<script>createToast('Warning (error code: #HBM03)','Slot is already occupy or under review.','W')</script>");
							break;
						case 4:
							echo("<script>createToast('Warning (error code: #HBM04)','Request timeout or already reviewed.','W')</script>");
							break;
					}
				}
			} else {
//            default view
				self::createView('confirmBookingView', [$reviewList]);
			}
		}
	}