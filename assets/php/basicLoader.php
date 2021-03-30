<?php

	class BasicLoader {
		public static function loadHeader($positionNotation) {
			echo("
				<header>
				    <div class='overlay row col-3'>
				        <div class='imgSection'>
				            <img src='{$positionNotation}assets/image/universityLogo.png' alt='UOC_logo'/>
				        </div>
				        <div class='textSection'>
				            <span class='mainText'>University Student-Staff Portal</span><br>
				            <span class='uniName'>University of Colombo School of Computing<br>Sri Lanka</span>
				        </div>
				        <div class='imgSection'>
				            <img src='{$positionNotation}assets/image/logoUSSP.png' alt='UCSC_logo'/>
				        </div>
				    </div>
				</header>
				<div class='loginInfo'>
				    <span class='backToHome' style='float: left;'><a href='../../core/home' style='color: white;' title='Back to home'><i class='fa fa-home'></i></a></span>
				    <span>Login as " . $_COOKIE['fullName'] . " &nbsp;&nbsp;<span>
				    <a href='{$positionNotation}assets/php/logout.php' style='color: white;'>
				    <i class='fa fa-sign-out-alt' style='color: white;' title='Log out'></i>
				    </a>
				    </span></span>
				</div>
				<div class='toastArea' id='toastArea'></div>
    		");
		}

		public static function loadFooter($positionNotation) {
			echo("
		        <footer class='mainFooter'>
		            <div class='row col-2'>
		                <div class='introBlock'>
		                        University Student-Staff Portal(USSP) is designed and developed by a second-year computer science student development team call
		                        <b>&copy;Team Binary Bits</b> at the <b>University of Colombo School of Computing, Sri Lanka</b>, to automate the semi-automated university system 
		                        of UCSC for catering a good service for both student and staff in the university.
		                </div>
		                <div class='basicDescription'>
		                        <img src='{$positionNotation}assets/image/logoUSSP.png' alt='USSPLogo'><br><br>
		                </div>
		            </div>
		            <hr style='color: var(--baseColor)'>
		            <div class='row col-2'>
		                <div><button class='themeChanger' onclick='changeTheme();'><i class='fa fa-adjust'></i> Theme</button></div>
		                <div style='padding-top: 5px;'>
			                <a class='footerHeader' href='aboutUs' target='_blank'>About Us</a>
			                <a class='footerHeader' href='helpPage' target='_blank'>Help</a>
			                <a class='footerHeader' href='https://ucsc.cmb.ac.lk' target='_blank'>UCSC Home</a>
			                <span class='footerHeader' style='pointer-events: none;'>&copy;Team Binary Bits 2020-2021</span>
						</div>
					</div>
		        </footer>
    		");
		}
	}

