<?php

class WriterModel extends Model implements Writer{

    public function add(array $tables, array $fields){

        $query_str = "SELECT * FROM  user_courses WHERE email='{$fields['em']}' AND course_id='{$fields['course_id']}'";


        $result = $this->sqli->query($query_str);   

       if(mysqli_num_rows($result) == 0){

        $table = 'user_courses';
        $email = "'" . $fields['em'] ."'";

        $query_str = "INSERT INTO  $table 
                        VALUES (". $email. "," . $fields['course_id'] . ")";
        

        if($result = $this->sqli->query($query_str)){
            return array("Notice"=>"You have been successfully enrolled for<b> $fields[course_name]</b>.");
        }
        else{
            return array("Notice" => "Error: Refresh and try again");
        }

       }else{
        return array("Notice" => "<b style='color:red;'>Please note: </b>  You are already enrolled for the course <b>$fields[course_name]</b>.");
       }
        
        
    }
}