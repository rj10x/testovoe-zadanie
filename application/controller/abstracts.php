<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Abstracts extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        // getting all songs and amount of songs
        $abstracts = $this->model->getAllAbstracts(); 

       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/abstracts/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addSong
     * This method handles what happens when you move to http://yourproject/songs/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addAbstract()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_abstract"])) {
            // do addSong() in model/model.php
			$birthdate = $_POST["den_rogdeniya"] . "." . $_POST["mesyats_rogdeniya"] . "." . $_POST["god_rogdeniya"];
			
			if ($_POST["marital_status"] == "Yes"){
				$marital_status = "Yes";
			}else{
				$marital_status = "No";
			}    

			
            $this->model->addAbstract($_POST["first_name"], $_POST["last_name"],  $birthdate, $_POST["description"], $marital_status, $_POST["language"], $_POST["quantity"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'abstracts/index');
    }

    /**
     * ACTION: deleteSong
     * This method handles what happens when you move to http://yourproject/songs/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on songs/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $song_id Id of the to-delete song
     */
    public function deleteAbstract($abstract_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($abstract_id)) {
            // do deleteSong() in model/model.php
            $this->model->deleteAbstract($abstract_id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'abstract/index');
    }

     /**
     * ACTION: editSong
     * This method handles what happens when you move to http://yourproject/songs/editsong
     * @param int $song_id Id of the to-edit song
     */
    public function editAbstract($abstract_id)
    {
        // if we have an id of a song that should be edited
        if (isset($abstract_id)) {
            // do getSong() in model/model.php
            $abstract = $this->model->getAbstract($abstract_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $song easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/abstracts/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'abstract/index');
        }
    }
    
    /**
     * ACTION: updateSong
     * This method handles what happens when you move to http://yourproject/songs/updatesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a song" form on songs/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateAbstract()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_update_abstract"])) {
            // do updateSong() from model/model.php
            $this->model->updateAbstract($_POST["first_name"], $_POST["last_name"],  $_POST["birthdate"], $_POST["description"], $_POST["marital_status"], $_POST["language"], $_POST["quantity"], $_POST['abstract_id']);
        }

        // where to go after song has been added
        header('location: ' . URL . 'abstracts/index');
    }
}
