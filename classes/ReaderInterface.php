<?php


interface Reader {

    //Searches a table for a record that has $ids
    public function find(string $tablename, array $ids): array;
    
    //Retrives all records from the table
    public function findAll(string $tablename, array $ids): array;

}

?>