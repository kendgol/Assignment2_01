<?php

class RegisterModel extends Model implements Writer{

    public function add(array $tables, array $fields){

        $table = 'users';
        $query_str = "INSERT INTO  $table 
                        VALUES  ('".$fields['fullname']."','" . $fields['emailsignup'] ."','". $fields['PassSignup'] ."')";



        if($result = $this->sqli->query($query_str)){
            return array("Notice"=>"Registration Successful!");
        }
        else{
            return array("Notice" => "Error: Registration Failed");
        }

      
        
        
    }
}