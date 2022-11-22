<?php 
// require "autoload.php";

class View {
    
    private $template = '';
    private $vars = [];//store data for the template
 
    
    // assigns the HTML file to the associated business layer (the model) to display the resulting web page
    public function registerTemplate(string $filename) {

        if(empty($filename)) {
            trigger_error('<b> View error: </b> No template file given', E_USER_ERROR);
        }

        if (!file_exists($filename)) {
            trigger_error('<b>View error: </b> File ' .$filename, 'does not exist. Cannot bind the template', E_USER_ERROR);
        }
        $this->template= $filename;
    }



// Method to transfer data from any data store – database, file
    public function importVar(string $name, $value) {

        // check to make sure the variable name is valid
        if (preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name) == 0) {
            
            trigger_error('Invalid name used', E_USER_ERROR);

            // valid($name);
        }
                // $this->valid($name);
                $this->vars[$name] = $value;   
                //Go over this function 
    }

    
    public function importVars(array $variables) {

        if(empty($variables)) {
            trigger_error('<b> View error: </b> Empty variable name given', E_USER_ERROR);
        }

        // $variables = $this->valid($name);
        
        foreach($variables as $name=>$value) {

            $this->vars[$name] = $value;   

        }
        // $this->display();
    }

    public function display() {

        extract($this->vars);

        require $this->template;       
        
    }
}


?>