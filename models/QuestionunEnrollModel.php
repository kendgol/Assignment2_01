<?php
class QuestionunEnrollModel extends Model implements Reader
{

    public function find(string $tablename, array $ids): array
	{
		$data = [];
		$idsPlus = "";//captures extra ids
		$i = 0;
		while($i < count($ids))
		{
			$idsPlus = $idsPlus . $ids[$i]['course_id'] . ",";
			$i++;
		}

		$idsPlus = rtrim($idsPlus,",");//Remove trailing spaces from the string. In this case it is a extra comma to be removed
		$query_str = "SELECT * FROM $tablename
		WHERE course_id IN ($idsPlus)";

			if($result = $this->sqli->query($query_str)) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
		
        return $data;
		}
    }



 	public function findAll(string $tablename, array $ids): array{

		$data = [];
        
		$query_str = "SELECT course_id FROM  $tablename WHERE email='{$ids['em']}'";
		$i = 0;
		if($result = $this->sqli->query($query_str)) {
            while($row = $result->fetch_assoc()) {
                $data[$i] = $row;
                $i++;
            }
        return $data;
	}

    
}
}

?>