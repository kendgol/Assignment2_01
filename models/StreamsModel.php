<?php

class StreamsModel extends Model implements Reader {

    // Retrieves all the records from the JSON file
    public function find(string $tablename, array $ids): array {

        return [];       
    
    }

    public function findAll(string $tablename, array $ids): array {
        $data = [];
        $query_str = "SELECT * FROM  $tablename";
        if($result = $this->sqli->query($query_str)) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
          
        }
        

    }
}


?>