<?php
    function delete_user(string $username) {
        if(!file_exists("../passwords/".$username.".txt")):
            $errors = array(
                "code" => 24,
                "message" => "Username does not exist"
            );
            return $errors;
        endif;
        if($username == ""):
            $errors = array(
                "code" => 25,
                "message" => "Please fill in all fields"
            );
            return $errors;
        endif;
        $patern = "/^([A-Za-z0-9]){3,20}$/";
        if(!preg_match($patern, $username)):
            $errors = array(
                "code" => 26,
                "message" => "Username must contain only letters and numbers"
            );
            return $errors;
        endif;
        try {
            unlink("../passwords/".$username.".txt");
            return array(
                "code" => 0,
                "message" => "User deleted"
            );
        } catch (Exception $e) {
            $errors = array(
                "code" => 27,
                "message" => "An error occurred : " . $e->getMessage()
            );
            return $errors;
        }
    }