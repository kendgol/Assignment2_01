<?php

class StreamsController extends AbstractController {
    protected $errors = [];
    public function makeModel() : Model {
        
        //Creates an empty model
        return new StreamsModel(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    public function makeView() : View {
        $view = new View();
        $view->registerTemplate(TEMPLATE_DIR . '/streams.tpl.php');

        return $view;
    }

    public function start() {
        $modelData = $this->model;
        $modelData = $this->makeModel();
        //Create the view object and populate with makeview
        $this->view = $this->makeView();

        $data = $modelData->findAll('streams', $_POST);
         $this->view->importVars($data);
         //Displays the page
         $this->view->display();
    }


}

?>

