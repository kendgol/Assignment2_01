<?php

interface Writer {

    //Inserts a new record into the table
    public function add(array $tables, array $fields);

}

?>