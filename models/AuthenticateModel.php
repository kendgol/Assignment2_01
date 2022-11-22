<?php


class AuthenticateModel extends Model implements Reader {


    public function find(string $tablename, array $ids): array {
        if(!isset($ids['email']) && !isset($ids['password'])) {
            trigger_error('<b>AuthenticateModel::find() error</b>: Invalid parameter', E_USER_ERROR);
        }
        
    $query_str = "SELECT name, email
    FROM $tablename
    WHERE email='{$ids['email'] }' AND
           password='{$ids['password'] }'";

    if($result = $this->sqli->query($query_str)) {
        if($result->num_rows <> 1) {
            return [];
        }
        else {

            return $result->fetch_assoc();
        }
    }
    else {

        trigger_error('<b>AuthenticateModel SQL error:</b> ' . $this->sqli->error, E_USER_ERROR);

        return [];
    }
        
    }
    


    //Retrives all records from the table
    public function findAll(string $tablename, array $ids): array {

        return [];
    }

}