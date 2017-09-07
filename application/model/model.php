<?php

class Model
{
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

    /**
     * Get all abstracts from database
     */
    public function getAllAbstracts() 
    {
        $sql = "SELECT id, first_name, last_name, birthdate, description, marital_status, language, quantity FROM abstract";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addAbstract($first_name, $last_name, $birthdate, $description, $marital_status, $language, $quantity)
    {
        $sql = "INSERT INTO abstract (first_name, last_name, birthdate, description, marital_status, language, quantity) VALUES (:first_name, :last_name, :birthdate, :description, :marital_status, :language, :quantity)";
        $query = $this->db->prepare($sql);
        $parameters = array(':first_name'=> $first_name , ':last_name' => $last_name, ':birthdate' => $birthdate, ':description' => $description, ':marital_status' => $marital_status, ':language' => $language, ':quantity' => $quantity);

        // useful for debugging: you can see the SQL behind above construction by using:
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters) or die(print_r($query->errorInfo(), true));;
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteAbstract($abstract_id)
    {
        $sql = "DELETE FROM abstract WHERE id = :abstract_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':abstract_id' => $abstract_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     */
    public function getAbstract($abstract_id)
    {
        $sql = "SELECT id, first_name, last_name, birthdate, description, marital_status, language, quantity FROM abstract WHERE id = :abstract_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':abstract_id' => $abstract_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateAbstract($abstract_id, $first_name, $last_name, $birthdate, $description, $marital_status, $language, $quantity)
    {
        $sql = "UPDATE abstract SET first_name = :first_name, last_name = :last_name, birthdate = :birthdate, description = :description, marital_status = :marital_status, language = :language, quantity = :quantity WHERE id = :abstract_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':first_name' => $first_name, ':last_name' => $last_name, ':birthdate' => $birthdate, ':description' => $description, ':marital_status' => $marital_status, ':language' => $language, ':quantity' => $quantity, ':abstract_id' => $abstract_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
}
