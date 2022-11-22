<?php

class IndexController extends AbstractController {
    protected $errors = [];
    public function makeModel() : Model {
        
        //Creates an empty model
        return new IndexModel(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    public function makeView() : View {
        $view = new View();
        $view->registerTemplate(TEMPLATE_DIR . '/index.tpl.php');

        return $view;
    }

    public function start() {
        $modelData = $this->model;
        $modelData = $this->makeModel();
        //Create the view object and populate with makeview
        $this->view = $this->makeView();

        $data = $modelData->findAll('courses', $_POST);
         $this->view->importVars($data);
         //Displays the page
         $this->view->display();

    }


}

?>

