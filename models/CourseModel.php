<?php

class CourseModel extends Model implements Reader {

    public function find(string $tablename, array $ids): array{
        return [];
    }

    public function findAll(string $tablename, array $ids): array{

        $data = [];
        $query_str = "SELECT * FROM  $tablename ";
        $result = $this->sqli->query($query_str);
//fetch a result row as an associative array
        while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
    }

}


?>