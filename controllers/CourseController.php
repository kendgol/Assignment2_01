<?php

class CourseController extends AbstractController 
{
    public function makeModel() : Model {
        
        //Creates an empty model
        return new CourseModel(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    public function makeView() : View {
        $view = new View();
        $view->registerTemplate(TEMPLATE_DIR . '/courses.tpl.php');

        return $view;
    }

    public function start() {
        $auth = new Authenticate();
        $this->model = $this->makeModel();
        $this->view = $this->makeView();
        //is user logged in
        if(!$auth->isUserLoggedIn()) {
            header('Location:index.php');
            exit();
        }else {
            $data = $this->model->findAll('courses', $_POST);
            
            $this->view->importVars($data);
            //Displays the page
            $this->view->display();
        }

    }
    
}




?>