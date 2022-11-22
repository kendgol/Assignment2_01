<?php

class QuestionunEnrollController extends AbstractController {
    protected $errors = [];
    public function makeModel() : Model {
        
        //Creates an empty model
        return new QuestionunEnrollModel(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    public function makeView() : View {
        $view = new View();
        $view->registerTemplate(TEMPLATE_DIR . '/questionunenroll.tpl.php');

        return $view;
    }

    public function start() {
        $modelData = $this->model;
        $modelData = $this->makeModel();
        //Create the view object and populate with makeview
        $viewData = $this->view;
        $viewData = $this->makeView();

        $auth = new Authenticate();

        if(!$auth->isUserLoggedIn()) {
            header('Location:index.php');
            exit();
        } else {

            $vars =[
                'em' => $auth->getUserInfo('em'),
            ];
            //Retrieve all user courses
            $data = $modelData->findAll('user_courses', $vars);

            if($data){
                $courses = $modelData->find('courses', $data);

                $viewData->importVars($courses);
            }
            else{
                $viewData->importVar('Notice','Error you cannot unenroll.');
            }

            //Displays the page
            $viewData->display();
            
        }

    }


}

?>

