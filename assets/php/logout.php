<?php
//remove cookies
setcookie('userName',"NULL",time()-8400,"/");
setcookie('role',"NULL",time()-8400,"/");
setcookie('fullName',"NULL",time()-8400,"/");
header("Location: ../../");