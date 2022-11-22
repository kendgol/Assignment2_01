<?php

class IndexModel extends Model implements Reader {

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

        
       // next stage, get most popular and most favourite
       $popular_column = array_column($data, 'course_access_count');//3 because popular is third column in the firld
       $recommended_column = array_column($data, 'course_recommendation_count');//Create a column
    //    $extra = $data['courses'];//Copy of courses array
    $extra = $data;
       array_multisort($recommended_column, SORT_DESC, $data) ;
       $recommended = array_slice($data, 0, 8);
       
       array_multisort($popular_column, SORT_DESC, $extra);
       $popular = array_slice($extra, 0, 8);
       
       return [$recommended, $popular];

          
        }
        
 
        

    }
}


?>