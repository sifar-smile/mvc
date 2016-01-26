<?php
/**
 * Class User
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * http://php.net/manual/en/language.oop5.decon.php
 *
 */
class User extends Controller
{

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel()
    {
        require_once APP . 'model/userModel.php';

        // create new "model" (and pass the database connection)
        $this->model = UserModel::getInstance($this->db);
    }

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/user/index
     */
    public function index()
    {
        // getting all informations of current user
        $currentUser = $this->model->getCurrentUser();

        // load views
        require APP . 'view/_templates/header.php';
        if ($currentUser == null) {
            require APP . 'view/user/login.php';
        } else {
            require APP . 'view/user/index.php';
        }
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addUser
     * This method handles what happens when you move to http://yourproject/user/addUser
     * This is an example of how to handle a POST request.
     */
    public function addUser()
    {
        // if we have POST data to create a new user entry
        if (isset($_POST["submit_add_user"])) {
            // do addUser() in model/userModel.php
            // TODO : Retourner une erreur si jamais les champs ne sont pas correctement complétés.
            $this->model->addUser($_POST["login"], $_POST["password"],  $_POST["firstname"],  $_POST["lastname"]);
        }
        // where to go after user has been added
        header('location: ' . URL . 'user/index');
    }

    /**
     * ACTION: editUser
     * This method handles what happens when you move to http://yourproject/user/editUser
     */
    public function editUser()
    {
        // getting all informations of current user
        $currentUser = $this->model->getCurrentUser();

        // TODO : Mettre à jour l'utilisateur

        require APP . 'view/_templates/header.php';
        require APP . 'view/user/edit.php';
        require APP . 'view/_templates/footer.php';

        // TODO : gérer les éventuelles erreurs


    }
}