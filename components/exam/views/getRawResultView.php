<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/resultSection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<?php require('../../assets/php/basicLoader.php') ?>
<!-- include header section -->
<?php BasicLoader::loadHeader('../../'); ?>

<!-- feature body section -->
<div class="featureBody bodyBackground text">
    <h1 class="heading">Get Raw Result</h1>
    <div class="row col-3">
        <div class="reviewList">
            <span class="columnHeader">Received Result List</span>
			<?php
				if (!$controllerData | sizeof($controllerData) == 0) {
//				    display below message if list is empty
					echo("<span class='emptyMessage'>No Result files for listing.</span>");
				} else {
					$i = 0;
					foreach ($controllerData as $row) {
//                        set get url for pass data
						$url = "?fileID=" . $row->getFileID() . "&examinationYear=" . $row->getYearOfExam() . "&semester=" . $row->getSemester() . "&batch=" .
							$row->getBatch() . "&subject=" . $row->getSubjectCode() . " [" . $row->getSubjectName() . "] &attempt=" . $row->getAttempt()
							. "&filePath=" .
							$row->getFileName() . "&sendBy=" . $row->getSendBy() . " [" . $row->getSenderFullName() . "]";
//						set attempt string
						$attempt = ($row->getAttempt() == 'F') ? 'First Attempt' : 'Repeat Attempt';
//						get year semester value form semester(1-8)
						$semester = ceil($row->getSemester() / 2) . "Y (" . ($row->getSemester() % 2 == 0 ? 2 : 1) . " S)";
						echo("
                     <a href='$url' class='reviewListEntry' id='" . $row->getFileID() . "'>
                        <div>
                            <span class='dataPointHead'>Subject</span>
                            <span class='dataPointTail'> : " . $row->getSubjectCode() . "</span>
                        </div>
                        <div>
                            <span class='dataPointHead'>Year (Semester)</span>
                            <span class='dataPointTail'> : " . $semester . "</span>
                        </div>
                        <div>
                            <span class='dataPointHead'>Attempt</span>
                            <span class='dataPointTail'> : " . $row->getAttempt() . "</span>
                        </div>
                        <div>
                            <span class='dataPointHead'>Batch</span>
                            <span class='dataPointTail'> : " . $row->getBatch() . "</span>
                        </div>
                        <div>
                            <div class='sendByResult'>Result Submitted By: " . $row->getSendBy() . "</div>
                        </div>
                    </a>
                ");
					}
				}
			?>

        </div>
        <div class="showFileContent" id="showFileContent">
            <div id="printArea">
                <span class="columnHeader">Result Review of <?php echo $_GET['subject']; ?></span>
                <br>
				<?php
					if (isset($_GET['fileID'])) {
						$attempt = ($_GET['attempt'] == 'F') ? 'First Attempt' : 'Repeat Attempt';
						$subject = explode('_', $_GET['subject'])[1] . " ( " . explode('_', $_GET['subject'])[0] . " )";
//                    year calculation based on semester with a?b:c statement
						$year = ceil($_GET['semester'] / 2) == 1 ? "1st Year" : (ceil($_GET['semester'] / 2) == 2 ? "2nd Year" : (ceil($_GET['semester'] / 2) == 3 ? "3rd Year" : "4th Year"));
						echo("
                                    <table>
                                        <tr>
                                            <td>Examination Year</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $_GET['examinationYear'] . "</td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $_GET['semester'] . "</td>
                                        </tr>
                                        <tr>
                                            <td>Examination for</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $year . "</td>
                                        </tr>
                                        <tr>
                                            <td>Batch</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $_GET['batch'] . "</td>
                                        </tr>
                                        <tr>
                                            <td>Subject</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $_GET['subject'] . "</td>
                                        </tr>
                                        <tr>
                                            <td>Attempt</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $attempt . "</td>
                                        </tr>
                                        <tr>
                                            <td>Send By</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $_GET['sendBy'] . "</td>
                                        </tr>
                                    </table>
                                
                                ");
					}
				?>
                <br><br>
                <div class="showResult">
                    <table class="resultTable" id="dataList">
                        <tr>
                            <th>Serial No</th>
                            <th>Index Number</th>
                            <th>Mark</th>
                        </tr>
                    </table>

					<?php
						//read URL
						if (isset($_GET['fileID'])) {
//							    open file stream
							$myFile = fopen($_GET['filePath'], "r");
//								take file parameter out
							$fileSignature = trim(preg_replace('/\s+/', '', fgets($myFile)));
							$encryptedSecret = trim(preg_replace('/\s+/', '', fgets($myFile)));
							$dataHash = trim(preg_replace('/\s+/', '', fgets($myFile)));
							$encryptedData = trim(preg_replace('/\s+/', '', fgets($myFile)));
							$sendUser = explode(' ', $_GET['sendBy'])[0];
//                                call crypto function
							echo("
                                    <script src='../../assets/js/jquery.js'></script>
                                    <script src='../../assets/js/crypto-js.min.js'></script>
                                    <script src='../../assets/js/js-encrypt.min.js'></script>
                                    <script src='assets/getRawResult.js'></script>
                                    
                                    <input type='button' value='Unlock Result' id='dataDecrypt' class='button' style='margin: auto;display: block;' onclick='cryptoOperation(`$sendUser`,`$fileSignature`,`$encryptedSecret`,`$dataHash`,`$encryptedData`)'>
                                ");
//                                close file stream
							fclose($myFile);
						}
					?>

                </div>
                <br>
            </div>
            <br>
            <form action="" method="post">
                <div class="row col-2">
                    <div class="fileExportSection">
                        <button onclick="savePDF();"><i class="fas fa-file-pdf fa-3x" style="color: var(--fontColor)"></i></button>
                        <!--                        <button><i class="fas fa-file-csv fa-3x"></i></button>-->
                    </div>
                    <div class="actionButton">
                        <input type="submit" value="Confirm result Received" name="confirmation" class="button" onclick="confirmMessage('Are you sure to ' +
                         'preform this action ? Before doing that make sure that you already downloaded the result file.' +
                         '');">
                        <input type="button" value="Cancel" name="cancel" id="cancel" class="button"
                               onclick="window.location.href=document.location.href.toString().split('getRawResult')[0]+'getRawResult';">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- include footer section -->
<?php BasicLoader::loadFooter('../../'); ?>
<script src='../../assets/js/toast.js'></script>
<script src='../../assets/js/changeTheme.js'></script>
</body>
</html>