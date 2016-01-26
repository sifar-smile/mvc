<?php
/**
 * CORE : DO NOT EDIT THIS CLASS
 *  Controller Base
 * User: oss
 * Date: 25/01/16
 */
class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $model = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct($db)
    {
        $this->db = $db;
        $this->loadModel();
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel()
    {
        // create new "model" (and pass the database connection)
        $this->model = model::getInstance($this->db);
    }

}
?>