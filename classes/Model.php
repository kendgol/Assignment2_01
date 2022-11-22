<?php 
 
 class Model {
    
    protected $sqli = null;

    //Constructor
    //Connects database to phpmyadmin
    public function __construct(string $user, string $pass, string $db, string $host) {

        $host = "localhost";
        $user = "root";
        $pass = '';
        $db = "mooc";


        $this->sqli = new mysqli($host, $user, $pass, $db);

        // return $sqli;
        
    }



 }


?>