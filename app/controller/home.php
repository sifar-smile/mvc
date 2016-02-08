<?php
/**
* Class Home
*
* Please note:
* Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
* http://php.net/manual/en/language.oop5.decon.php
*
*/
class Home extends Controller
{
    /**
     * @var null userModel
     */
    public userModel = null;
    
    /**
     * @var null privateMessageModel
     */
    public globalMessageModel = null;
    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel()
    {
        require_once APP . 'model/userModel.php';
        // TO DECOMMENT once the model is created
        //require_once APP . 'model/globalMessageModel.php';
        
        // create new "model" (and pass the database connection)
        $this->userModel = new UserModel($this->db);
        // $this->globalMessageModel = new globalMessageModel($this->db);
    }
    
    /**
    * PAGE: index
    * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
    */
    public function index()
    {
        $currentUser = $this->userModel->getCurrentUser();
		//$globalMessage = $this->globalMessageModel->getAllGlobalMessages();
		
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
    /**
    * PAGE: exampleone
    * This method handles what happens when you move to http://yourproject/home/exampleone
    * The camelCase writing is just for better readability. The method name is case-insensitive.
    */
    public function exampleOne()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_one.php';
        require APP . 'view/_templates/footer.php';
    }
    /**
    * PAGE: exampletwo
    * This method handles what happens when you move to http://yourproject/home/exampletwo
    * The camelCase writing is just for better readability. The method name is case-insensitive.
    */
    public function exampleTwo()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_two.php';
        require APP . 'view/_templates/footer.php';
    }
}
