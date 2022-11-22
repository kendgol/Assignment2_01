<?php 
 // responsible for implementing business rules and passing data between the presentation layer and the data layer and are used to call Validate and Authenticate objects to implement the logic for each page.
 abstract class AbstractController {

    protected $view = null;
    protected $model = null;
    
    abstract public function makeModel() : Model;

    abstract public function makeView() : View;

    //performs the page’s business logic
    abstract public function start();

 

}

?>