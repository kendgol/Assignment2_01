<?php


interface Deleter {

    //This method deletes a record in the table
    public function del(array $tablenames, array $ids);

}

?>