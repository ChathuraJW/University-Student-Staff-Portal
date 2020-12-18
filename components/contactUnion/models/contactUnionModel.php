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
}