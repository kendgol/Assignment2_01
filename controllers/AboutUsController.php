<?php

class AboutUsController extends AbstractController {
    protected $errors = [];
    public function makeModel() : Model {
        
        //Creates an empty model
        return new Model(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    public function makeView() : View {
        $view = new View();
        $view->registerTemplate(TEMPLATE_DIR . '/aboutus.tpl.php');

        return $view;
    }

    public function start() {
         //Create the view object and populate with makeview
        $this->view = $this->makeView();
         //Displays the page
         $this->view->display();

    }


}

?>

