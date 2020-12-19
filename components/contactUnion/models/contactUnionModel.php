<?php
class ContactUnionModel extends Model{
	public static function getMessageData():array{
		$userName=$_COOKIE['userName'];
		$sqlQuery="SELECT * FROM send_message_to_union where sender='$userName'";
		//@TODO change database credential
		$result=Database::executeQuery('root','',$sqlQuery);
//		initialize returning array
		$returnData=array();
		foreach ($result as $row){
//			create individual objects and store those data for add into array
			$contactUnionItem=new ContactUnion;
			$contactUnionItem->setMessage($row['messageID'],$row['title'],$row['message'],$row['sender'],$row['sendTimestamp'],$row['isAnonymous']);
//			append created object to returning array
			$returnData[]=$contactUnionItem;
		}
		return $returnData;
	}
	public static function createMail($newUnionMessage){
//		get client IP
		$newUnionMessage=new ContactUnion;
		$clientIP=$_SERVER['REMOTE_ADDR'];
//		set timezone and get date
		date_default_timezone_set("Asia/Colombo");
		$date=(date("D d-m-y",time()));

		if(isset($_POST['anonymousCheck']) & $_POST['anonymousCheck'] ==='on'){
//			anonymous message
			$sender="<b>Antonymous</b>";
		}else{
//        	non anonymous message
			$sendingUser=new User;
			$sendingUser->setUserName($newUnionMessage->getSender());
			$sender='(<b>'.$newUnionMessage->getSender().'</b>) '.$sendingUser->getSalutation().'. '.$sendingUser->getFullName();
		}
//      create email content
		$mailContent="
		            <div style='padding:5px;'>
				        <h3 style='text-align:center;'><u>
				        	".$newUnionMessage->getTitle()."
				         </u></h3>
				        <p style='text-align:justify;font-size:14px;'>
				        	".$newUnionMessage->getMessage()."
				        </p>
				
				        <p>
				            Send By, <br>
				            $sender <br>
				            1 <sup>st</sup> Year CS Student.
				        </p>
				        <p style='font-size:10px;'>
				            Client IP: $clientIP <br>
				            Date: $date
				        </p>
				        <h6 style='color:red;padding:10px;border:1px solid red;text-align:center;'>Notice that this message is genarated acoring to the user message to the &#174;USSP system.</h6>
				    </div>
		        ";
//      start transaction
		$dbInstance=new Database;
		//@TODO Change DB credential
		$dbInstance->establishTransaction('root','');
		//@TODO Think how to handle receiver address
		$receiver='wachathuraj@gmail.com';
		$title="USSP System Generated Message";
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
//		send the mail
		$isSuccess=mail($receiver,$title,$mailContent,implode("\r\n", $headers));
//		insert data and log into database
		$sqlQuery="INSERT INTO send_message_to_union(title, message, sender, sendTimestamp, isAnonymous) VALUES ('".$newUnionMessage->getTitle()."','".$newUnionMessage->getMessage()."','".$_COOKIE['userName']."',NOW(),".$newUnionMessage->isAnonymous().")";
		$dbInstance->executeTransaction($sqlQuery);
		$dbInstance->transactionAudit($sqlQuery,'send_message_to_union',INSERT,'Create new message and that send to the Union.');
//		check whether all execute successfully
		if($isSuccess && $dbInstance->getTransactionState())
			$dbInstance->commitToDatabase();
//		close db connection
		$dbInstance->closeConnection();
	}
}