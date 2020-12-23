<?php

class ConfirmBookingModel extends Model {
    public static function loadReviewList(): array {
//        get reservation request that need to be review ordered according to reservationID
        $sqlQuery = "SELECT * FROM hall_reservation_details WHERE reservationStates='N' AND isUnderReview='false' ORDER BY reservationID;";
        //TODO change database credentials
        $result = Database::executeQuery('root', '', $sqlQuery);
//        create array yo store objects
        $requestList = array();
//        insert object by object to array
        foreach ($result as $row) {
            $request = new HallAllocation();
//            call function to set data to the object
            $fullName = $row['salutation'] . '. ' . $row['fullName'];
            $request->setAllocationFull($row['reservationID'], $row['reserveUserName'], $row['hallID'], $row['description'],
                $row['type'], $row['fromTimestamp'], $row['toTimestamp'], $row['requestMadeAt'], $row['reservationStates'],
                '', '', $fullName);
//            add object to  the list
            $requestList[] = $request;
        }
        return $requestList;
    }

    public static function loadSelectedRequest($requestID): array|bool {
        $dbInstance = new Database;
        //TODO change database credentials
        $dbInstance->establishTransaction('root', '');
//        get data for selected request
        $sqlQuery = "SELECT * FROM hall_reservation_details WHERE reservationID=$requestID";
        $selectedRequest = $dbInstance->executeTransaction($sqlQuery);
//        set object for open request
        $fullName = $selectedRequest[0]['salutation'] . '. ' . $selectedRequest[0]['fullName'];
        $openedRequest = new HallAllocation;
        $openedRequest->setAllocation($selectedRequest[0]['reservationID'], $selectedRequest[0]['reserveUserName'], $fullName,
            $selectedRequest[0]['hallID'], $selectedRequest[0]['description'], $selectedRequest[0]['type'],
            $selectedRequest[0]['fromTimestamp'], $selectedRequest[0]['toTimestamp'], $selectedRequest[0]['requestMadeAt'],
            $selectedRequest[0]['reservationStates']);

        if ($selectedRequest[0]['type'] == 3100) {
            $fromTime = $selectedRequest[0]['fromTimestamp'];
            $sqlQuery = "SELECT reservationID,hallID,reserveUserName,fullName,type,requestMadeAt,reservationStates,isUnderReview FROM hall_reservation_details WHERE fromTimestamp='$fromTime'";
            $requestInSameSlot = $dbInstance->executeTransaction($sqlQuery);
            $isSlotFree = true;
            $isUnderReview = false;
            $sameSlotRequestList = array();
            foreach ($requestInSameSlot as $row) {
//                check weather slot is free
                if ($row['reservationStates'] === 'A') {
                    $isSlotFree = false;
                    break;
                }
//                check weather another one is review the request
                if ($row['isUnderReview']) {
                    $isUnderReview = true;
                    break;
                }
//                create dataset for same slot request
//                ignore adding currently reviewing request to same slot set
                if ($requestID !== $row['reservationID']) {
                    //create HallAllocation object and add data to array
                    $sameSlotEntry = new HallAllocation;
                    $sameSlotEntry->createSameSlotEntry($row['reservationID'], $row['hallID'], $row['reserveUserName'],
                        $row['fullName'], $row['type'], $row['requestMadeAt'], $row['reservationStates'],
                        $row['isUnderReview']);
                    $sameSlotRequestList[] = $sameSlotEntry;
                }
//                change state fo isUnderReview to true
                $sqlQuery = "UPDATE user_receive_hall SET isUnderReview=true WHERE reservationID=" . $row['reservationID'];
                //TODO make sure to uncomment below statement
//                $dbInstance->executeTransaction($sqlQuery);
            }
//            check weather request ready to review
            if ($isSlotFree && !$isUnderReview) {
//                proceed towards
//                check weather all transaction success
                if ($dbInstance->getTransactionState()) {
//                    commit transaction
                    if ($dbInstance->commitToDatabase()) {
                        //return stuff and close connection
                        $dbInstance->closeConnection();
                        return array($openedRequest, $sameSlotRequestList);
                    } else {
                        //display error for saying failed to open
                        echo("<script>createToast('Warning','Unable to load request to review. (error code: #HBM01) .','W')</script>");
                        return false;
                    }
                } else {
                    //display error for saying failed to open
                    echo("<script>createToast('Warning','Unable to load request to review. (error code: #HBM02) .','W')</script>");
                    return false;
                }

            } else {
                //display error that saying slot already occupy or another one is review
                echo("<script>createToast('Warning','Same slot is already occupy or another one review the request. (error code: #HBM03) .','W')</script>");
                return false;
            }
        } else {
            //display warring it is timeout/already review
            echo("<script>createToast('Warning','Request timeout or already reviewed. (error code: #HBM05) .','W')</script>");
            return false;
        }
    }
}