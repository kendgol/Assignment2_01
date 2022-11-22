<?php
class DeleterModel extends Model implements Deleter
{
    protected $error = [];
    public function del(array $tablenames, array $ids)
    {
        $query_str = "DELETE FROM user_courses WHERE email='{$ids['em']}' AND course_id='{$ids['course_id']}'";

        //Display Message
        if($result = $this->sqli->query($query_str)) {
            return array("Notice"=>"You have been removed from <b>$ids[course_name]</b>");
        }
        else {
            return array('Notice'=>'Sorry an error occured.');
        }
      
    }
}

?>