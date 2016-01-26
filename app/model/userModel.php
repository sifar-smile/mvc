<?php
/**
 * User Model Class
 * User: oss
 * Date: 25/01/16
 */

class userModel extends Model
{
    /**
     * @var User
     * @access private
     */
    private $user = null;

    /**
     * Log on
     *
     * @param string $login login
     * @param string $password password
     */
    public function login($login,$password)
    {
        // TODO
        // Chercher un utilisateur avec les informations transmisent :
        // - Attention de bien sécuriser le mot de passe
        // - Attention aux injections
        // - Bien assigner l'utilisateur à votre variable $user
        // - Trouver un moyen pour ne pas perdre votre session
    }

    /**
     * Get current user
     */
    public function getCurrentUser()
    {
        if (isset($_SESSION['user']) && $this->user === null) {
            $this->user = $_SESSION['user'];
        }
        return $this->user;
    }

    /**
     * Get User with an specific id
     *
     * @param string $user_id userId
     */
    public function getUserById($user_id)
    {

        $sql = "SELECT * FROM user WHERE id = :user_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Add a user to database
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $login login
     * @param string $password password
     * @param string $firstname firstname
     * @param string $lastname lastname
     */
    public function addUser($login, $password, $firstname, $lastname)
    {
        try {
            $sql = "INSERT INTO user (login, password, firstname, lastname) VALUES (:login, :password, :firstname, :lastname)";
            $query = $this->db->prepare($sql);
            $query->bindParam(":login", $login);
            $query->bindParam(":password", sha1($password));
            $query->bindParam(":firstname", $firstname);
            $query->bindParam(":lastname", $lastname);
            // useful for debugging: you can see the SQL behind above construction by using:
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            $query->execute();
        } catch(PDOException $e) {
            // TODO : gestion d'erreur
        }

        $this->user = $this->getUserById($this->db->lastInsertId());
        $_SESSION['user'] = $this->user;
    }

    /**
     * Update a user in database
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $login login
     * @param string $firstname firstname
     * @param string $lastname lastname
     * @param int $user_id Id
     */
    public function updateUser($login, $firstname, $lastname, $user_id)
    {
        // TODO : update user information
    }
}