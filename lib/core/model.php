<?php
/**
 * CORE : DO NOT EDIT THIS CLASS
 * Model Base
 * User: oss
 * Date: 25/01/16
 */
class Model
{
    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $_instance = null;

    /**
     * Create unique instance for the class
     *
     * @param void
     * @return Singleton
     */
    public static function getInstance($db) {

        if(is_null(self::$_instance)) {
            self::$_instance = new static($db);
        }

        return self::$_instance;
    }

    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


}