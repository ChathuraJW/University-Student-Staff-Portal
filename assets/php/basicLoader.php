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
    <span class='backToHome' style='float: left;'><a href='../../' style='color: white;' title='Back to home'><i class='fa fa-home'></i></a></span>
    <span>Login as " . $_COOKIE['fullName'] . " &nbsp;<span><a href='{$positionNotation}assets/php/logout.php' style='color: white;'><i class='fa fa-sign-out-alt' style='color: white;' title='Log out'></i></a></span></span>
</div>
<div class='toastArea' id='toastArea'></div>
    ");
		}

		public static function loadFooter($positionNotation) {
			echo("
        <footer class='mainFooter'>
            <div class='row col-2'>
                <div class='addressBlock'>
                    <h3>Contact Us</h3>
                    <span>
                        Mailing Address: <br>
                        University of Colombo School of Computing (UCSC Building Complex),<br>
                        35 ,Reid Avenue, Colombo 7,<br>
                        Sri Lanka. <br><br>
                        Tel  : +94 -11- 2581245 /7<br>
                        Fax  : +94 -11- 2587239<br>
                        Email: info@ucsc.cmb.ac.lk
                    </span>
                    <span>
                        <a href='https://www.linkedin.com/school/ucsc-lk/'><i class='fa fa-linkedin fa-2x'></i></a>
                        <a href='https://twitter.com/UCSC_LK'><i class='fa fa-twitter-square fa-2x'></i></a>
                        <a href='https://www.facebook.com/UCSC.LK'><i class='fa fa-facebook-square fa-2x'></i></a>
                        <a href='https://www.youtube.com/channel/UC0gdcqEL6ZZeT67s0IbOrHg'><i class='fa fa-youtube fa-2x'></i></a>
                    </span>
                </div>
                <div class='basicDescription'>
                        <img src='{$positionNotation}assets/image/logoUSSP.png' alt='USSPLogo'><br><br>
                    <p>
                        University Student-Staff Portal(USSP) is developed by a second year student development team call
                        Team Binary Bits. Main purpose of this system is to automate, semi-automated university system of
                        University
                        of Colombo School of Computing, Sri Lanka for cater a good service for both of student and staff in the
                        university.
                    </p>
                </div>
            </div>
            <div class='row col-1'>
                <div>Design and Developed by &copy;Team Binary Bits</div>
            </div>
        </footer>
    ");
		}
	}

