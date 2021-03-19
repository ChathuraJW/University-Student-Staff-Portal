<?php
    class ForgetPasswordModel extends Model{                              
        public static function getName($userName){
            
            $query="SELECT firstName FROM user WHERE userName='".$userName."'";
            return Database::executeQuery("root","",$query)[0]['firstName'];
        
        }
        
    }
?>