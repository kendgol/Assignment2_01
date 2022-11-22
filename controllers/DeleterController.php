<?php

class DeleterController extends AbstractController {
    protected $errors = [];
    public function makeModel() : Model {
        
        //Creates an empty model
        return new DeleterModel(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    public function makeView() : View {
        $view = new View();
        $view->registerTemplate(TEMPLATE_DIR . '/unenrollconfirmed.tpl.php');

        return $view;
    }

    public function start() {
        $modelData = $this->model;
        $modelData = $this->makeModel();
        //Create the view object and populate with makeview
        $viewData = $this->view;
        $viewData = $this->makeView();

        $auth = new Authenticate();

        //Is the user is not logged in go to the index.php
        if(!$auth->isUserLoggedIn()) {
            header('Location:index.php');
            exit();
        } else {

            $tables = [
                'user_courses'
            ];

            $vars =[
            'em' => $auth->getUserInfo('em'),
            "course_id"=>$_GET['courseid'],"course_name"=>$_GET['course_name'],
        ];
            //delete user courses
        $data = $modelData->del($tables, $vars);

        $viewData->importVars($data);
            
            //Displays the page
            $viewData->display();
            
        }

    }


}

?>

