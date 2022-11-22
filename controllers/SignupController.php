<?php
class SignupController extends AbstractController
{

	protected $errors = [];
        public function makeModel() : Model {
        
                //Creates an empty model
                return new Model(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
            }
            public function makeView() : View {
                $view = new View();
                $view->registerTemplate(TEMPLATE_DIR . '/signup.tpl.php');
        
                return $view;
            }
        
            public function start() {
                //Create the view object and populate with makeview
                $this->view = $this->makeView();

                //Gets errors
                $this->view->importVar('errors', $this->errors);
                //Displays the page
                $this->view->display();
        
            }

            // HAndles errors
   public function setErrorMessages(array $errors) {
    if(!empty($errors)) {
    $this->errors = $errors;

    }
    // return $errors;

}

}

?>