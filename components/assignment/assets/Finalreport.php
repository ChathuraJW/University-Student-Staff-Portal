<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment Result Summery</title>
    <style>
        *{
            font-family: "Bahnschrift";
        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }
        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
        }
    </style>
</head>
<body style="padding: 25px;margin: 25px;border: 1px solid grey">
<div>
    <h1 style="text-align: center;font-size: 35px;text-decoration: underline;">Assignment Plan Summary</h1>
	<?php
		require_once('../../../assets/mvc/Database.php');
		//FinalReport
		if(isset($_GET['operation']) && $_GET['operation']=='ClosePlan'){
			$planID=$_GET['planID'];
			$dbInstance=new Database;
			//@TODO change database credentials
			$dbInstance->establishTransaction('root','');
//		get assignment data
			$sqlQuery="SELECT * FROM assignment_plan WHERE planID=$planID LIMIT 1";
			$planDetails=$dbInstance->executeTransaction($sqlQuery)[0];
			echo("
            <table style='text-align: left;font-size: 17px;padding: 30px;'>
                <tr>
                    <th width='200px'>Plan ID</th>
                    <td>#".$planDetails['planID']."</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>".$planDetails['subject']."</td>
                </tr>
                <tr>
                    <th>Degree Stream</th>
                    <td>".$planDetails['degreeStream']."</td>
                </tr>
                <tr>
                    <th>Assignment Weight</th>
                    <td>".$planDetails['assignmentWeigh']." %</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>".$planDetails['description']."</td>
                </tr>
            </table>
            
            <h1 style='text-align: center;font-size: 30px;'><i>Result Analysis for Individual Student</i></h1>
        ");

//		setup table headers
			$sqlQuery="SELECT assignmentID,assignmentName FROM assignment WHERE assignmentPlanID=$planID AND isActive=TRUE";
			$result=$dbInstance->executeTransaction($sqlQuery);
			echo ("
            <table border='1' style='margin: auto;' id='customers'>
			<tr>
			<th>#</th>
			<th>Student Index</th>
		");
			foreach ($result as $row){
				echo ("
					<th>".$row['assignmentName']." (#".$row['assignmentID'].")</th>
			");
			}
			echo ("
			<th>Weighted Mark</th>
			<th>Final Result Weight</th>
			</tr>
		");

			//get student who are enroll for the respective assignment
			$sqlQuery="SELECT SEC.studentIndexNo FROM assignment_plan AP, student_enroll_course SEC WHERE SEC.courseCode=AP.subject AND AP.planID=$planID";
			$result=$dbInstance->executeTransaction($sqlQuery);
			$i=1;
			foreach ($result as $row){
				$studentID=$row['studentIndexNo'];
				echo ("
				<tr>
				    <td>$i</td>
					<td>$studentID</td>
			");
//			rest rows hear

				$sqlQuery="SELECT * FROM assignment_mark_with_plan WHERE planID=$planID AND studentID=$studentID ORDER BY assignmentID";
				$resultForAssignment=$dbInstance->executeTransaction($sqlQuery);

				$weightedSum=0;
				$planWeight=0;

				foreach ($resultForAssignment as $assignmentMarkEntry){
					echo ("<td>".$assignmentMarkEntry['mark']."</td>");
//				modify waited sum
					$weightedSum+=$assignmentMarkEntry['mark']*($assignmentMarkEntry['weight']/100);
					$planWeight=$assignmentMarkEntry['planWeight'];
				}
//			weighted sum row
				echo ("<td>$weightedSum</td>");

//			total grade weight
				echo ("<td>".$weightedSum*($planWeight/100)."</td>");
				echo ("</tr>");

				$i++;
			}


		}
	?>
    </table>
</div>
<!--<div style="float: right;margin: 30px;"><Button style="padding: 7px;border-radius: 5px;font-size: 18px;">Print The Result</Button></div>-->
<script>
    window.print();
</script>



</body>
</html>